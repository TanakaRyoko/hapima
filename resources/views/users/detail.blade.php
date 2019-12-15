@extends('layouts.a')
@section('title','一日のスケジュール')

@section('content')
    <div class="container">
        <div class="row">
            <h2>一日のスケジュール</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('TimeScheduleController@create')}}" role="button" class="btn btn-primary">タイムスケジュール追加</a>
            </div>
            <div class="col-md-8">
                <form action="{{ action('TimeScheduleController@index')}}"method="get">
                    <div class="form-group row">
                        <div class="admin-news col-md-12 mx-auto">
                            <div class="row">
                                <table class="table table-dark">
                                    <thead>
                                        <tr>
                                            <th width="25%">開始時刻</th>
                                        　　<th width="25%">終了時刻</th> 
                                        　　<th width="40%">内容</th>
                                        　　<th width="10%">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($posts as $timeschdules)
                                            <tr>
                                                <th>{{ $timeschdules->start_time }}</th>
                                                <td>{{ $timeschdules->end_time }}</td>
                                                <td>{{ $timeschdules->content }}</td>
                                                <td>
                                                    <div>
                                                        <a href="{{ action('TimeScheduleController@edit',['id'=> $timeschdules->id]) }}">編集</a>
                                                    </div>
                                                    <div>
                                                        <a href="{{ action('TimeScheduleController@delete', ['id' => $timeschdules->id]) }}">削除</a>
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