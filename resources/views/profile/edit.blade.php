@extends('layouts.a')
@section('title','プロフィールの編集')

@section('content')
    <div class= "container">
        <div class= "row">
            <div class= "col-md-8 mx-auto">
                <h2>プロフィールの編集</h2>
                <form action= "{{ action('ProfileController@update') }}" method="post" enctype="multipart/form-data">      
                     @if(count($errors) >0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    
                    <br>
                    <br>
                    <br>
                    <br>
                    
                    <!-- 氏名 -->
                    <div class="form-group row">
                        <label class="col-md-4">氏名</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" value="{{$profile_form->name}}">
                            </div>
                    </div>
                    
                    
                     <!-- 性別 -->
                     <div class= "form-group row">
                        <label class="col-md-4">性別</label>
                        <div class="col-md-8">
                            <input type="radio" name="gender" value="male"{{$profile_form->gender === 'male' ? 'checked' : ''}}>男性
                            <input type="radio" name="gender" value="female"{{$profile_form->gender === 'female' ? 'checked' : ''}}>女性
                        </div>
                    </div>
                    
                    
                    
                   <!-- 居住地区 -->
                   　<div class= "form-group row">
                   　    <label class="col-md-4" for="prefecture">居住地区</label>
                   　    <div class="col-md-8">
                   　    <select name="prefecture">
                          @foreach(config('pref') as $index => $name)
                            <option value="{{ $index }}" {{$profile_form->prefecture == $index ? "selected" : ""}}>{{$name}}</option>
                          @endforeach
                        </select>
                        </div>
                    </div>
                    
    
                    <!-- 家族構成 -->
                   　<div class= "form-group row">
                   　    <label class="col-md-4"for="family_size">家族構成</label>
                   　    <div class="col-md-8">
                   　    <select  name="family_size">
                          @foreach(config('family_size') as $index => $name)
                            <option value="{{ $index }}" {{$profile_form->family_size == $index ? "selected" : ""}}>{{$name}}</option>
                          @endforeach
                        </select>
                        </div>
                    </div>
                    
                      
                    <!-- ワーキングスタイル -->
                    <div class= "form-group row">
                   　    <label class="col-md-4"for="working_days">ワーキングスタイル</label>
                   　    <div class="col-md-8">
                   　    <select name="working_days">
                          @foreach(config('working_days') as $index => $name)
                            <option value="{{ $index }}" {{$profile_form->working_days == $index ? "selected" : ""}}>{{$name}}</option>
                          @endforeach
                        </select>
                        </div>
                    </div>
                    
                    
                    
                    <!-- 通勤時間 -->
                    <div class= "form-group row">
                   　    <label class="col-md-4"for="commuting_time">通勤時間</label>
                   　    <div class="col-md-8">
                   　    <select name="commuting_time">
                          @foreach(config('commuting_time') as $index => $name)
                            <option value="{{ $index }}" {{$profile_form->commuting_time == $index ? "selected" : ""}}>{{$name}}</option>
                          @endforeach
                        </select>
                        </div>
                    </div>
                    
                    
                    <!-- パートナーの貢献度 -->
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
                    
                    
                        <input type="hidden" name="id" value="{{$profile_form->id}}">
                        {{csrf_field()}}
                        
                        <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection