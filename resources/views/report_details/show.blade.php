@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_report')
@endsection

@section('content')

<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/report_details">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">詳細</a></li>
      </ul>
    </nav>
	<h1 class="title is-1">{{ $report_detail->last_name }} {{ $report_detail->first_name }}</h1>

	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>項目</th>
	      <th>内容</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<tr>
	      <th>報告詳細ID</th>
	      <td>{{ $report_detail->id }}</td>
	    </tr>
	  	<tr>
	      <th>レポートID</th>
	      <td>{{ $report_detail->report_id }}</td>
	    </tr>
	    <tr>
	      <th>名前</th>
	      <td>{{ $report_detail->member->last_name }} {{ $report_detail->member->first_name }}</td>
	    </tr>
	    <tr>
	      <th>勤務状況</th>
	      <td>
	      	@if($report_detail->is_working == 1)
	      	勤務
	      	@else
	      	休み
	      	@endif
	      </td>
	    </tr>
	    <tr>
	      <th>メイク数</th>
	      <td>{{ $report_detail->make_total }}</td>
	    </tr>
	    <tr>
	      <th>タグ</th>
	      <td>{{ $report_detail->tag }}</td>
	    </tr>
	    <tr>
	      <th>出社時間</th>
	      <td>{{ $report_detail->start }}</td>
	    </tr>
	    <tr>
	      <th>退社時間</th>
	      <td>{{ $report_detail->finish }}</td>
	    </tr>
	    <tr>
	      <th>更新日</th>
	      <td>{{ $report_detail->updated_at->format('Y/m/d') }}</td>
	    </tr>
	    <tr>
	      <th>登録日</th>
	      <td>{{ $report_detail->created_at->format('Y/m/d') }}</td>
	    </tr>
	  </tbody>
	</table>
	<a href="/report_details/{{ $report_detail->report_id }}/edit"><button type="button" class="button is-link">編集</button></a>
	<a href="/report_details"><button type="button" class="button is-light">戻る</button></a>
</section>
@endsection