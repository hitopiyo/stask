@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
            <div class="card">
                <div class="card-header">学生編集画面<div>

                <div class="card-body">

                    <form method='POST' action="{{url('update',['id'=>$students['id']])}}" enctype="multipart/form-data">
                    @csrf
                        <input type='hidden' name='user_id' value="">
                        
                        <div class="form-group">
                            <p>学生id</p>
                            <p>{{ $students->id }}</p>
                        </div>
                        <div class="form-group">
                            <label for="grade">学年</label>
                            <input name='grade' type="text" class="form-control" id="grade" value="{{ $students->grade }}">
                        </div>
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input name='name' type="text" class="form-control" id="name" value="{{ $students->name }}">
                        </div>
                        <div class="form-group">
                            <label for="address">住所</label>
                            <input name='address' type="text" class="form-control" id="address" value="{{ $students->address }}">
                        </div>
                        <div class="form-group">
                            <label for="img_path">Choose a profile picture:</label>
                            <input type="file" id="img_path" name="img_path" accept="image/png, image/jpeg" value="{{ $students->img_path }}">
                        </div>
                        <div class="form-group">
                            <label for="comment">コメント</label>
                            <input name='comment' type="text" class="form-control" id="comment" value="{{ $students->comment }}">
                        </div>
                        
                        <button type='submit' class="btn btn-primary btn-lg">編集</button>
                    </form>

                    <a href="{{url('index')}}" class="btn">戻る</a>
                </div>

                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection