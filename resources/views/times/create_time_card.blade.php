@extends('layouts.app')
@section('content')
  <?php
    use Carbon\Carbon;
   ?>
     @if($time <> null && $time->out == null)
         <h1 style="text-align: center;margin-bottom: 30px;">{{$member->last_name}} {{$member->first_name}}さん、お疲れ様でした。</h1>
     @else
         <h1 style="text-align: center;margin-bottom: 30px;">{{$member->last_name}} {{$member->first_name}}さん、こんにちは。</h1>
     @endif
    <h2 id="RealtimeClockArea2" style="text-align: center;margin-bottom: 50px;color:#888888;">　</h2>
    <form method="post" action="{{route('store_time_card')}}">
        <input type="hidden" name="member_id" value="{{$member->id}}">
        <input type="hidden" name="time" value="<?php echo Carbon::now() ?>">
        {{csrf_field()}}
          @if($time <> null && $time->out == null)
              <button type="submit" style="width:50%;height:200px;font-size: 50pt" class="btn btn-success center-block">終了</button>
              <input type="hidden" name="status" value="out">
          @else
              <button type="submit" style="width:50%;height:200px;font-size: 50pt" class="btn btn-primary center-block">開始</button>
              <input type="hidden" name="status" value="in">
          @endif
        <a href="{{route('time_card')}}" style="text-decoration: none"><button style="width:20%;height:100px;font-size: 20pt;margin-top: 50px" class="btn btn-default center-block">キャンセル</button></a>
    </form>
@stop
