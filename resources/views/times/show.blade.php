@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/times">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">詳細</a></li>
      </ul>
    </nav>
	<h1 class="title is-1">{{ $time->name }}</h1>
		<table class="table is-striped is-hoverable" style="width: 100%">
			<thead>
				<tr>
				  <th>項目</th>
				  <th>内容</th>
				</tr>
			</thead>
			<tbody>
				<tr>
				  <th>名前</th>
				  <td>{{ $time->member->last_name }} {{ $time->member->first_name }}</td>
				</tr>
				<tr>
				  <th>出社時刻</th>
				  <td>{{ $time->in }}</td>
				</tr>
				<tr>
				  <th>退社時刻</th>
				  <td>{{ $time->out }}</td>
				</tr>
				<tr>
				  <th>更新日</th>
				  <td>{{ $time->updated_at->format('Y/m/d') }}</td>
				</tr>
				<tr>
				  <th>登録日</th>
				  <td>{{ $time->created_at->format('Y/m/d') }}</td>
				</tr>
			</tbody>
		</table>
		<a href="/times/{{ $time->id }}/edit"><button type="button" class="button is-link">編集</button></a>
		<a href="/times"><button type="button" class="button is-light">戻る</button></a>
</section>
@endsection
