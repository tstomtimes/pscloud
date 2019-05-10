@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
	<h1 class="title is-1">タグの一覧</h1>

	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>タグID</th>
	      <th>店舗</th>
	      <th>名称</th>
	      <th>金額</th>
	      <th>使用状況</th>
	      <th>更新日</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($tags as $tag)
			<tr>
		      <td>{{ $tag->id }}</td>
		      <td>{{ $tag->place->name }}</td>
		      <td><b><a href="/tags/{{ $tag->id }}">{{ $tag->name }}</a></b></td>
		      <td>{{ $tag->price }}</td>
		      <td>
		      	@if($tag->is_using == 1)
		      	使用中
		      	@else
		      	不使用
		      	@endif
		      </td>
		      <td>{{ $tag->updated_at->format('Y/m/d') }}</td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
	<a href="/tags/create"><button type="button" class="button is-link">新規登録</button></a>
</section>
@endsection
