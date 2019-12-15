@extends('layouts.a')
@section('title','タイムスケジュール登録')

@section('content')

<div class= "container">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>タイムスケジュール登録</h2>
            <br>
            <br>
            <form action="{{ action('TimeScheduleController@create')}}" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-md-2">
                        <input type="time" class="form-control" name="start_time">
                    </div>
                    <div class="col-md-1">
                        <h5>～</h5>
                    </div>
                    <div class="col-md-2">
                        <input type='time' class="form-control" name="end_time">
                    </div>
                    <div class="col-md-5">
                        <input type='text' class="form-control" name="content">
                    </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">登録</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
