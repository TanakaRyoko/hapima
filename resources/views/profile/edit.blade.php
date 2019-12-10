@extends('layouts.profile')
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
                    <!-- 氏名 -->
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="name" >{{ $profile_form->name}}</textarea>
                                <!--<input type="text" class="form-control" name="name" value="{{$profile_form->name}}">-->
                            </div>
                    </div>
                     <!-- 性別 -->
                     <div class= "form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="gender" >{{ $profile_form->gender}}</textarea>
                        </div>
                    </div>
                    
                   <!-- 居住地区 -->
                   　<div class= "form-group row">
                   　    <label class="col-md-2" for"=prefecture">居住地区</label>
                      @foreach(config('pref') as $index => $name)
                        <option value="{{ $index }}">$name</option>
                      @endforeach
                    </div>
                    <!-- 自己紹介 -->
                    <div class= "form-group row">
                        <label class="col-md-2" for="introduction">自己紹介</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="introduction" rows="5">{{$profile_form->introduction}}</textarea>
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
