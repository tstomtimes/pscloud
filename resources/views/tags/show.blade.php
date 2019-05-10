@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/tags">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">詳細</a></li>
      </ul>
    </nav>
	<h1 class="title is-1">{{ $tag->last_name }} {{ $tag->first_name }}</h1>

	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>項目</th>
	      <th>内容</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<tr>
	      <th>タグID</th>
	      <td>{{ $tag->id }}</td>
	    </tr>
	    <tr>
	      <th>名前</th>
	      <td>{{ $tag->name }}</td>
	    </tr>
	    <tr>
	      <th>金額</th>
	      <td>{{ $tag->price }}</td>
	    </tr>
	    <tr>
	      <th>状態</th>
	      <td>@if($tag->is_using == 1) 使用中 @else 不使用 @endif</td>
	    </tr>
	    <tr>
	      <th>更新日</th>
	      <td>{{ $tag->updated_at->format('Y/m/d') }}</td>
	    </tr>
	    <tr>
	      <th>登録日</th>
	      <td>{{ $tag->created_at->format('Y/m/d') }}</td>
	    </tr>
	  </tbody>
	</table>
	<a href="/tags/{{ $tag->id }}/edit"><button type="button" class="button is-link">編集</button></a>
	<a href="/tags"><button type="button" class="button is-light">戻る</button></a>
</section>
@endsection