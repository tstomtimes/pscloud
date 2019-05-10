@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')
<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/tags">一覧</a></li>
        <li><a href="/tags/{{ $tag->id }}">詳細</a></li>
        <li class="is-active"><a href="#" aria-current="page">編集</a></li>
      </ul>
    </nav>
    <h1 class="title is-1">タグの修正</h1>
    <form method="POST" action="/tags/{{ $tag->id }}">
        @method('PATCH')
        @csrf
        <div class="field">
            <label class="label" for="place_id">店舗</label>
            <div class="select">
                <select name="place_id" class="form-control">
                    @if($places)
                        @foreach($places as $place)
                            @if($place->id == $tag->place_id)
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
            <label class="label" for="name">タグ名称</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" value="{{ $tag->name }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="price">金額</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('price') ? 'is-danger' : '' }}" name="price" value="{{ $tag->price }}">
            </div>
        </div>
        <div class="field">
            <input name="is_using" value="1" class="is-checkradio" id="exampleRadioInline1" type="radio" @if(is_array(old('is_using')) && in_array('1', old('is_using'))) checked="checked" @elseif($tag->is_using == '1') checked="checked" @endif>
            <label for="exampleRadioInline1">使用中</label>
            <input name="is_using" value="0" class="is-checkradio" id="exampleRadioInline2" type="radio" @if(is_array(old('is_using')) && in_array('0', old('is_using'))) checked="checked" @elseif($tag->is_using == '0') checked="checked" @endif>
            <label for="exampleRadioInline2">不使用</label>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">更新</button>
                <a href="/tags" class="button is-light">戻る</a>
            </div>
        </div>
        @include ('errors') 
    </form>
</section>

<section class="section">
    <h2 class="title is-2">タグの削除</h2>
    <form method="POST" action="/tags/{{ $tag->id }}">
        @method('DELETE')
        @csrf
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-danger">削除</button>
                <a href="/tags" class="button is-light">戻る</a>
            </div>
        </div>  
    </form>
</section>
@endsection