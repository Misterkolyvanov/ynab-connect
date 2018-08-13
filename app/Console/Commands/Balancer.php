<?php

namespace App\Console\Commands;

use App\Http\Controllers\HabiticaAPI;
use App\Http\Controllers\YnabAPI;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Crypt;

class Balancer extends Command
{

    protected $signature   = 'balancer:run';
    protected $description = 'The Balancer will offset the customers budgeted amount with an activity transaction.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        print "Running Balancer".PHP_EOL;

        $users = User::all();
        foreach ($users as $user){
            print 'Checking: '. $user->name.PHP_EOL;

            print 'Offset: '.$user->offset_budgeted.PHP_EOL;

            $offset         = $user->offset_budgeted;
            $configuration  = json_decode(Crypt::decrypt($user->configuration));

            if(!count($configuration)){
                print "Skipping user, no configuration found ...".PHP_EOL;
                continue;
            }


            $ynab = new YnabAPI();
            $ynab->connect($user->configuration);

            $ynab_default_category = $ynab->categories( $configuration->ynab_default_budget,
                                                        $configuration->ynab_default_category
            );

            print "Found Bucket:  " . $ynab_default_category->category->name.PHP_EOL;
            print "Bucket Budget: " . $ynab_default_category->category->budgeted.PHP_EOL;

            $offset_required = abs($offset) - $ynab_default_category->category->budgeted;

            if(!$offset_required){
                continue;
            }

            print "Need to offset by ".$offset_required.PHP_EOL;

            $ynab->postTransaction( $configuration->ynab_default_account,
                                    $configuration->ynab_default_budget,
                                    $configuration->ynab_default_category,
                                    $offset_required
            );

            $user->increment('offset_budgeted', $offset_required);
        }
    }
}
