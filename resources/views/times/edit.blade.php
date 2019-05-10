@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_time')
@endsection

@section('content')
<section class="section">
	<nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/times">一覧</a></li>
        <li><a href="/times/{{ $time->id }}">詳細</a></li>
        <li class="is-active"><a href="#" aria-current="page">編集</a></li>
      </ul>
    </nav>
	<h1 class="title is-1">タイムカードの修正</h1>

	<form method="POST" action="/times/{{ $time->id }}">
		@method('PATCH')
		@csrf
        <div class="field">
            <label class="label" for="member_id">名前</label>
            <div class="select">
                <select name="member_id" class="form-control">
                    @if($members)
                        @foreach($members as $member)
                            @if($member->id == $time->member_id)
                                <option value="{{$member->id}}" selected>{{$member->last_name}} {{$member->first_name}}</option>
                            @else
                                <option value="{{$member->id}}">{{$member->last_name}} {{$member->first_name}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="field">
            <label class="label" for="date">日付</label>
            <div class="control">
                <input name="date" value="{{$time->date->format('YYYY-MM-DD')}}" type="date" class="form-control">
            </div>
        </div>

        <div class="field">
            <label class="label" for="in">出勤時刻</label>
            <div class="control">
                <input type="time" class="input {{ $errors->has('in') ? 'is-danger' : '' }}" name="in" value="{{$time->in}}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="out">退勤時刻</label>
            <div class="control">
                <input type="time" class="input {{ $errors->has('out') ? 'is-danger' : '' }}" name="out" value="{{$time->out}}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="time">時間</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('time') ? 'is-danger' : '' }}" name="time" value="{{$time->time}}">
            </div>
        </div>

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">更新</button>
				<a href="/times" class="button is-light">戻る</a>
			</div>
		</div>
		@include ('errors')	
	</form>
</section>
<section class="section">
	<h2 class="title is-2">カードの削除</h2>
	<form method="POST" action="/times/{{ $time->id }}">
		@method('DELETE')
		@csrf
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-danger">削除</button>
				<a href="/times" class="button is-light">戻る</a>
			</div>
		</div>	
	</form>
</section>
@endsection