@extends('layouts.a')
@section('title','ユーザー検索')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>ユーザー検索</h2>
            <br>
            <form action="{{ action('UserController@list')}}"method="get">
                
        
                 <!--性別 -->
                <div class= "form-group row">
                    <label class="col-md-4">性別</label>
                    <div class="col-md-8">
                        <input type="radio" name="gender" value="男性">男性
                        <input type="radio" name="gender" value="女性">女性
                    </div>
                </div>
                
                
                 <!--居住地区 -->
               <div class= "form-group row">
               　    <label class="col-md-4" for="prefecture">居住地区</label>
               　    <div class="col-md-8">
               　    <select name="prefecture">
                      @foreach(config('pref') as $index => $name)
                        <option value="{{ $index }}">{{$name}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>
                
        
                 <!--家族構成 -->
              　<div class= "form-group row">
               　    <label class="col-md-4"for="family_size">家族構成</label>
               　    <div class="col-md-8">
               　    <select  name="family_size">
                      @foreach(config('family_size') as $index => $name)
                        <option value="{{ $index }}" >{{$name}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>
                
                  
                 <!--ワーキングスタイル -->
                <div class= "form-group row">
               　    <label class="col-md-4"for="working_days">ワーキングスタイル</label>
               　    <div class="col-md-8">
               　    <select name="working_days">
                      @foreach(config('working_days') as $index => $name)
                        <option value="{{ $index }}">{{$name}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>
                
                
                
                 <!--通勤時間 -->
                <div class= "form-group row">
               　    <label class="col-md-4"for="commuting_time">通勤時間</label>
               　    <div class="col-md-8">
               　    <select name="commuting_time">
                      @foreach(config('commuting_time') as $index => $name)
                        <option value="{{ $index }}">{{$name}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>
                
                
                 <!--パートナーの貢献度 -->
                <div class= "form-group row">
                    <label class="col-md-4" for="partner_service_level">パートナーの家事・育児貢献度</label> 
                    <div class="col-md-8">
                         <select name="partner_service_level">
                         <option value="" >選択してください</option>    
                      　 <option value="row" >低</option>
                      　 <option value="middle" >中</option>
                      　 <option value="high" >高</option>
                      　  </select>
                    </div> 
                </div>    
                <div class= "form-group row">      　 
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-primary" value="検索"> 
                </div>
            </form>
        </div>
    </div>
</div>
@endsection