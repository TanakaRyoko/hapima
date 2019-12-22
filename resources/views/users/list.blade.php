@extends('layouts.a')
@section('title','ユーザー検索結果')

@section('content')
    <div class="container">
        <div class="row">
            <h2>ユーザー検索結果</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('UserController@list')}}"method="get">
                    <div class="form-group row">
                        <div class="admin-news col-md-12 mx-auto">
                            <div class="row">
                                <table class="table table-stripe">
                                    <thead>
                                        <tr>
                                            <th width="20%">氏名</th>
                                        　　<th width="10%">性別</th> 
                                        　　<th width="20%">居住地区</th>
                                        　　<th width="20%">家族構成</th>
                                        　　<th width="10%">ワーキングスタイル</th>
                                        　　<th width="10%">通勤時間</th>
                                        　　<th width="10%">パートナーの家事育児貢献度</th>
                                    　　</tr>
                                    </thead>
                                    <tbody>
                                        @foreach($user_form as $user_forms)
                                            <tr>
                                                <th>{{ $user_forms->name }}</th>
                                                <td>{{ $user_forms->gender }}</td>
                                                <td>{{ $user_forms->prefecture }}</td>
                                                <td>{{ $user_forms->family_size }}</td>
                                                <td>{{ $user_forms->working_days }}</td>
                                                <td>{{ $user_forms->commuting_time }}</td>
                                                <td>{{ $user_forms->partner_service_level }}</td>
                                                <td>
                                                    <div>
                                                        <a href="{{ action('UserController@datail',['id'=> $user_forms->id]) }}">選択</a>
                                                    </div>
                                                </td>
                                            </tr>
                                         @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection