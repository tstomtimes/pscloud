@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        <h1 class="title">ようこそ</h1>
        <h2 class="subtitle">
        PS Cloud の利用を許可されている方は，<a href="{{ route('login') }}" target="_parent">ログイン</a>または<a href="{{ route('register') }}">新規登録</a>をしてください。<br>
        </h2>
    </div>
</section>
@endsection
