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
                        <a href="{{ route( 'edit',['id'=>$student->id] ) }}">学生編集</a><br><br>
                    @endforeach
                    @foreach($schoolgrade AS $schoolgrades)
                        <ul>
                            <li>学年時：{{ $schoolgrades->grade }} 年</li>
                            <li>学期：{{ $schoolgrades->term }} 学期</li>
                            <li>国語：{{ $schoolgrades->japanese }}</li>
                            <li>数学：{{ $schoolgrades->math }}</li>
                            <li>理科：{{ $schoolgrades->science }}</li>
                            <li>社会：{{ $schoolgrades->social_studies }}</li>
                            <li>音楽：{{ $schoolgrades->music }}</li>
                            <li>家庭科：{{ $schoolgrades->home_economics }}</li>
                            <li>英語：{{ $schoolgrades->english }}</li>
                            <li>美術：{{ $schoolgrades->art }}</li>
                            <li>保健体育：{{ $schoolgrades->health_and_physical_education }}</li>
                        </ul>
                        <a href="{{ route( 'gradeedit',['id'=>$student->id] ) }}">成績編集</a><br><br>
                    @endforeach
                    <a href="{{ route( 'creategrade',['id'=>$student->id] ) }}">成績登録</a>
                    <a href="{{url('index')}}" class="btn">戻る</a>
                </div>

                
            </div>
        </div>
    </div>
</div>
@endsection
