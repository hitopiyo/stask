@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">成績編集画面<div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method='POST' action="{{route('updategrade',['id'=>$schoolgrade->id])}}">
                    @csrf
                        <input type='hidden' name='student_id' value="{{ $schoolgrade['id'] }}">
                        
                        <div class="form-group">
                            <label for="grade">学年</label>
                            <select name='grade' type="text" class="form-control" id="grade">
                            @foreach ($select as $selects)
                                <option value="{{ $selects }}"{{$selects == $schoolgrade['grade'] ? "selected" : ""}}>{{ $selects }}年</option>
                            @endforeach
                            

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="term">学期</label>
                            <select name='term' type="text" class="form-control" id="term" value="">
                            @foreach ($select as $selects)
                                <option value="{{ $selects }}"{{$selects == $schoolgrade['term'] ? "selected" : ""}}>{{ $selects }}学期</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="japanese">国語</label>
                            <select name='japanese' type="text" class="form-control" id="japanese" value="">
                                
                            @foreach ($select as $selects)
                                <option value="{{ $selects }}"{{$selects == $schoolgrade['japanese'] ? "selected" : ""}}>{{ $selects }}</option>
                            @endforeach
                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="math">数学</label>
                            <select name='math' type="text" class="form-control" id="math" value="">
                            @foreach ($select as $selects)
                                <option value="{{ $selects }}"{{$selects == $schoolgrade['math'] ? "selected" : ""}}>{{ $selects }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="science">理科</label>
                            <select name='science' type="text" class="form-control" id="science" value="">
                            @foreach ($select as $selects)
                                <option value="{{ $selects }}"{{$selects == $schoolgrade['science'] ? "selected" : ""}}>{{ $selects }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="social_studies">社会</label>
                            <select name='social_studies' type="text" class="form-control" id="social_studies" value="">
                            @foreach ($select as $selects)
                                <option value="{{ $selects }}"{{$selects == $schoolgrade['social_studies'] ? "selected" : ""}}>{{ $selects }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="music">音楽</label>
                            <select name='music' type="text" class="form-control" id="music" value="">
                            @foreach ($select as $selects)
                                <option value="{{ $selects }}"{{$selects == $schoolgrade['music'] ? "selected" : ""}}>{{ $selects }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="home_economics">家庭科</label>
                            <select name='home_economics' type="text" class="form-control" id="home_economics" value="">
                            @foreach ($select as $selects)
                                <option value="{{ $selects }}"{{$selects == $schoolgrade['home_economics'] ? "selected" : ""}}>{{ $selects }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="english">英語</label>
                            <select name='english' type="text" class="form-control" id="english" value="">
                            @foreach ($select as $selects)
                                <option value="{{ $selects }}"{{$selects == $schoolgrade['english'] ? "selected" : ""}}>{{ $selects }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="art">美術</label>
                            <select name='art' type="text" class="form-control" id="art" value="">
                            @foreach ($select as $selects)
                                <option value="{{ $selects }}"{{$selects == $schoolgrade['art'] ? "selected" : ""}}>{{ $selects }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="health_and_physical_education">保健体育</label>
                            <select name='health_and_physical_education' type="text" class="form-control" id="health_and_physical_education" value="">
                            @foreach ($select as $selects)
                                <option value="{{ $selects }}"{{$selects == $schoolgrade['health_and_physical_education'] ? "selected" : ""}}>{{ $selects }}</option>
                            @endforeach
                            </select>
                        </div>
                        <button type='submit' class="btn btn-primary btn-lg">編集</button>
                    </form>
                </div>
                <a href="{{url('index')}}" class="btn">戻る</a>
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection