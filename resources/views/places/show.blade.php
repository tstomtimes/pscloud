@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_master')
@endsection

@section('content')

<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/places">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">詳細</a></li>
      </ul>
    </nav>
	<h1 class="title is-1">{{ $place->name }}</h1>
	<div class="columns">
		<div class="column">
			<table class="table is-striped is-hoverable" style="width: 100%">
				<thead>
					<tr>
					  <th>項目</th>
					  <th>内容</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					  <th>事業所番号</th>
					  <td>{{ $place->place_no }}</td>
					</tr>
					<tr>
					  <th>名称</th>
					  <td>{{ $place->name }}</td>
					</tr>
					<tr>
					  <th>名称（かな）</th>
					  <td>{{ $place->name_kana }}</td>
					</tr>
					<tr>
					  <th>位置（緯度経度）</th>
					  <td>{{ $place->position }}</td>
					</tr>
					<tr>
					  <th>住所</th>
					  <td>{{ $place->address }}<br><a class="button is-link" target="_blank" href="https://maps.google.com/maps?q=<?php echo $place->position ?>">Google Map で開く</a></td>
					</tr>
					<tr>
					  <th>室単価</th>
					  <td>{{ $place->unit_price }}</td>
					</tr>
					<tr>
					  <th>備考</th>
					  <td>{{ $place->note }}</td>
					</tr>
					<tr>
					  <th>更新日</th>
					  <td>{{ $place->updated_at->format('Y/m/d') }}</td>
					</tr>
					<tr>
					  <th>登録日</th>
					  <td>{{ $place->created_at->format('Y/m/d') }}</td>
					</tr>
				</tbody>
			</table>
			<a href="/places/{{ $place->id }}/edit"><button type="button" class="button is-link">編集</button></a>
			<a href="/places"><button type="button" class="button is-light">戻る</button></a>
		</div>
		<div class="column" style="height: 500px;width: 100%;">
			<div id="map" style="height: 100%;width: 100%;"></div>
			<script>
				window.onload = function () {
				// 地図のデフォルトの緯度経度と拡大率
				// 適当に日本の真ん中あたり(35.5, 137)をZoomレベル5で
				var map = L.map('map').setView([<?php echo $place->position; ?>], 8);

				var tileLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
				attribution: '© <a href="http://osm.org/copyright">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
				maxZoom: 19
				});
				tileLayer.addTo(map);

				var marker = L.marker([<?php echo $place->position; ?>]).addTo(map);
				
				}
			</script>
		</div>
	</div>
</section>
@endsection