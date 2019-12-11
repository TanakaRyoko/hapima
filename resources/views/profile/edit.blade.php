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
                                <input type="text" class="form-control" name="name" value="{{$profile_form->name}}">
                            </div>
                    </div>
                    
                    
                     <!-- 性別 -->
                     <div class= "form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <input type="radio" name="gender" value="男性">男性
                            <input type="radio" name="gender" value="女性">女性
                        </div>
                    </div>
                    
                    
                    
                   <!-- 居住地区 -->
                   　<div class= "form-group row">
                   　    <label class="col-md-2" for"=prefecture">居住地区</label>
                      @foreach(config('pref') as $index => $name)
                        <option value="{{ $index }}">$name</option>
                      @endforeach
                    </div>
                    
                    
                    
                    <!-- 家族構成 -->
                   　<div class= "form-group row">
                   　    <label class="col-md-2" forefecture""家族構成</label>
                      　<select>
                      　 <option value=2 >2人</option>
                      　 <option value=3 >3人</option>
                      　 <option value=4 >4人</option>
                      　 <option value=5 >5人</option>
                      　 <option value=6 >6人</option>
                      　 <option value=7 >7人</option>
                      　 <option value=8 >8人</option>
                      　 <option value=9 >9人</option>
                      　 <option value=10 >10人以上</option>
                      　</select>
                      
                      
                    <!-- ワーキングスタイル -->
                    <div class= "form-group row">
                        <label class="col-md-2" for="introduction">ワーキングスタイル</label>
                        <select>
                      　 <option value=2 >週1日</option>
                      　 <option value=3 >週2日</option>
                      　 <option value=4 >週3日</option>
                      　 <option value=5 >週4日</option>
                      　 <option value=6 >週5日</option>
                      　 </select>
                    </div>
                    
                    <!-- 通勤時間 -->
                    <div class= "form-group row">
                        <label class="col-md-2" for="introduction">通勤時間</label>
                        <select>
                      　 <option value=2 >30分未満</option>
                      　 <option value=3 >30分～60分未満</option>
                      　 <option value=4 >60分～90分未満</option>
                      　 <option value=5 >90分～120分未満</option>
                      　 <option value=6 >120分以上</option>
                      　 </select>
                    </div>
                    
                    
                        <input type="hidden" name="id" value="{{$profile_form->id}}">
                        {{csrf_field()}}
                        
                        <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection