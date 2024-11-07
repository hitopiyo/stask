@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">学生追加画面<div>

                <div class="card-body">
                    <form method='POST' action="{{url('store')}}" onSubmit="return checkSubmit()">
                    @csrf
                        
                        
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input name='name' type="text" class="form-control" id="name" placeholder="名前を入力">
                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{$errors->first('name')}}
                                </div>
                            @endif
                        <div class="form-group">
                            <label for="address">住所</label>
                            <input name='address' type="text" class="form-control" id="address" placeholder="住所を入力">
                            @if($errors->has('address'))
                                <div class="text-danger">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
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