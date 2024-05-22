@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">学生詳細画面<div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($students AS $student)
                        <ul>
                            <li>学年：{{ $student['grade'] }}</li>
                            <li>名前：{{ $student['name'] }}</li>
                            <li>住所：{{ $student['address'] }}</li>
                            <li>顔写真：{{ $student['img_path'] }}</li>
                            <li>コメント：{{ $student['comment'] }}</li>
                        </ul>
                        <a href="{{url('edit/{id}')}}">学生編集</a>
                        <ul>
                            <li>学年：{{ $student->school_grades->grade }}</li>
                            <li>名前：{{ $student['name'] }}</li>
                            <li>住所：{{ $student['address'] }}</li>
                            <li>顔写真：{{ $student['img_path'] }}</li>
                            <li>コメント：{{ $student['comment'] }}</li>
                        </ul>
                    @endforeach
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
