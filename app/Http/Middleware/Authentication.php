<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Auth;

use Session;
class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $rq, Closure $next)
    {                    
        if(Session::has('auth_user')){
            $response=Auth::isConnected($rq);
            if($response!==true){
                return $response;
            }  
        }else{
            if($rq->has('code1') && $rq->has('uid') && $rq->has('code2')){
                $response=Auth::check_client($rq); 
                if($response!==true)
                    return  $response;  
            }else{
                return redirect(env("URL_ACCOUNTS")."/signin?service=".env('SERVICE_RANCHO')."&continue=".$rq->url());
            }
        }
        if($rq->has('code1') && $rq->has('uid') && $rq->has('code2')){//pour eliminer les parametres d'url
            return redirect($rq->url());
        }        
        return $next($rq);
    }
}
