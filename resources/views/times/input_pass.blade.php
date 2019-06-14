@extends('layouts.app')
@section('content')
<h1>暗証番号を入力してください</h1>
    <p>設定している暗証番号をご入力ください。<br/>
<form method="post" action="{{route('check_pass')}}">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>エラー</strong>　以下の項目を修正してください。<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{csrf_field()}}
    <div class="form-group">
        <input type="hidden" name="id" value="{{$id}}">
        <input type="password" name="pass" class="form-control" id="InputPassword" placeholder="パスコード">
    </div>
    <button type="submit" class="btn btn-success">打刻する</button>
    <a href="{{route('time_card', $id)}}" style="text-decoration: none"><button type="button" class="btn btn-default">キャンセル</button></a>
</form>
<div class="panel panel-default" style="margin-top: 50px">
    <div class="panel-heading">
        <strong>暗証番号の変更</strong>
    </div>
    <div class="panel-body">
        <p>暗証番号を変更が必要の場合は下のボタンをクリックしてください。</p>
        <a href="{{route('change_pass', $id)}}" style="text-decoration: none"><button type="button" class="btn btn-default">暗証番号の変更</button></a>
    </div>
</div>
@stop