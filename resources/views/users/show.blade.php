@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/users">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">詳細</a></li>
      </ul>
    </nav>
	<h1 class="title is-1">{{ $user->name }}</h1>
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
				  <td>{{ $user->name }}</td>
				</tr>
				<tr>
				  <th>メールアドレス</th>
				  <td>{{ $user->email }}</td>
				</tr>
				<tr>
				  <th>権限</th>
				  <td>{{ $user->auth_str }}</td>
				</tr>
				<tr>
				  <th>勤務地</th>
				  @if($user->place_id != null && $user->place_id != "")
				    <td>{{ $place->name }}</td>
			      @else
		      		<td></td>
			      @endif
				</tr>
				<tr>
				  <th>更新日</th>
				  <td>{{ $user->updated_at->format('Y/m/d') }}</td>
				</tr>
				<tr>
				  <th>登録日</th>
				  <td>{{ $user->created_at->format('Y/m/d') }}</td>
				</tr>
			</tbody>
		</table>
		<a href="/users/{{ $user->id }}/edit"><button type="button" class="button is-link">編集</button></a>
		<a href="/users"><button type="button" class="button is-light">戻る</button></a>
</section>
@endsection