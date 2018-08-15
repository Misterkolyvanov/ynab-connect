<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class YnabAPI extends Controller
{

    protected $ynab_token;
    protected $configuration;
    protected $api_url = 'https://api.youneedabudget.com/v1/';

    public function connect($configuration = false){

        if($this->ynab_token){
            return true;
        }

        if(!$configuration){
            if($this->configuration){
                $configuration = $this->configuration;
            }else{
                $configuration = Auth::user()->configuration;
            }
        }

        $this->configuration = $configuration;

        if($configuration){
            $configuration = json_decode(Crypt::decrypt($configuration));

            if(!empty($configuration->ynab_token)){
                $this->ynab_token = $configuration->ynab_token;
            }else{
                return false;
            }


        }else{
            return false;
        }

        return true;
    }

    public function api_test($token){

        if(!$token){
            return response()->json(["result"=>"FAILED"]);
        }

        try
        {
            $httpClient  = new Client();
            $httpResponse = $httpClient->request('GET','https://api.youneedabudget.com/v1/user',[
                'headers' => [
                    'Accept' => 'application/json',
                    'cache-control' => 'no-cache',
                    'authorization' => 'Bearer '.$token
                ]
            ]);
            //get api response code
            $responseCode = $httpResponse->getStatusCode();
            if($responseCode == 200) {
                return response()->json(["result"=>"SUCCESS"]);
            }
        }
        catch (ClientException $e){
            return response()->json(["result"=>"FAILED"]);
        }
        return response()->json(["result"=>"FAILED"]);
    }

    public function user(){

        $cache = Session::get("YNAB_USER");

        if(!empty($cache)){
            return $cache;
        }


        if(!$this->connect()){
            return false;
        }

        try
        {
            $httpClient  = new Client();
            $httpResponse = $httpClient->request('GET','https://api.youneedabudget.com/v1/user',[
                'headers' => [
                    'Accept' => 'application/json',
                    'cache-control' => 'no-cache',
                    'authorization' => 'Bearer '.$this->ynab_token
                ]
            ]);
            //get api response code
            $responseCode = $httpResponse->getStatusCode();
            if($responseCode == 200)
            {
                $json = \GuzzleHttp\json_decode($httpResponse->getBody());

                Session::put("YNAB_USER", $json->data);

                return $json->data;
            }
        }
        catch (ClientException $e){
            Log::info($e);
        }

        return false;
    }


    public function budgets(){

        $cache = Session::get("YNAB_BUDGETS");

        if(!empty($cache)){
            return $cache;
        }

        if(!$this->connect()){
            return false;
        }

        try
        {
            $httpClient  = new Client();
            $httpResponse = $httpClient->request('GET','https://api.youneedabudget.com/v1/budgets',[
                'headers' => [
                    'Accept' => 'application/json',
                    'cache-control' => 'no-cache',
                    'authorization' => 'Bearer '.$this->ynab_token
                ]
            ]);
            //get api response code
            $responseCode = $httpResponse->getStatusCode();
            if($responseCode == 200)
            {
                $json = \GuzzleHttp\json_decode($httpResponse->getBody());

                Session::put("YNAB_BUDGETS", $json->data);

                return $json->data;
            }
        }
        catch (ClientException $e){
            Log::info($e);
        }

        return false;
    }

    public function budget($id){

        $cache = Session::get("YNAB_BUDGET_$id");

        if(!empty($cache)){
            return $cache;
        }

        if(!$this->connect()){
            return false;
        }

        try
        {
            $httpClient  = new Client();
            $httpResponse = $httpClient->request('GET','https://api.youneedabudget.com/v1/budgets/4b7ac0c4-a0ee-4807-be3f-cb2c697d5505',[
                'headers' => [
                    'Accept' => 'application/json',
                    'cache-control' => 'no-cache',
                    'authorization' => 'Bearer '.$this->ynab_token
                ]
            ]);
            //get api response code
            $responseCode = $httpResponse->getStatusCode();
            if($responseCode == 200)
            {
                $json = \GuzzleHttp\json_decode($httpResponse->getBody());

                Session::put("YNAB_BUDGET_$id", $json->data);

                return $json->data;
            }
        }
        catch (ClientException $e){
            Log::info($e);
        }

        return false;
    }

    public function categories($budget_id, $category_id = false){

        $cache = Session::get("YNAB CATEGORY $budget_id $category_id");

        if(!empty($cache)){
            return $cache;
        }

        if(!$this->connect()){
            return false;
        }

        if($category_id){
            $api_call = '/budgets/'.$budget_id.'/categories/'.$category_id;
        }else{
            $api_call = '/budgets/'.$budget_id.'/categories';
        }

        try
        {
            $httpClient  = new Client();
            $httpResponse = $httpClient->request('GET',$this->api_url.$api_call,[
                'headers' => [
                    'Accept' => 'application/json',
                    'cache-control' => 'no-cache',
                    'authorization' => 'Bearer '.$this->ynab_token
                ]
            ]);
            //get api response code
            $responseCode = $httpResponse->getStatusCode();
            if($responseCode == 200)
            {
                $json = \GuzzleHttp\json_decode($httpResponse->getBody());

                Session::put("YNAB CATEGORY $budget_id $category_id", $json->data);

                return $json->data;
            }
        }
        catch (ClientException $e){
            Log::info($e);
        }

        return false;
    }

    public function accounts($budget_id){

        $cache = Session::get("YNAB Accounts $budget_id");

        if(!empty($cache)){
            return $cache;
        }

        if(!$this->connect()){
            return false;
        }

        try
        {
            $httpClient  = new Client();
            $httpResponse = $httpClient->request('GET','https://api.youneedabudget.com/v1/budgets/'.$budget_id.'/accounts',[
                'headers' => [
                    'Accept' => 'application/json',
                    'cache-control' => 'no-cache',
                    'authorization' => 'Bearer '.$this->ynab_token
                ]
            ]);
            //get api response code
            $responseCode = $httpResponse->getStatusCode();
            if($responseCode == 200)
            {
                $json = \GuzzleHttp\json_decode($httpResponse->getBody());

                Session::put("YNAB Accounts $budget_id", $json->data);

                return $json->data;
            }
        }
        catch (ClientException $e){
            Log::info($e);
        }

        return false;
    }

    public function postTransaction($account_id, $budget_id, $category_id, $amt){

        if(!$this->connect()){
            return false;
        }

        try
        {
            $httpClient  = new Client();
            $httpResponse = $httpClient->request('POST',$this->api_url.'budgets/'.$budget_id.'/transactions',[
                'headers' => [
                    'Accept' => 'application/json',
                    'cache-control' => 'no-cache',
                    'authorization' => 'Bearer '.$this->ynab_token,
                    'content-type' => 'application/json',
                ],
                'body' => '{
                  "transaction": {
                    "account_id": "'.$account_id.'",
                    "date": "'.date('Y/m/d').'",
                    "amount": '.$amt.',
                    "payee_id": null,
                    "payee_name": null,
                    "category_id": "'.$category_id.'",
                    "memo": "Habitica Post",
                    "cleared": "cleared",
                    "approved": true,
                    "flag_color": "red",
                    "import_id": null
                  }
                }'
            ]);
            //get api response code
            $responseCode = $httpResponse->getStatusCode();
            if($responseCode == 200)
            {
                $json = \GuzzleHttp\json_decode($httpResponse->getBody());

                return $json;
            }
        }
        catch (ClientException $e){
            Log::info($e);
        }

        return false;
    }
}
