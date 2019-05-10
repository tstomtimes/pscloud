@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')
<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/tags">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">作成</a></li>
      </ul>
    </nav>
    <h1 class="title is-1">タグの作成</h1>
    <form method="POST" action="/tags">
        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="place_id">店舗</label>
            <div class="select">
                <select name="place_id" class="form-control">
                    @if($places)
                        @foreach($places as $place)
                            <option value="{{$place->id}}">{{$place->name}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        </div>


        <div class="field">
            <label class="label" for="name">タグ名称</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" value="{{ old('name') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="price">金額</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('price') ? 'is-danger' : '' }}" name="price" value="{{ old('price') }}">
            </div>
        </div>

        <div class="field">
            <input name="is_using" value="1" class="is-checkradio" id="RadioInline3" type="radio" 
            @if(is_array(old('is_using')) && in_array('1', old('is_using'))) checked="checked" 
            @endif
            >
            <label for="RadioInline3">使用中</label>
            <input name="is_using" value="0" class="is-checkradio" id="RadioInline4" type="radio" 
            @if(is_array(old('is_using')) && in_array('0', old('is_using'))) checked="checked" 
            @endif
            >
            <label for="RadioInline4">不使用</label>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">作成</button>
                <a href="/tags" class="button is-light">戻る</a>
            </div>
        </div>

        @include ('errors')
    </form>
</section>
@endsection