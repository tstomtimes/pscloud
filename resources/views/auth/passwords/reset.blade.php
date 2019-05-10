@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-mobile is-centered">
        <div class="column is-4">
            <p class="title">パスワードの再設定</p>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="field">
                    <label for="email" class="label">{{ __('メールアドレス') }}</label>
                    <div class="cotrol">
                        <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="password" class="label">{{ __('パスワード') }}</label>

                    <div class="control">
                        <input id="password" type="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <label for="password-confirm" class="label">{{ __('パスワードの確認') }}</label>

                    <div class="control">
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-info">
                            {{ __('パスワードの再設定') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
