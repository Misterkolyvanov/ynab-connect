<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class HabiticaAPI extends Controller
{

    protected $user_id;
    protected $user_key;
    protected $configuration;
    protected $api_url = 'https://habitica.com/api/v3/';

    public function connect($configuration=false){

        if($this->user_id & $this->user_key){
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

            if(!empty($configuration->habitica_user_id)){
                $this->user_id = $configuration->habitica_user_id;
            }else{
                return false;
            }

            if(!empty($configuration->habitica_user_key)){
                $this->user_key = $configuration->habitica_user_key;
            }else{
                return false;
            }

        }else{
            return false;
        }

        return true;
    }


    public function user(){

        $cache = Session::get("HABITICA USER");
        $is_cron = Session::get("IS_CRON_RUNNING");

        if(!empty($cache) & empty($is_cron)){
            return $cache;
        }

        if(!$this->connect()){
            return false;
        }

        try
        {
            $httpClient  = new Client();
            $httpResponse = $httpClient->request('GET',$this->api_url.'user',[
                'headers' => [
                    'Accept'        => 'application/json',
                    'cache-control' => 'no-cache',
                    'x-api-user'    => $this->user_id,
                    'x-api-key'     => $this->user_key,
                ]
            ]);
            //get api response code
            $responseCode = $httpResponse->getStatusCode();
            if($responseCode == 200)
            {
                $json = \GuzzleHttp\json_decode($httpResponse->getBody());

                Session::put("HABITICA USER", $json->data);

                return $json->data;
            }
        }
        catch (ClientException $e){
            Log::info($e);
        }

        return false;
    }

    public function api_test($user_key){
        if(!$user_key){
            return response()->json(["result"=>"FAILED"]);
        }

        if(!strstr($user_key, ",")){
            return response()->json(["result"=>"FAILED"]);
        }

        $token = explode(',', $user_key);

        $user  = $token[0];
        $key   = $token[1];

        try
        {
            $httpClient  = new Client();
            $httpResponse = $httpClient->request('GET',$this->api_url.'user',[
                'headers' => [
                    'Accept'        => 'application/json',
                    'cache-control' => 'no-cache',
                    'x-api-user'    => $user,
                    'x-api-key'     => $key,
                ]
            ]);
            //get api response code
            $responseCode = $httpResponse->getStatusCode();
            if($responseCode == 200)
            {
                return response()->json(["result"=>"SUCCESS"]);
            }
        }
        catch (ClientException $e){
            return response()->json(["result"=>"FAILED"]);
        }
        return response()->json(["result"=>"FAILED"]);
    }

    public function user_tasks($task_id=false){

        $cache   = Session::get("HABITICA USER TASKS $task_id");
        $is_cron = Session::get("IS_CRON_RUNNING");

        if(!empty($cache) & empty($is_cron)){
            return $cache;
        }

        if(!$this->connect()){
            return false;
        }

        if($task_id){
            $api = 'tasks/'.$task_id;
        }else{
            $api = 'tasks/user';
        }

        try
        {
            $httpClient  = new Client();
            $httpResponse = $httpClient->request('GET',$this->api_url.$api,[
                'headers' => [
                    'Accept'        => 'application/json',
                    'cache-control' => 'no-cache',
                    'x-api-user'    => $this->user_id,
                    'x-api-key'     => $this->user_key,
                ]
            ]);
            //get api response code
            $responseCode = $httpResponse->getStatusCode();
            if($responseCode == 200)
            {
                $json = \GuzzleHttp\json_decode($httpResponse->getBody());

                Session::put("HABITICA USER TASKS $task_id", $json->data);

                return $json->data;
            }
        }
        catch (ClientException $e){
            Log::info($e);
        }

        return false;
    }
}