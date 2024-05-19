@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">学生編集画面<div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method='POST' action="{{url('addgrade',['id'=>$school_grade['id']])}}">
                    @csrf
                        <input type='hidden' name='user_id' value="{{ $user['id'] }}">
                        
                        <div class="form-group">
                            <p>学生id</p>
                            <p>{{ $students->name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="grade">学年</label>
                            <input name='grade' type="text" class="form-control" id="grade" value="{{ $school_grade }}">
                        </div>
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input name='name' type="text" class="form-control" id="name" value="{{ school_grade }}">
                        </div>
                        <div class="form-group">
                            <label for="address">住所</label>
                            <input name='address' type="text" class="form-control" id="address" value="{{ school_grade }}">
                        </div>
                        <div class="form-group">
                            <label for="img_path">Choose a profile picture:</label>
                            <input type="file" id="img_path" name="img_path" accept="image/png, image/jpeg" value="{{ school_grade }}">
                        </div>
                        <div class="form-group">
                            <label for="address">コメント</label>
                            <input name='address' type="text" class="form-control" id="address" value="{{ school_grade }}">
                        </div>
                        
                        <button type='submit' class="btn btn-primary btn-lg">編集</button>
                    </form>
                </div>

                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection