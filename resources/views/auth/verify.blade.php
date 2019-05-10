@extends('layouts.app')

@section('content')
<div class="container is-centered">
    <p class="title">メールアドレスの認証をお願いします</p>

        @if (session('resent'))
        <div class="notification is-link">
          <button class="delete"></button>
          認証メールがあなたのメールアドレスに送信されました。
        </div>
        @endif
        <p class="content">システム使用の前に、下ボタンを押して、認証メールお受け取りください。<br>
        その後、届いたメールの認証リンクをクリックして登録を完了してください。</p>
        <a href="{{ route('verification.resend') }}"><button class="button is-info is-medium">認証メールの送信</button></a>
    </div>
</div>
@endsection
