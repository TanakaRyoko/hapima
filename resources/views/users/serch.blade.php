@extends('layouts.a')
@section('title','ユーザー検索')

@section('content')
<div class="container">
    <div class="row">
        <h2>ユーザー検索/h2>
        <div class="col-md-8">
            <form action="{{ action('UserController@list')}}"method="get">
                
                <!-- 性別 -->
                <div class= "form-group row">
                    <label class="col-md-4">性別</label>
                    <div class="col-md-8">
                        <input type="radio" name="gender" value="male"{{$query->gender === 'male' ? 'checked' : ''}}>男性
                        <input type="radio" name="gender" value="female"{{$query->gender === 'female' ? 'checked' : ''}}>女性
                    </div>
                </div>
                
                
                <!-- 居住地区 -->
               <div class= "form-group row">
               　    <label class="col-md-4" for="prefecture">居住地区</label>
               　    <div class="col-md-8">
               　    <select name="prefecture">
                      @foreach(config('pref') as $index => $name)
                        <option value="{{ $index }}" {{$query->prefecture == $index ? "selected" : ""}}>{{$name}}</option>
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
                        <option value="{{ $index }}" {{$query->family_size == $index ? "selected" : ""}}>{{$name}}</option>
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
                        <option value="{{ $index }}" {{$query->working_days == $index ? "selected" : ""}}>{{$name}}</option>
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
                        <option value="{{ $index }}" {{$query->commuting_time == $index ? "selected" : ""}}>{{$name}}</option>
                      @endforeach
                    </select>
                    </div>
                </div>
                
                
                <!-- パートナーの貢献度 -->
                <div class= "form-group row">
                    <label class="col-md-4" for="partner_service_level">パートナーの家事・育児貢献度</label> 
                    <div class="col-md-8">
                         <select name="partner_service_level">
                      　 <option value="row" >低</option>
                      　 <option value="middle" >中</option>
                      　 <option value="high" >高</option>
                      　  </select>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
</div>



{!! Form::open() !!}
    タイトル:{!! Form::text('s_title', $s_title) !!}
    カテゴリー:{!! Form::text('s_category', $s_category) !!}
    監督:{!! Form::text('s_production', $s_production) !!}
    出演:{!! Form::text('s_performer', $s_performer) !!}
    {!! Form::submit('検索') !!}
{!! Form::close() !!}

@foreach($movies as $movie)
<div>
    <a>{{ $movie->id }}</a>
    <a>{{ $movie->title }}</a>
    <a>{{ $movie->category }}</a>
    <a>{{ $movie->production }}</a>
    <a>{{ $movie->performer }}</a>
</div>
@endforeach

@endsection