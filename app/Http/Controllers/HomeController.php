<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $auth           = Auth::user();
        $configuration  = ($auth->configuration)? json_decode(Crypt::decrypt($auth->configuration)) : [];

        $habitica       = new HabiticaAPI();
        $ynab           = new YnabAPI();

        $habitica_user   = $habitica->user();
        $ynab_user       = $ynab->user();

        return view('wizard', [
            'habitica_user'     => $habitica_user,
            'ynab_user'         => $ynab_user,
            'configuration'     => $configuration
        ]);
    }

    public function store_configuration(Request $request){

        $u              = Auth::user();
        $config_current = false;

        if(!empty($u->configuration) && $u->configuration){
            $config_current = json_decode(Crypt::decrypt($u->configuration), true);
        }

        if(is_array($config_current)){
            $new_config = array_merge($config_current, $request->toArray());
        }else{
            $new_config = $request->toArray();
        }

        $u->configuration = Crypt::encrypt(json_encode($new_config));
        $u->save();

        return response()->json(["response"=>"SUCCESS"]);
    }

    public function async_settings_content(){
        $auth = Auth::user();

        $configuration  = ($auth->configuration)? json_decode(Crypt::decrypt($auth->configuration)) : [];

        $ynab           = new YnabAPI();

        $ynab_budgets    = $ynab->budgets();

        if(!isset($configuration->ynab_default_budget)){
            $ynab_categories = [];
            $ynab_accounts   = [];
        }else{
            $ynab_categories = $ynab->categories($configuration->ynab_default_budget);
            $ynab_accounts   = $ynab->accounts($configuration->ynab_default_budget);
        }

        return view('parts.settings_content', [
            'ynab_budgets'      => $ynab_budgets,
            'ynab_categories'   => $ynab_categories,
            'ynab_accounts'     => $ynab_accounts,
            'configuration'     => $configuration
        ]);
    }

    public function async_system_status(){

        $auth = Auth::user();

        $habitica       = new HabiticaAPI();
        $ynab           = new YnabAPI();

        $habitica_user   = $habitica->user();
        $ynab_user       = $ynab->user();

        return view("parts.system_status_details", [
            'habitica_user'     => $habitica_user,
            'ynab_user'         => $ynab_user,
        ]);
    }
}
