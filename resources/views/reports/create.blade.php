@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_report')
@endsection

@section('content')
<?php 
$user = Auth::user();
$tdate = $_GET['d'];
$sdate = $_GET['ds'];
 ?>
<style type="text/css" media="screen">
    .section input{
        background-color:#feffe5 !important;
    }
    hr{
        margin-top:3px;
        margin-bottom: 3px;
    }
    .level.is-mobile{
        margin-bottom: 0;
    }
</style>
<section class="section">
    <div style="overflow: auto;margin-bottom: 500px;">
        <nav class="breadcrumb" aria-label="breadcrumbs">
          <ul>
            <li><a href="/reports">一覧</a></li>
            <li class="is-active"><a href="#" aria-current="page">作成</a></li>
          </ul>
        </nav>
        @if($user->place->name == '全店舗')
            <h1 class="title is-1">作業報告の作成</h1>
        @else
            <h1 class="title is-1">{{ $user->place->name }} 作業報告の作成</h1>
        @endif
        <form class="ui form" method="POST" action="/reports">
            {{ csrf_field() }}
            @if($user->place->name == '全店舗')
                <div class="field">
                    <label class="label" for="place_id">店舗</label>
                    <div class="control">
                        <div class="select">
                            <select name="place_id">
                                @foreach ($places as $place)
                                    @if(old('place_id') !== null && old('place_id') ==$place->id)
                                        <option value="{{ $place->id }}" selected="selected">{{ $place->name }}</option>
                                    @else
                                        <option value="{{ $place->id }}">{{ $place->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            @else
                <input type="hidden" name="place_id" value="{{ $user->place_id }}">
            @endif

            <hr>

            <div class="field">
                <label class="label" for="date">報告日</label>
                @if($user->place->name == '全店舗')
                    <div class="control">
                        <input id="date" type="date" style="font-size:40px" class="input {{ $errors->has('date') ? 'is-danger' : '' }}" name="date" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                @else
                    <div class="level">
                        <div class="level-item">
                            <span id="rdate" style="font-size: 50px;font-weight: bold;">{{ $sdate }}</span>
                        </div>
                    </div>
                 <!--    <div style="text-align: center;">
                        <div id="down" class="button is-large is-light" style="margin:10px"><i class="fas fa-angle-left"></i> 前の日</div>
                        <div id="up" class="button is-large is-light" style="margin:10px">次の日 <i class="fas fa-angle-right"></i></div>
                        <div id="today" class="button is-large is-link" style="margin:10px">今日</div>
                    </div> -->
                    <input id="date" type="hidden" name="date" value="{{ $tdate }}">
                @endif
            </div>

            <hr>
            <div class="field">
                <label class="label" for="member_id">報告者名</label>
                <div class="control" style="text-align: center;">
                    <div class="select is-large">
                        <select name="member_id">
                        @if($user->place->name == '全店舗')
                            @foreach ($members as $member)
                                @if(old('member_id') !== null && old('member_id') ==$member->id)
                                    <option value="{{ $member->id }}" selected="selected">{{ $member->last_name }} {{ $member->first_name }}</option>
                                @else
                                    <option value="{{ $member->id }}">{{ $member->last_name }} {{ $member->first_name }}</option>
                                @endif
                            @endforeach
                        @else
                            @foreach ($members as $member)
                                @if(old('member_id') !== null && old('member_id') ==$member->id)
                                    <option value="{{ $member->id }}" selected="selected">{{ $member->last_name }} {{ $member->first_name }}</option>
                                @else
                                    @if($user->place_id == $member->place_id)
                                        <option value="{{ $member->id }}">{{ $member->last_name }} {{ $member->first_name }}</option>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                        </select>
                    </div>
                </div>
            </div>

            @if($user->place->name == '全店舗')
                 <input type="hidden" name="unit_price" value="0">
            @else
                <input type="hidden" name="unit_price" value="{{ $user->place->unit_price }}">
            @endif

            <hr>
            <div class="field">
                <label class="label" for="ordered_rooms_quantity">作業指示数</label>
                <div class="control is-large has-text-centered">
                    <input type="tel" style="font-size: 40px;width: 200px;" class="tenkey input is-large has-text-centered has-text-weight-bold {{ $errors->has('ordered_rooms_quantity') ? 'is-danger' : '' }}" name="ordered_rooms_quantity" value="{{ old('ordered_rooms_quantity') }}">
                </div>
            </div>

            <input type="hidden" name="cleaned_rooms_quantity" value="0">

           <!--  <div class="field">
                <label class="label" for="cleaned_rooms_quantity">実際作業数</label>
                <div class="control">
                    <input type="text" class="input {{ $errors->has('cleaned_rooms_quantity') ? 'is-danger' : '' }}" name="cleaned_rooms_quantity" value="{{ old('cleaned_rooms_quantity') }}">
                </div>
            </div> -->

            <input type="hidden" name="note" value="">

           <!--  <div class="field">
                <label class="label" for="note">備考</label>
                <textarea name="note" class="textarea {{ $errors->has('note') ? 'is-danger' : '' }}">{{ old('note') }}</textarea>
            </div> -->
            <hr>

            <!-- Main container -->
            <div class="level is-mobile" style="margin-top: 50px;">
              <!-- Left side -->
              <div class="level-left">
                <div class="level-item">
                  <a href="/reports" class="button is-light is-large">戻る</a>
                </div>
              </div>

              <!-- Right side -->
              <div class="level-right">
                <div class="level-item">
                    <button type="submit" class="button is-link is-large">作成</button>
                </div>
              </div>
            </div>
            @include ('errors')
        </form>
    </div>
    
</section>
@endsection