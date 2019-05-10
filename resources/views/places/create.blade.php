@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')
<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/places">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">作成</a></li>
      </ul>
    </nav>
    <h1 class="title is-1">勤務地の作成</h1>
    <form method="POST" action="/places">
        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="place_no">事業所番号</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('place_no') ? 'is-danger' : '' }}" name="place_no" value="{{ old('place_no') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="name">名称</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" value="{{ old('name') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="name_kana">名称（かな）</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('name_kana') ? 'is-danger' : '' }}" name="name_kana" value="{{ old('name_kana') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="position">位置（緯度経度）</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('position') ? 'is-danger' : '' }}" name="position" value="{{ old('position') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="address">住所</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('address') ? 'is-danger' : '' }}" name="address" value="{{ old('address') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="unit_price">室単価</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('unit_price') ? 'is-danger' : '' }}" name="unit_price" value="{{ old('unit_price') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="note">備考</label>
            <textarea name="note" class="textarea {{ $errors->has('note') ? 'is-danger' : '' }}">{{ old('note') }}</textarea>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">作成</button>
                <a href="/places" class="button is-light">戻る</a>
            </div>
        </div>

        @include ('errors')
    </form>
</section>
@endsection