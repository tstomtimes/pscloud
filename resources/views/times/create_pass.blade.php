@extends('layouts.app')
@section('content')
<h1>パスコードの設定</h1>
    <p>初回の為、タイムカード打刻用 暗証番号を設定してください。<br/>
    今後タイムカードを打刻する際に使用しますので、忘れないようご注意ください。</p>
<p>暗証番号は <span style="font-weight: bold;color: #aa321a">４桁</span> 必要です。</p>
<form method="post" action="{{route('store_pass',$member_id)}}">
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
        <label>新しい暗証番号</label>
        <input type="password" name="pass" class="form-control" id="InputPassword" placeholder="新しい暗証番号を入力してください">
    </div>
    <div class="form-group">
        <label>新しい暗証番号（再入力）</label>
        <input type="password" name="pass_confirmation" class="form-control" id="InputPassword" placeholder="新しい暗証番号を再入力してください">
    </div>
    <button type="submit" class="btn btn-success">設定</button>
    <a href="{{route('time_card')}}" style="text-decoration: none"><button type="button" class="btn btn-default">キャンセル</button></a>
</form>
@stop
