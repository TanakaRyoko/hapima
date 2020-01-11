@extends('layouts.a')
@section('title','スケジュールの編集')

@section('content')
    <div class= "container">
        <div class= "row">
            <div class= "col-md-8 mx-auto">
                <h2>スケジュールの編集</h2>
                <br>
                <form action= "{{ action('TimeScheduleController@update') }}" method="post" enctype="multipart/form-data">      
                     @if(count($errors) >0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-2">
                            <input type="time" class="form-control" name="start_time" value="{{ $timeschedule_form->start_time }}">
                        </div>
                        <div class="col-md-1">
                            <h5>～</h5>
                        </div>
                        <div class="col-md-2">
                            <input type='time' class="form-control" name="end_time" value = "{{ $timeschedule_form->end_time }}">
                        </div>
                        <div class="col-md-5">
                            <input type='text' class="form-control" name="content" value = "{{ $timeschedule_form->content }}">
                        </div>
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
@endsection