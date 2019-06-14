@extends('layouts.app')
@section('content')
    <h1>{{$place->name}}</h1>
    <p>該当の名前を選択してください。</p>
    @if($members)
        @foreach($members as $member)
            @if($member->is_working == false)
                <a href="{{route('create_time_card', $member->id)}}"><button class="button is-gray" style="margin:10px;height:100px;font-size: 25pt;padding-left: 50px;padding-right: 50px">{{$member->last_name}} {{$member->first_name}}</button></a>
            @else
                <a href="{{route('create_time_card', $member->id)}}"><button class="button is-success" style="margin:10px;height:100px;font-size: 25pt;padding-left: 50px;padding-right: 50px">{{$member->last_name}} {{$member->first_name}}</button></a>
            @endif
        @endforeach
    @endif
@stop
