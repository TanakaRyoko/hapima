@extends('layouts.a')
@section('title','日々の記録一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>日々の記録一覧</h2>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ action('DiaryController@create')}}" role="button" class="btn btn-primary">日々の記録追加</a>
            </div>
            <br>
            <br>
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
                        @foreach($posts as $diaries)
                            <tr>
                                <td>{{ $diaries -> date }}</td>
                                <td>{{ $diaries -> content }}</td>
                                <td>
                                    <div>
                                        <a href="{{ action('DiaryController@edit',['id' => $diaries->id]) }}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{ action('DiaryController@delete', ['id' => $diaries->id]) }}">削除</a>
                                    </div>
                                </td>
                            </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection