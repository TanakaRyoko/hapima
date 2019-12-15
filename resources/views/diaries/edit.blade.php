@extends('layouts.a')
@section('title','日々の記録編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8  mx-auto">
                <h2>日々の記録編集</h2>
                <form action="{{ action('DiaryController@update')}}"method="post" enctype="multipart/form-data">
                    @if(count($errors) >0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="date">日付</label>
                        <div class="col-md-10">
                            <!-- タイトルの履歴が残るようにした　-->
                            <input type="date"class="form-control" name="date" value="{{ $diaries_form->date }}">
                            <!--<input type="text" class="form-control"name="title" value="{{$diaries_form->tile}}"> 
                            元のコードだとタイトルの履歴が残らない-->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="content">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="content" rows="20">{{ $diaries_form->content}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class ="col-md-10">
                            <input type="hidden" name="id" value="{{ $diaries_form->id }}">
                            {{ csrf_field()}}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

