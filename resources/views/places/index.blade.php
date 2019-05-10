@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
	<h1 class="title is-1">勤務地の一覧</h1>

	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>ID</th>
	      <th>事業所番号</th>
	      <th>名称</th>
	      <th>更新日</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($places as $place)
			<tr>
		      <td>{{ $place->id }}</th>
		      <td>{{ $place->place_no }}</th>
		      <td><b><a href="/places/{{ $place->id }}">{{ $place->name }}</a></b></td>
		      <td>{{ $place->updated_at->format('Y/m/d') }}</td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
	<a href="/places/create"><button type="button" class="button is-link">新規登録</button></a>
</section>
@endsection
