@extends('layouts.profile')
@section('title','プロフィールの編集')

@section('content')
    <div class= "container">
        <div class= "row">
            <div class= "col-md-8 mx-auto">
                <h2>プロフィールの編集</h2>
                <form action= "{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">      
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
                        <label class="col-md-2" for="hobby">居住地区</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="5">{{$profile_form->hobby}}</textarea>
                        </div>
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
                <div class ="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if($profile_form->profilehistories !=NULL)
                                @foreach($profile_form->profilehistories as $profile_histories)
                                <li class ="list-group-item">{{ $profile_histories -> edited_at}}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
