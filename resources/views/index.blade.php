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

                    @if(isset($search_result))
                    <h5 class="card-title">{{$search_result}}</h5>
                    @endif

                    <form action="{{ route('index') }}" method="GET" class="form-inline my-2 my-lg-0 ml-2">
                    @csrf
                        <div class="form-group">
                            <input type="search" class="form-control mr-sm-2" name="search"  value="{{request('search')}}" placeholder="キーワードを入力" aria-label="検索...">
                        </div>
                        <input type="submit" value="検索" class="search btn btn-info">
                    </form>

                    @foreach($students AS $student)
                        <p>【学年】{{ $student['grade'] }}年 【名前】{{ $student['name'] }}▶︎<a href="{{ route( 'show',['id'=>$student->id] ) }}" class="btn">詳細表示</a></p>
                    @endforeach
                </div>
            
                <div class="d-flex justify-content-center ">
                        {{ $students->links() }}
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
