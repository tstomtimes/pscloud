@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
	<h1 class="title is-1">権限の一覧</h1>

	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>ID</th>
	      <th>名称</th>
	      <th>更新日</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($authorities as $authority)
			<tr>
		      <th>{{ $authority->id }}</th>
		      <td><b><a href="/authorities/{{ $authority->id }}">{{ $authority->name }}</a></b></td>
		      <td>{{ $authority->updated_at->format('Y/m/d') }}</td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
	<a href="/authorities/create"><button type="button" class="button is-link">新規作成</button></a>
</section>
@endsection
