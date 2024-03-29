@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')
<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/times">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">作成</a></li>
      </ul>
    </nav>
    <h1 class="title is-1">タイムカードの作成</h1>
    <form method="POST" action="/times">
        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="member_id">名前</label>
            <div class="select">
                <select name="member_id" class="form-control">
                    @if($members)
                        @foreach($members as $member)
                            <option value="{{$member->id}}">{{$member->last_name}} {{$member->first_name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>

        <div class="field">
            <label class="label" for="date">日付</label>
            <div class="control">
                <input name="date" value="<?php use Carbon\Carbon;echo Carbon::now()->format('Y-m-d') ?>" type="date" class="form-control">
            </div>
        </div>

        <div class="field">
            <label class="label" for="in">出勤時刻</label>
            <div class="control">
                <input type="datetime-local" class="input {{ $errors->has('in') ? 'is-danger' : '' }}" name="in" value="<?php echo Carbon::now()->toDateTimeString(); ?>">
            </div>
        </div>

        <div class="field">
            <label class="label" for="out">退勤時刻</label>
            <div class="control">
                <input type="datetime-local" class="input {{ $errors->has('out') ? 'is-danger' : '' }}" name="out" value="<?php echo Carbon::now()->toDateTimeString(); ?>">
            </div>
        </div>

        <div class="field">
            <label class="label" for="time">時間</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('time') ? 'is-danger' : '' }}" name="time" value="{{ old('time') }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">作成</button>
                <a href="/times" class="button is-light">戻る</a>
            </div>
        </div>

        @include ('errors')
    </form>
</section>
@endsection
