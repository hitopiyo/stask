@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メニュー画面</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn" href="{{ route('home') }}">学年更新</a>
                    <a class="btn" href="{{url('addstudent')}}">学生登録</a>
                    <a class="btn" href="{{url('index')}}">学生表示</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
