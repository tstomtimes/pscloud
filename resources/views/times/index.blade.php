@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
	<h1 class="title is-1">タイムカードの一覧</h1>

	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>ID</th>
	      <th>名前</th>
	      <th>出社時刻</th>
	      <th>退社時刻</th>
        <th>休憩開始時刻</th>
	      <th>休憩終了時刻</th>
	      <th>更新時刻</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($times as $time)
			<tr>
		      <th>{{ $time->id }}</th>
		      <td><b><a href="/times/{{ $time->id }}">{{ $time->member->last_name }} {{ $time->member->first_name }}</a></b></td>
		      <td>{{ $time->in }}</td>
		      <td>{{ $time->out }}</td>
          <td>{{ $time->rest_in }}</td>
		      <td>{{ $time->rest_out }}</td>
		      <td>{{ $time->updated_at->format('Y/m/d') }}</td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
	<a href="/times/create"><button type="button" class="button is-link">新規登録</button></a>
</section>
@endsection
