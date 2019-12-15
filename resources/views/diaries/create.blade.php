{{-- layouts/admin.blade.phpを読み込む --}}
@extends('layouts.a')


{{-- a.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
<!--ここに入れたタイトルはタブに表示される-->
@section('title', '日々の記録')
{{-- a.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>日々の記録</h2>
                <form action="{{action("DiaryController@create")}}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors ->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="date"> 日付 </label>
                        <div class="col-md-10">
                            <<input type="date" class="form-control" name="date" value="{{old("date")}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="content">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="content" rows="20">{{old('content')}}</textarea>
                        </div>
                    </div>
                    {{csrf_field()}}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection