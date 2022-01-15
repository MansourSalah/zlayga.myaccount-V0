<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Session;

use App\Models\User;use App\Models\Token;
class Auth{
    public static function token(){
        return Http::get(env("URL_ACCOUNTS").'/ext/api/getToken')->body();
    }
    public static function isConnected(Request $rq){
        $session_token=Session::get('auth_user')['session_token'];
        $user_id=Session::get('auth_user')['user_id'];
        $x_token=hash("sha256",$user_id.$session_token.env('APP_KEY'),false); 
        $response = Http::get(env("URL_ACCOUNTS").'/ext/api/user/isConnected?user_id='.$user_id."&session_token=".$session_token."&x_token=".$x_token);
        if(!$response['flag']){//si n'est pas connecté
            Session::forget('auth_user');
            return redirect(env("URL_ACCOUNTS")."/signin?service=".env('SERVICE_RANCHO')."&continue=".$rq->url());
        }else
            return true;
    }
    public static function check_client(Request $rq){
        $session_token=$rq->code1;
        $user_id=$rq->uid;
        $access_token=substr($rq->code2,0,60);
        $x_token=hash("sha256",$user_id.$session_token.$access_token.env('APP_KEY'),false);        
                
        $response = Http::get(env("URL_ACCOUNTS").'/ext/api/user/login/check?session_token='.$session_token."&user_id=".$user_id."&access_token=".$access_token."&x_token=".$x_token);        
        if($response['flag']){//si vrai
            Session::put('auth_user',['session_token'=>$session_token,'user_id'=>$user_id,'name'=>$response['name'],'email'=>$response['email']]);
            return true;
        }else{
            return redirect(env("URL_ACCOUNTS")."/signin?service=".env('SERVICE_RANCHO')."&continue=".$rq->url());
        }
    }
    public static function logout($user_id,$session_token){
        $x_token=hash("sha256",$user_id.$session_token.env('APP_KEY'),false);
        
        $response = Http::get(env("URL_ACCOUNTS").'/ext/api/user/logout?session_token='.$session_token."&uid=".$user_id."&x_token=".$x_token);        
        return $response['flag'];
    }
}