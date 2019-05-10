@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_report')
@endsection

@section('content')
<section class="section">
	<nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/reports">一覧</a></li>
        <li><a href="/reports/{{ $report->id }}">詳細</a></li>
        <li class="is-active"><a href="#" aria-current="page">編集</a></li>
      </ul>
    </nav>
	<h1 class="title is-1">報告書の修正</h1>

	<form method="POST" action="/reports/{{ $report->id }}">
		@method('PATCH')
		@csrf
        <div class="field">
            <label class="label" for="place_id">店舗</label>
            <div class="control">
                <div class="select">
                    <select name="place_id">
                    @foreach ($places as $place)
                        @if(old('place_id') !== null && old('place_id') ==$place->id)
                            <option value="{{ $place->id }}" selected="selected">{{ $place->name }}</option>
                        @else
                            @if($report->place_id == $place->id)
                                <option value="{{ $place->id }}" selected="selected">{{ $place->name }}</option>
                            @else
                                <option value="{{ $place->id }}">{{ $place->name }}</option>
                            @endif
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label" for="report_id">報告者名</label>
            <div class="control">
                <div class="select">
                    <select name="member_id">
                    @foreach ($members as $member)
                        @if(old('member_id') !== null && old('member_id') ==$member->id)
                            <option value="{{ $member->id }}" selected="selected">{{ $member->last_name }} {{ $member->first_name }}</option>
                        @else
                            @if($report->member_id == $member->id)
                                <option value="{{ $member->id }}" selected="selected">{{ $member->last_name }} {{ $member->first_name }}</option>
                            @else
                                <option value="{{ $member->id }}">{{ $member->last_name }} {{ $member->first_name }}</option>
                            @endif
                        @endif
                    @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label" for="unit_price">室単価</label>
            <div class="control">
                <input type="number" class="input {{ $errors->has('unit_price') ? 'is-danger' : '' }}" name="unit_price" value="{{ $errors->any() ? old('unit_price') : $report->unit_price }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="date">報告日</label>
            <div class="control">
                <input type="date" class="input {{ $errors->has('date') ? 'is-danger' : '' }}" name="date" value="{{ $errors->any() ? old('date') : $report->date }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="ordered_rooms_quantity">作業指示数</label>
            <div class="control">
                <input type="number" class="input {{ $errors->has('ordered_rooms_quantity') ? 'is-danger' : '' }}" name="ordered_rooms_quantity" value="{{ $errors->any() ? old('ordered_rooms_quantity') : $report->ordered_rooms_quantity }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="cleaned_rooms_quantity">実際作業数</label>
            <div class="control">
                <input type="text" class="input {{ $errors->has('cleaned_rooms_quantity') ? 'is-danger' : '' }}" name="cleaned_rooms_quantity" value="{{ $errors->any() ? old('cleaned_rooms_quantity') : $report->cleaned_rooms_quantity }}">
            </div>
        </div>

        <div class="field">
            <label class="label" for="note">備考</label>
            <textarea name="note" class="textarea {{ $errors->has('note') ? 'is-danger' : '' }}">{{ $errors->any() ? old('note') : $report->note }}</textarea>
        </div>	

		<div class="field">
			<div class="control">
				<button type="submit" class="button is-link">更新</button>
				<a href="/reports" class="button is-light">戻る</a>
			</div>
		</div>	

		@include ('errors')	
	</form>
</section>
<section class="section">
	<h2 class="title is-2">報告書の削除</h2>
	<form method="POST" action="/reports/{{ $report->id }}">
		@method('DELETE')
		@csrf
		<div class="field">
			<div class="control">
				<button type="submit" class="button is-danger">削除</button>
				<a href="/reports" class="button is-light">戻る</a>
			</div>
		</div>	
	</form>
</section>
@endsection