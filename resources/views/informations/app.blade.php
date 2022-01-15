@extends('back')
@section('content')

@include('comun.nav.app')

@include('informations.css')
<div class="container mt-5">
    <div class="row ">
        <div class="col-sm-7 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form>
                    <div class="row">
                        <div class="col-sm-12 row-rtl" >
                            <h4 class="text-center"><span>{{__('welcome')}}</span> <span>{{Session::get('auth_user')['name']}}</span></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 ">
                            <p class="text-center">{{__('manageYourInformations')}}</p>
                        </div>
                    </div>
                    <div class="row row-rtl">
                        <div class="form-group col-sm-12 label-rtl">
                            <label for="">{{__('name')}}</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 label-rtl">
                            <label for="">{{__('birthday')}}</label>
                            <input type="date" class="form-control" name="birthday" value="{{$user->birthday}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 label-rtl">
                            <label for="">{{__('gender')}}</label>
                            <select class="form-control row-rtl" name="gender">
                                <option value="" hidden></option>
                                <option value="m" @if($user->gender=='m') selected @endif>{{__('man')}}</option>
                                <option value="w" @if($user->gender=='w') selected @endif>{{__('woman')}}</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-sm-12 label-rtl">
                            <label for="">{{__('email')}}</label>
                            <input type="email" class="form-control" name="email" value="{{Session::get('auth_user')['email']}}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 label-rtl">
                            <label for="">{{__('phone')}}</label>
                            <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-action"><span id="loading">{{__('loading')}}</span><span id="action">{{__('save')}}</span></button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div><!--Col-sm-12-->
    </div><!--row-->
</div>
@include('informations.js')

@stop