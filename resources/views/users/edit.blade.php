@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')
<section class="section">
	<nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/users">一覧</a></li>
        <li><a href="/users/{{ $user->id }}">詳細</a></li>
        <li class="is-active"><a href="#" aria-current="page">編集</a></li>
      </ul>
    </nav>
	<h1 class="title is-1">ユーザーの修正</h1>

	<form method="POST" action="/users/{{ $user->id }}">
		@method('PATCH')
		@csrf
        <div class="field">
            <label class="label" for="name">名前</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" value="{{ $user->name }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="email">メールアドレス</label>
            <div class="control">
                <input disabled="disabled" type="email" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" value="{{ $user->email }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="auth_str">権限</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('auth_str') ? 'is-danger' : '' }}" name="auth_str" value="{{ $user->auth_str }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="place_id">勤務地</label>
            <div class="select">
                <select name="place_id" class="form-control">
                    @if($places)
                        @foreach($places as $place)
                            @if($place->id == $user->place_id)
                                <option value="{{$place->id}}" selected>{{$place->name}}</option>
                            @else
                                <option value="{{$place->id}}">{{$place->name}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">更新</button>
				<a href="/users" class="button is-light">戻る</a>
			</div>
		</div>
		@include ('errors')	
	</form>
</section>
<section class="section">
	<h2 class="title is-2">ユーザーの削除</h2>
	<form method="POST" action="/users/{{ $user->id }}">
		@method('DELETE')
		@csrf
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-danger">削除</button>
				<a href="/users" class="button is-light">戻る</a>
			</div>
		</div>	
	</form>
</section>
@endsection