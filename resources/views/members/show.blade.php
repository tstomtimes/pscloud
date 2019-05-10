@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/members">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">詳細</a></li>
      </ul>
    </nav>
	<h1 class="title is-1">{{ $member->last_name }} {{ $member->first_name }}</h1>

	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>項目</th>
	      <th>内容</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<tr>
	      <th>従業員番号</th>
	      <td>{{ $member->employee_no }}</td>
	    </tr>
	  	<tr>
	      <th>名前</th>
	      <td>{{ $member->last_name }} {{ $member->first_name }}</td>
	    </tr>
	    <tr>
	      <th>名前（かな）</th>
	      <td>{{ $member->last_name_kana }} {{ $member->first_name_kana }}</td>
	    </tr>
	    <tr>
	      <th>勤務地</th>
	      <td>{{ $member->place->name }}</td>
	    </tr>
	    <tr>
	      <th>性別</th>
	      <td>@if($member->sex = 'man') 男性 @else 女性 @endif</td>
	    </tr>
	    <tr>
	      <th>メールアドレス</th>
	      <td>{{ $member->email }}</td>
	    </tr>
	    <tr>
	      <th>状態</th>
	      <td>@if($member->is_working = 1) 在籍中 @else 退職 @endif</td>
	    </tr>
	    <tr>
	      <th>備考</th>
	      <td>{{ $member->note }}</td>
	    </tr>
	    <tr>
	      <th>更新日</th>
	      <td>{{ $member->updated_at->format('Y/m/d') }}</td>
	    </tr>
	    <tr>
	      <th>登録日</th>
	      <td>{{ $member->created_at->format('Y/m/d') }}</td>
	    </tr>
	  </tbody>
	</table>
	<a href="/members/{{ $member->id }}/edit"><button type="button" class="button is-link">編集</button></a>
	<a href="/members"><button type="button" class="button is-light">戻る</button></a>
</section>
@endsection