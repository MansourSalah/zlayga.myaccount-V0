<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Auth;

use App\Http\Controllers\Comun\LangC;
use Session;

//tables pour les utilisateur (users) sans password ou token 
//
//
/*PreProd */
Route::get("/session",function(){Session::flush(); return "Session Vide";});
Route::get('/page',function(){return view('index');});
/*Complémentaire*/
new LangC();
Route::get("/api/lang",function(Request $rq){LangC::setLang($rq->lang);});
//===================================================================================
//===================================================================================
//===================================================================================
//route Page
Route::redirect('/','/personal-informations');
Route::get('/personal-informations',[informations\InformationsController::class,'page'])->name('informations')->middleware(['language','myAuth']);
Route::get('/security',[informations\SecurityController::class,'page'])->name('security')->middleware(['language','myAuth']);


//Route Action
Route::post("/api/user/informations/edit",[informations\InformationsController::class,'edit'])->middleware(['language','myAuth']);
Route::post("/api/user/security/edit",[informations\SecurityController::class,'edit'])->middleware(['language','myAuth']);

Route::get("/logout",function(){
    $response=Auth::logout(Session::get("auth_user")['user_id'],Session::get("auth_user")['session_token']);
    return redirect("/");
});
