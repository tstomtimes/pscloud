@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_report')
@endsection

@section('content')

<?php 

$user = Auth::user();
use Carbon\Carbon;
$today = new Carbon();
$dt = $today;
 ?>
 <style type="text/css">
<!--
.date{
	font-size: 20px;
}
-->
</style>
<section class="section">
	<h1 class="title is-1">{{ $user->place->name }} 作業報告一覧</h1>
	<table class="table is-striped is-hoverable">
	  <thead>
	    <tr>
	      <th>報告日</th>
	      <th>ホテル名</th>
	      <th>報告者</th>
	      <th>作業指示数</th>
	      <th>更新日</th>
	      <th>操作</th>
	    </tr>
	  </thead>
	  <tbody>
	  	@for ($i = 0; $i < 35; $i++)
		    <?php 
		    $week = array( "日", "月", "火", "水", "木", "金", "土" );
			// echo $week[date("w")];
		    $dtf = $dt->toDateString();
		    $day = $dt->dayOfWeek;
		    $dts = $dt->format('Y/m/d');
		    $dts = $dts.'('.$week[$day].')';
		    $findFlg = 0;
		     ?>
		     @foreach($reports as $report)
		     	@if($dtf == $report->date)
		     		<?php $findFlg = 1; ?>
					<tr>
					  <td class="date has-text-weight-bold">{{ $dts }}
					  	<br>
						@if($report->cleaned_rooms_quantity == null || $report->cleaned_rooms_quantity == '')
							@foreach($report_details as $report_detail)
				     			@if($report->id == $report_detail->report_id && $dtf == $report_detail->report->date)
				     				<?php $findFlg = 2; ?>
				     			@endif
				     		@endforeach
				     		@if($findFlg == 1)
				     			<span class="has-text-info">作成中...</span>
				     		@elseif($findFlg == 2)
				     			<span class="has-text-success">送信済</span>
				     		@endif
						@else
							<span class="has-text-success">送信済</span>
						@endif
					  </td>
					  <td>{{ $report->place->name }}</td>
					  <td>{{ $report->member->last_name }} {{ $report->member->first_name }}</td>
					  <td>{{ $report->ordered_rooms_quantity }}</td>
				      <td>{{ $report->updated_at->format('Y/m/d') }}</td>
				      @if($report->cleaned_rooms_quantity == null || $report->cleaned_rooms_quantity == '')
					  	<td><a href="/reports/{{ $report->id }}"><button class="button is-info is-rounded is-large">編集</button></a></td>
					  @else
					  	<td><a href="/reports/{{ $report->id }}"><button class="button is-rounded is-large">確認</button></a></td>
					  @endif
				    </tr>
				    <?php break; ?>
			    @endif
			@endforeach
			@if($findFlg == 0)
			<tr>
			  <td class="date has-text-weight-bold">{{ $dts }}<br>
			  <span class="has-text-danger">未送信</span></td>
			  <td></td>
			  <td></td>
			  <td></td>
		      <td></td>
		      <td><a href="/reports/create?d={{ $dtf }}&ds={{ $dts }}"><button class="button is-danger is-rounded is-large">作成</button></a></td>
		    </tr>
			@endif
			<?php $dt->subDay(); ?>
		@endfor
	  </tbody>
	</table>
<!-- 	<a href="/reports/create"><button type="button" class="button is-link">新規登録</button></a> -->
</section>
@endsection
