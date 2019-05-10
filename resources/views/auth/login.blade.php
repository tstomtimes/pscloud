@extends('layouts.app')

@section('content')
<div class="container is-centered">
    <div class="columns is-mobile is-centered">
        <div class="column is-4">
            <p class="title">ログイン</p>
        <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field">
            <label class="label">メールアドレス</label>
            <div class="control has-icons-left">
                <input id="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email" type="email" placeholder="hoge@example.com" value="{{ old('email') }}" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                </span>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="field">
            <label class="label">パスワード</label>
            <div class="control has-icons-left">
                <input id="password" name="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="●●●●●●" required>
                <span class="icon is-small is-left">
                    <i class="fas fa-key"></i>
                </span>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="field">
            <div class="control">
                <label class="checkbox">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    {{ __('次回から自動でログインする') }}
                </label>
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">
                    {{ __('ログイン') }}
                </button>
                @if (Route::has('password.request'))
                    <a class="button is-text" href="{{ route('password.request') }}">
                        {{ __('パスワードを忘れた場合...') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
    <a href="/auth/graph" class="button is-info" style="width: 100%;margin-top: 30px;"><i class="fab fa-windows"></i>　Microsoftアカウントでログイン</a>
    </div>
</div>
</div>
@endsection
