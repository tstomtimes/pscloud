@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')
<section class="section">
	<nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/authorities">一覧</a></li>
        <li><a href="/authorities/{{ $authority->id }}">詳細</a></li>
        <li class="is-active"><a href="#" aria-current="page">編集</a></li>
      </ul>
    </nav>
	<h1 class="title is-1">権限の修正</h1>

	<form method="POST" action="/authorities/{{ $authority->id }}">
		@method('PATCH')
		@csrf
		<div class="field">
			<label class="label" for="name">権限名称</label>
			<div class="control">
				<input type="text" name="name" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" value="{{ $errors->any() ? old('name') : $authority->name }}">
			</div>
		</div>

		<div class="field">
			<label class="label" for="note">備考</label>
			<div class="control">
				<textarea name="note" class="textarea {{ $errors->has('note') ? 'is-danger' : '' }}">{{ $errors->any() ? old('note') : $authority->note }}</textarea>
			</div>
		</div>		

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">更新</button>
				<a href="/authorities" class="button is-light">戻る</a>
			</div>
		</div>	

		@include ('errors')	
	</form>
</section>
<section class="section">
	<h2 class="title is-2">権限の削除</h2>
	<form method="POST" action="/authorities/{{ $authority->id }}">
		@method('DELETE')
		@csrf
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-danger">削除</button>
				<a href="/authorities" class="button is-light">戻る</a>
			</div>
		</div>	
	</form>
</section>
@endsection