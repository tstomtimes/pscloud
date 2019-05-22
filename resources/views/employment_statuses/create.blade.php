@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')
<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/employment_statuses">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">作成</a></li>
      </ul>
    </nav>
    <h1 class="title is-1">雇用形態の作成</h1>
    <form method="POST" action="/employment_statuses">
        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="name">名称</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" value="{{ old('name') }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">作成</button>
                <a href="/employment_statuses" class="button is-light">戻る</a>
            </div>
        </div>

        @include ('errors')
    </form>
</section>
@endsection