@extends('layouts.profile')
@section('title', 'My プロフィール')

{{-- profile.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>My プロフィール</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    
                    @if(count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <lavel class="col-md-2">氏名</lavel>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">性別</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">自己紹介欄</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
<!--<!DOCTYPE html>-->
<!--<html lang="ja">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    
<!--    <title>ProfileCreate</title>-->
<!--</head>-->
<!--<body>-->
<!--    <h1>Profile作成画面</h1>-->
<!--</body>-->
<!--</html>-->

<!--// 以下、「PHP/Laravel 10 ControllerとViewが連携できるようにしよう」課題-->
<!--// 課題１-->
<!--// →　Controllerからの指示を受けて、ユーザーに表示する画面を作成するところ。-->
<!--// 課題２-->
<!--// →　ユーザー名など、そのユーザーに応じたHTMLデータを表示するため。-->
<!--　　　プログラミング言語やフレームワークを使わないと、固定されたHTMLデータしか表示できない。-->
<!--// 課題３-->
<!--// →　add Action:　admin/profile配下にcreate.blade.phpというファイルを設置-->
<!--// →　edit Action:　admin/profile配下にedit.blade.phpというファイルを設置-->