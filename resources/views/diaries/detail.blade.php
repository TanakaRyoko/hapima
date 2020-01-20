@extends('layouts.a')
@section('title','日々の記録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8  mx-auto">
                <h2>日々の記録</h2>
                    <div class="form-group row">
                        @foreach ($diary as $diaries)
                        <label class="col-md-2" for="date">日付</label>
                        <div class="col-md-10">
                            {{ $diaries -> date }}
                        </div>
                        <label class="col-md-2" for="date">本文</label>
                        <div class="col-md-10">
                            {{ $diaries -> content }}
                        </div>
                            <input type="submit" class="btn btn-primary" value="戻る">
                        @endforeach
                       </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

