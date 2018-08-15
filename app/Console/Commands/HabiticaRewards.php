<?php

namespace App\Console\Commands;

use App\Http\Controllers\HabiticaAPI;
use App\Http\Controllers\Helper;
use App\Http\Controllers\YnabAPI;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;

class HabiticaRewards extends Command
{

    protected $signature   = 'habitica:rewards';
    protected $description = 'Log into Habitica and check to see if rewards are available, then credit YNAB';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        print "Running Habitica Rewards".PHP_EOL;

        $users = User::all();
        foreach ($users as $user){
            print 'Checking: '. $user->name.PHP_EOL;

            $configuration  = json_decode(Crypt::decrypt($user->configuration));

            if(!count($configuration)){
                print "Skipping user, no configuration found ...".PHP_EOL;
                continue;
            }

            if(!$configuration->habitica_reward_amt){
                continue;
            }

            $highest_difficulty = 2;
            $possible_credit    = $configuration->habitica_reward_amt * 1000;
            $credit             = 0;

            //Check if any tasks have been completed today
            $habitica = new HabiticaAPI();

            if(!$habitica->connect($user->configuration)){
                print "Could not connect to Habitica API ... skipping".PHP_EOL;
                continue;
            }

            $tasks = $habitica->user_tasks();
            $today = date("Y-m");

            if(!$tasks){
                print "Could not find any tasks for this user ...".PHP_EOL;
                continue;
            }

            foreach($tasks as $task){

                $difficulty   = $task->priority;
                $name         = $task->text;

                if($task->type == "todo"){

                    if(isset($task->completed) && !$task->completed){
                        print "'$name' -  is a todo, but not completed, skipping".PHP_EOL;
                        continue;
                    }

                    $task_fetch         = $habitica->user_tasks($task->id);
                    $time_completed     = date("Y-m-d H:i:s", strtotime($task_fetch->dateCompleted));
                    $date_completed     = date("Y-m", strtotime($task_fetch->dateCompleted));
                    $task_value         = $task_fetch->value;

                    if($time_completed > $user->habitica_payout_checkpoint & $date_completed == $today){
                        $task_credit  = ($difficulty * 100) / $highest_difficulty;
                        $task_credit  = $task_credit / 100;

                        //In case it was an undo, or a negative value;
                        if($task_value > 0){
                            $credit      += $possible_credit * $task_credit;
                        }else{
                            $credit      -= $possible_credit * $task_credit;
                        }
                        print $name.' get credit: '.$task_credit.PHP_EOL;
                    }
                    continue;
                }

                if(empty($task->history)){
                    continue;
                }

                foreach($task->history as $record){

                    $task_value = $record->value;

                    $time_d = date('Y-m-d H:i:s', $record->date / 1000);
                    $date_d = date('Y-m', $record->date / 1000);

                    if($time_d > $user->habitica_payout_checkpoint & $date_d == $today)
                    {
                        $task_credit  = ($difficulty * 100) / $highest_difficulty;
                        $task_credit  = $task_credit / 100;

                        //In case it was an undo, or a negative value;
                        if($task_value > 0){
                            $credit      += $possible_credit * $task_credit;
                        }else{
                            $credit      -= $possible_credit * $task_credit;
                        }
                        print $name.' - '.$task_credit.PHP_EOL;
                    }
                }
            }

            $user->habitica_payout_checkpoint = date("Y-m-d H:i:s");
            $user->save();

            //Connect to YNAB and give credit
            $ynab = new YnabAPI();

            if(!$ynab->connect($user->configuration)){
                print 'Connection to YNAB Failed ... '.PHP_EOL;
                continue;
            }

            $ynab->postTransaction( $configuration->ynab_default_account,
                $configuration->ynab_default_budget,
                $configuration->ynab_default_category,
                floor($credit)
            );
        }
    }
}
