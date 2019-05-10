@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_report')
@endsection

@section('content')

<section class="section">
	<h1 class="title is-1">作業報告詳細の一覧</h1>

	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>作業報告詳細ID</th>
	      <th>名前</th>
	      <th>勤務状況</th>
	      <th>報告日</th>
	      <th>メイク数</th>
	      <th>特記項目</th>
	      <th>出社時間</th>
	      <th>退社時間</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($report_details as $report_detail)
			<tr>
				<td>{{ $report_detail->id }}</td>
		      <td><b><a href="/report_details/{{ $report_detail->id }}">{{ $report_detail->member->last_name }} {{ $report_detail->member->first_name }}</a></b></td>
		      <td>
		      	@if($report_detail->is_working == 1)
		      	<button class="button is-success">勤務</button>
		      	@else
		      	<button class="button">休み</button>
		      	@endif
		      </td>
		      <td>{{ $report_detail->date }}</td>
		      <td>{{ $report_detail->make_total }}</td>
		      <td>{{ $report_detail->tag }}</td>
		   	  <td>{{ $report_detail->start }}</td>
		   	  <td>{{ $report_detail->finish }}</td>
		    </tr>
		@endforeach
	  </tbody>
	</table>
	<a href="/report_details/create"><button type="button" class="button is-link">新規登録</button></a>
</section>
@endsection
