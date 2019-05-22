@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
	<h1 class="title is-1">雇用形態一覧</h1>

	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>ID</th>
	      <th>名称</th>
	      <th>更新日</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($employment_statuses as $employment_status)
			<tr>
		      <th>{{ $employment_status->id }}</th>
		      <td><b><a href="/employment_statuses/{{ $employment_status->id }}">{{ $employment_status->name }}</a></b></td>
		      <td>{{ $employment_status->updated_at->format('Y/m/d') }}</td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
	<a href="/employment_statuses/create"><button type="button" class="button is-link">新規作成</button></a>
</section>
@endsection
