@extends('layouts.a')
@section('title','タイムスケジュール登録')

@section('content')

<!--<form class="form-inline" action="index.html" method="post">-->
<div class= "container">
    <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>タイムスケジュール登録</h2>
    
                    <div class="form-group row">
                        <div class="col-md-2">
                           <input type="time" class="form-control" name="time" value="{{old("time")}}">
                        </div>
                        <div class="col-md-1">
                            <h5>～</h5>
                        </div>
                        <div class="col-md-2">
                            <input type='time' class="form-control">
                        </div>
                        <div class="col-md-5">
                            <input type='text' class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </div>
        </div>
    </div>
@endsection

<!--<form class="form-inline" action="index.html" method="post">-->
<!--  <div class="form-group  mb-2">-->
<!--    <input type="text" class="form-control" id="email" value="" placeholder="ログインID">-->
<!--  </div>-->
<!--  <div class="form-group mx-sm-3 mb-2">-->
<!--    <input type="password" class="form-control" id="password" value="" placeholder="パスワード">-->
<!--  </div>-->
<!--  <button type="submit" class="btn btn-primary mb-2">ログイン</button>-->
<!--</form>-->

