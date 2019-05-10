@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')
<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/members">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">作成</a></li>
      </ul>
    </nav>
    <h1 class="title is-1">従業員の作成</h1>
    <form method="POST" action="/members">
        {{ csrf_field() }}
        <div class="field">
            <label class="label" for="employee_no">従業員番号</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('employee_no') ? 'is-danger' : '' }}" name="employee_no" value="{{ old('employee_no') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="last_name">姓</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('last_name') ? 'is-danger' : '' }}" name="last_name" value="{{ old('last_name') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="first_name">名</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('first_name') ? 'is-danger' : '' }}" name="first_name" value="{{ old('first_name') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="last_name_kana">姓（かな）</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('last_name_kana') ? 'is-danger' : '' }}" name="last_name_kana" value="{{ old('last_name_kana') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="first_name_kana">名（かな）</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('first_name_kana') ? 'is-danger' : '' }}" name="first_name_kana" value="{{ old('first_name_kana') }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="place_id">勤務地</label>
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
            <input name="sex" value="man" class="is-checkradio" id="RadioInline1" type="radio" name="RadioInline" @if(is_array(old('sex')) && in_array('man', old('sex'))) checked="checked" @endif>
            <label for="RadioInline1">男</label>
            <input name="sex" value="woman" class="is-checkradio" id="RadioInline2" type="radio" name="RadioInline" @if(is_array(old('sex')) && in_array('woman', old('sex'))) checked="checked" @endif>
            <label for="RadioInline2">女</label>
        </div>

        <div class="field">
            <label class="label" for="email">メールアドレス</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('email') ? 'is-danger' : '' }}" name="email" value="{{ old('email') }}">
            </div>
        </div>

        <div class="field">
            <input name="is_working" value="1" class="is-checkradio" id="RadioInline3" type="radio" @if(is_array(old('is_working')) && in_array('1', old('is_working'))) checked="checked" @endif>
            <label for="RadioInline3">在籍中</label>
            <input name="is_working" value="0" class="is-checkradio" id="RadioInline4" type="radio" @if(is_array(old('is_working')) && in_array('0', old('is_working'))) checked="checked" @endif>
            <label for="RadioInline4">退職</label>
        </div>

        <div class="field">
            <label class="label" for="note">備考</label>
            <textarea name="note" class="textarea {{ $errors->has('note') ? 'is-danger' : '' }}">{{ old('note') }}</textarea>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">作成</button>
                <a href="/members" class="button is-light">戻る</a>
            </div>
        </div>

        @include ('errors')
    </form>
</section>
@endsection