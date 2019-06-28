@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_report')
@endsection

@section('content')

<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/reports">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">詳細</a></li>
      </ul>
    </nav>
	<h1 class="title is-1" style="margin-bottom: 50px;">{{ $report->place->name }} ( {{ $report->date }} )</h1>
	<a href="/reports/{{ $report->id }}/edit"><button type="button" class="button is-link">基本情報の編集</button></a>
	<ul style="font-size: 30px;margin-top: 20px;">
		<li>報告者： {{ $report->member->last_name }} {{ $report->member->first_name }}</li>
		<li>指示数： {{ $report->ordered_rooms_quantity }} 室</li>
	</ul>
</section>
<section class="section">
	@if($report_details)
		<a href="/report_details/{{ $report->id }}/edit"><button type="button" class="button is-link">詳細情報の編集</button></a>
    <table class="table is-striped is-hoverable">
  	  <thead>
  	    <tr>
  	      <th>詳細ID</th>
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
        <?php $i = 0; ?>
  	  	@foreach($report_details as $report_detail)
  			<tr>
  				<td>{{ $report_detail->id }}</td>
  		      <td><b><a href="/report_details/{{ $report_detail->id }}">{{ $report_detail->member->last_name }} {{ $report_detail->member->first_name }}</a></b></td>
  		      <td>
  		      	@if($report_detail->is_working == 1)
  		      	<div class="button is-success">勤務</div>
  		      	@else
  		      	<div class="button">休み</div>
  		      	@endif
  		      </td>
  		      <td>{{ $report_detail->date }}</td>
  		      <td>{{ $report_detail->make_total }}</td>
            <?php $i = $i + $report_detail->make_total ?>
  		      <td>{{ $report_detail->tag }}</td>
  		   	  <td>{{ $report_detail->start }}</td>
  		   	  <td>{{ $report_detail->finish }}</td>
  		    </tr>
  		@endforeach
  	  </tbody>
  	</table>
    <ul style="font-size: 30px;margin-top: 20px;">
  		<li>実清掃数合計： {{ $i }} 室</li>
  	</ul>
	@else
		<p class="has-text-danger">まだ報告が終わっていません！</p>
		<a href="/report_details/create?id={{ $report->id }}"><button type="button" class="button is-link">詳細作成</button></a>
	@endif

</section>
<section class="section">
	<a href="/reports"><button type="button" class="button is-light">戻る</button></a>
</section>
@endsection
