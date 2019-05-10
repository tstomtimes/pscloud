@extends('layouts.app')

@section('content')
<div class="container is-centered">
    <div class="columns is-mobile is-centered">
        <div class="column is-4">
            <p class="title">新規登録</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="field">
                    <label class="label">名前</label>
                    <div class="control has-icons-left">
                        <input id="name" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" name="name" type="name" placeholder="山田 太郎" value="{{ old('name') }}" required>
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

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

                <input name="place_id" type="hidden" value="">

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
                    <label class="label">パスワード（確認用）</label>
                    <div class="control has-icons-left">
                        <input id="password_confirmation" name="password_confirmation" class="input {{ $errors->has('password') ? ' is-danger' : '' }}" type="password" placeholder="●●●●●●" required>
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
                        <button type="submit" class="button is-info">
                            {{ __('登録') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
