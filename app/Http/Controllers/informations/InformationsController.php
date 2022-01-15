<?php

namespace App\Http\Controllers\informations;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

use App\Models\User;

use Session;
class InformationsController extends Controller
{
    public function page(Request $rq){
        $user=User::where('user_id',Session::get('auth_user')['user_id']);
        if(!$user->exists()){
            $user=new User();
            $user->user_id=Session::get('auth_user')['user_id'];
            $user->name=Session::get('auth_user')['name'];
            $user->save();
        }else
            $user=$user->first();
        return view('informations.app',['user'=>$user]);
    }
    public function edit(Request $rq){
        try{
            //test authentification
            $user_id=Session::get('auth_user')['user_id'];
            $session_token=Session::get('auth_user')['session_token'];
            $user=User::where('user_id',$user_id)->first();
            //si le client change le name
            if($rq->name!='' && $rq->name!=Session::get('auth_user')['name']){
                //edit name dans account
                $x_token=hash("sha256",$rq->name.$user_id.$session_token.env('APP_KEY').'myaccount.rancho.ma',false);
                $response=Http::get(env('URL_ACCOUNTS').'/ext/api/user/edit/name?name='.$rq->name."&uid=".$user_id."&session_token=".$session_token."&x_token=".$x_token);
                if($response->successful() && $response['flag']){//si true
                    $user->name=$rq->name;
                    Session::get('auth_user')['name']=$rq->name;
                }
                else
                    return response()->json(['flag'=>false,'title'=>__('unsuccess'),'message'=>__('erreurChangeName')]);
            }
            $user->birthday=$rq->birthday;
            $user->gender=$rq->gender;
            $user->phone=$rq->phone;
            $user->save();
            
            return ['flag'=>true,'title'=>__('success'),'message'=>__('actionSuccess')];
        }catch(Throwable $e){
            FaultC::save("InformationsController","edit",$e);
            return response()->json(['flag'=>false,'title'=>__('unsuccess'),'message'=>__("erreur505")]);
        }
       
    }
}
