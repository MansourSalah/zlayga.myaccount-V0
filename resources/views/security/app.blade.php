@extends('back')
@section('content')

@include('comun.nav.app')

@include('security.css')
<div class="container mt-5">
    <div class="row ">
        <div class="col-sm-7 mx-auto">
            <div class="card">
                <div class="card-body">
                    <form>
                    <div class="row">
                        <div class="col-sm-12 row-rtl" >
                            <h4 class="text-center">{{__('security')}}</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 ">
                            <p class="text-center">{{__('settingsAndRecommendations')}}</p>
                        </div>
                    </div>
                    <div class="row row-rtl">
                        <div class="form-group col-sm-12 label-rtl">
                            <label for="">{{__('oldPassword')}}</label>
                            <input type="password" class="form-control" name="oldPassword">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 label-rtl">
                            <label for="">{{__('newPassword')}}</label>
                            <input type="password" class="form-control" name="newPassword">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12 label-rtl">
                            <label for="">{{__('confirmPassword')}}</label>
                            <input type="password" class="form-control" name="confirmPassword">
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
@include('security.js')

@stop