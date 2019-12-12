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
                            <input type="radio" name="gender" value="male">男性
                            <input type="radio" name="gender" value="female">女性
                        </div>
                    </div>
                    
                    
                    
                   <!-- 居住地区 -->
                   　<div class= "form-group row">
                   　    <label class="col-md-2" for="prefecture">居住地区</label>
                   　    <div class="col-md-10">
                   　    <select>
                          @foreach(config('pref') as $index => $name)
                            <option value="{{ $index }}">{{$name}}</option>
                          @endforeach
                        </select>
                        </div>
                    </div>
                    
                    
                    
                    <!-- 家族構成 -->
                   　<div class= "form-group row">
                   　    <label class="col-md-2" for="family_size">家族構成</label>
                   　    <div class="col-md-10">
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
                        </div>
                    </div>
                    
                      
                    <!-- ワーキングスタイル -->
                    <div class= "form-group row">
                        <label class="col-md-2" for="introduction">ワーキングスタイル</label> 
                        <div class="col-md-10">
                            <select>
                            <option value=1 >週1日</option>
                            <option value=2 >週2日</option>
                            <option value=3 >週3日</option>
                            <option value=4 >週4日</option>
                            <option value=5 >週5日</option>
                            <option value=6 >週6日</option>
                            <option value=7 >週7日</option>
                            </select>
                        </div>
                    </div>
                    
                    
                    
                    <!-- 通勤時間 -->
                    <div class= "form-group row">
                        <label class="col-md-2" for="introduction">通勤時間</label> 
                        <div class="col-md-10">
                             <select>
                          　 <option value=1 >30分未満</option>
                          　 <option value=2 >30分～60分未満</option>
                          　 <option value=3 >60分～90分未満</option>
                          　 <option value=4 >90分～120分未満</option>
                          　 <option value=5 >120分以上</option>
                          　 </select>
                      　</div>
                    </div>
                    
                    
                    
                    <!-- パートナーの貢献度 -->
                    <div class= "form-group row">
                        <label class="col-md-2" for="introduction">パートナーの貢献度</label> 
                        <div class="col-md-10">
                             <select>
                          　 <option value=row >低</option>
                          　 <option value=middle >中</option>
                          　 <option value=high >高</option>
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