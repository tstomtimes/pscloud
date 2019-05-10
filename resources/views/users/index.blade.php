@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
	<h1 class="title is-1">ユーザーの一覧</h1>

	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>ID</th>
	      <th>名前</th>
	      <th>メールアドレス</th>
	      <th>権限</th>
	      <th>勤務地</th>
	      <th>更新時刻</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($users as $user)
			<tr>
		      <th>{{ $user->id }}</th>
		      <td><b><a href="/users/{{ $user->id }}">{{ $user->name }}</a></b></td>
		      <td>{{ $user->email }}</td>
		      <td>{{ $user->auth_str }}</td>
		      @if($user->place_id != null && $user->place_id != "")
			      @foreach($places as $place)
			      	@if($user->place_id == $place->id)
			      	<td>{{ $place->name }}</td>
			      	@endif
			      @endforeach
		      @else
		      <td></td>
		      @endif
		      <td>{{ $user->updated_at->format('Y/m/d') }}</td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
</section>
@endsection
