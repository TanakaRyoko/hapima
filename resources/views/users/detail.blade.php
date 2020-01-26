@extends('layouts.a')
@section('title','ユーザー詳細')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ユーザー詳細</h2>
        </div>
        <div class = "row">
            <div class="col-md-6">
                <table class="table table-bordered">
                     @foreach($user_form as $user_forms)
                        <tr>
                            <th width="10%">氏名</th>
                            <th>{{ $user_forms->name}}</th>
                        </tr>    
                        <tr>
                            <td width="10%">性別</td>
                            <td>{{ $user_forms->gender }}</td>
                        </tr>    
                        <tr>
                            <td width="15%">居住地区</td>
                            <td>{{ config('pref')[$user_forms->prefecture] }}</td>
                        </tr>
                        <tr>
                            <td width="15%">家族構成</td>
                            <td>{{ config('family_size')[$user_forms->family_size] }}</td>
                        </tr>
                        <tr>
                            <td width="20%">ワーキングスタイル</td>
                            <td>{{ config('working_days')[$user_forms->working_days] }}</td>
                        </tr> 
                        <tr>
                            <td width="10%">通勤時間</td>
                            <td>{{ config('commuting_time')[$user_forms->commuting_time] }}</td>
                        </tr>    
                        <tr>
                           <td width="20%">パートナーの家事育児貢献度</td> 
                           <td>{{ config('partner_service_level')[$user_forms->partner_service_level]}}</td> 
                        </tr>    
                     @endforeach
                </table>
            </div>  
            <div class="col-md-6">
                <div class="row">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="25%">開始時刻</th>
                            　　<th width="25%">終了時刻</th> 
                            　　<th width="50%">内容</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($timeschedule_form-> sortBy('start_time') as $timeschedule_forms)
                                <tr>
                                    <th>{{ $timeschedule_forms->start_time }}</th>
                                    <td>{{ $timeschedule_forms->end_time }}</td>
                                    <td>{{ $timeschedule_forms->content }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>    
        <div class="col-md-12">
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="30%">日付</th>
                        　　<th width="40%">本文</th>
                        　　<th width="10%">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diary_form as $diary_forms)
                            <tr>
                                <td>{{ $diary_forms ->date }}</td>
                                <td>{{ $diary_forms ->content }}</td>
                                <td>
                                    <div>
                                        <!--<a href="{{ action('UserController@detail') }}">選択</a>-->
                                    </div>
                                </td>    
                            </tr>
                        @endforeach
                    </tbody>  
                </table>    
            </div>
        </div>
@endsection