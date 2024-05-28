@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">学生表示画面<div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($students AS $student)
                        <p>{{ $student['grade'] }}：{{ $student['name'] }}：<a href="{{ route( 'show',['id'=>$student->id] ) }}" class="btn">詳細表示</a></p>
                    @endforeach
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
