@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
	<h1 class="title is-1">従業員の一覧</h1>

	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>従業員ID</th>
	      <th>名前</th>
	      <th>勤務地</th>
	      <th>更新日</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($members as $member)
			<tr>
		      <td>{{ $member->employee_no }}</td>
		      <td><b><a href="/members/{{ $member->id }}">{{ $member->last_name }} {{ $member->first_name }}</a></b></td>
		      <td>{{ $member->place->name }}</td>
		      <td>{{ $member->updated_at->format('Y/m/d') }}</td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
	<a href="/members/create"><button type="button" class="button is-link">新規登録</button></a>
</section>
@endsection
