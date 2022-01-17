<?php
namespace App\Http\Controllers\informations;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

use App\Models\User;

use Session;
class SecurityController extends Controller
{
    public function page(Request $rq){
        return view('security.app');
    }
    public function edit(Request $rq){
        try{
            //test authentification
            $user_id=Session::get('auth_user')['user_id'];
            $session_token=Session::get('auth_user')['session_token'];
            if($rq->oldPassword==null || $rq->newPassword==null || $rq->confirmPassword==null  )
                return response()->json(['flag'=>false,'title'=>__('unsuccess'),'message'=>__('erreurDonnee')]);
            if($rq->newPassword != $rq->confirmPassword)
                return response()->json(['flag'=>false,'title'=>__('unsuccess'),'message'=>__('erreurPassword')]);
            
            //edit name dans account
            $x_token=hash("sha256",$rq->oldPassword.$rq->newPassword.$user_id.$session_token.env('APP_KEY').'myaccount.zlayga.com',false);
            $response=Http::get(env('URL_ACCOUNTS').'/ext/api/user/edit/password?password1='.$rq->oldPassword."&password2=".$rq->newPassword."&uid=".$user_id."&session_token=".$session_token."&x_token=".$x_token);
            if(!$response->successful() || !$response['flag'])//si false     
                return response()->json(['flag'=>false,'title'=>__('unsuccess'),'message'=>__('erreurChangePassword')]);
                        
            return ['flag'=>true,'title'=>__('success'),'message'=>__('actionSuccess')];
        }catch(Throwable $e){
            FaultC::save("InformationsController","edit",$e);
            return response()->json(['flag'=>false,'title'=>__('unsuccess'),'message'=>__("erreur505")]);
        }
       
    }
}
