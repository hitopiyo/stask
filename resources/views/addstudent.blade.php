@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">学生追加画面<div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <form method='POST' action="{{url('store')}}">
                    @csrf
                        <input type='hidden' name='user_id' value="{{ $user['id'] }}">
                        
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input name='name' type="text" class="form-control" id="name" placeholder="名前を入力">
                        </div>
                        <div class="form-group">
                            <label for="address">住所</label>
                            <input name='address' type="text" class="form-control" id="address" placeholder="住所を入力">
                        </div>
                        
                        <button type='submit' class="btn btn-primary btn-lg">登録</button>
                    </form>
                    <a href="{{url('home')}}" class="btn">戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection