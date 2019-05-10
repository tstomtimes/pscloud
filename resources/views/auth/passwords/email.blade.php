@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns is-mobile is-centered">
        <div class="column is-4">
            <div class="title">{{ __('パスワードの初期化') }}</div> 
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="field">
                    <label for="email" class="label">{{ __('メールアドレス') }}</label>
                    <div class="control">
                        <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-info">
                            {{ __('パスワード再設定リンクを送る') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>  
@endsection
