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
		<a href="/report_details/create?id={{ $report->id }}"><button type="button" class="button is-link">詳細情報の更新</button></a>
		<table>
		@foreach ($report_details as $report_detail)			
			<tr>
				<td>{{$report_detail->member->last_name}}</td>
			</tr>
		@endforeach
		</table>
	@else
		<p class="has-text-danger">まだ報告が終わっていません！</p>
		<a href="/report_details/create?id={{ $report->id }}"><button type="button" class="button is-link">詳細作成</button></a>
	@endif
	
</section>
<section class="section">
	<a href="/reports"><button type="button" class="button is-light">戻る</button></a>
</section>
@endsection