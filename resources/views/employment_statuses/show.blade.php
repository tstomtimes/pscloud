@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/employment_statuses">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">詳細</a></li>
      </ul>
    </nav>
	<h1 class="title is-1">{{ $employment_status->name }}</h1>

	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>項目</th>
	      <th>内容</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<tr>
	      <th>名称</th>
	      <td>{{ $employment_status->name }}</td>
	    </tr>
	    <tr>
	      <th>更新日</th>
	      <td>{{ $employment_status->updated_at->format('Y/m/d') }}</td>
	    </tr>
	    <tr>
	      <th>登録日</th>
	      <td>{{ $employment_status->created_at->format('Y/m/d') }}</td>
	    </tr>
	  </tbody>
	</table>
	<a href="/employment_statuses/{{ $employment_status->id }}/edit"><button type="button" class="button is-link">編集</button></a>
	<a href="/employment_statuses"><button type="button" class="button is-light">戻る</button></a>
</section>
@endsection