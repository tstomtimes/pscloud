@extends('layouts.app')
@section('content')
<h1>暗証番号の変更</h1>
    <p>暗証番号を変更することができます。<br/>
        今までの暗証番号と設定したい新しい暗証番号を入力してください。</p>
<form method="post" action="{{route('update_pass',$member_id)}}">
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
        <label>暗証番号</label>
        <input type="password" name="pass_old" class="form-control" id="InputPassword" placeholder="暗証番号">
    </div>
    <hr>
    <p>暗証番号は <span style="font-weight: bold;color: #aa321a">８桁</span> 必要です。</p>
    <div class="form-group">
        <label>新しい暗証番号</label>
        <input type="password" name="pass" class="form-control" id="InputPassword" placeholder="新しい暗証番号を入力してください">
    </div>
    <div class="form-group">
        <label>新しい暗証番号（再入力）</label>
        <input type="password" name="pass_confirmation" class="form-control" id="InputPassword" placeholder="新しい暗証番号を再入力してください">
    </div>
    <button type="submit" class="btn btn-success">設定変更</button>
    <a href="{{route('input_pass', $member_id)}}" style="text-decoration: none"><button type="button" class="btn btn-default">キャンセル</button></a>
</form>
@stop