@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="title">アプリ一覧</h1>
    <div class="level section">
        @if(Auth::user()->auth_str != 'guest')
            <div class="level-item has-text-centered">
                <a href="/time_card"><div>
                <p class="title has-text-link"><i class="fas fa-clock fa-2x"></i></p>
                <p class="heading" style="margin-top: 10px">タイムカード</p>
                </div></a>
            </div>
            <div class="level-item has-text-centered">
                <a href="/reports"><div>
                <p class="title has-text-link"><i class="fas fa-file-alt fa-2x"></i></p>
                <p class="heading" style="margin-top: 10px">作業報告</p>
                </div></a>
            </div>
    <!--         <div class="level-item has-text-centered">
                <div>
                <p class="title has-text-link"><i class="far fa-calendar-alt fa-2x"></i></p>
                <p class="heading" style="margin-top: 10px">シフト管理</p>
                </div>
            </div> -->
    <!--         <div class="level-item has-text-centered">
                <div>
                <p class="title has-text-link"><i class="fa fa-shopping-cart fa-2x"></i></p>
                <p class="heading" style="margin-top: 10px">注文管理</p>
                </div>
            </div>
            <div class="level-item has-text-centered">
                <div>
                <p class="title has-text-link"><i class="fas fa-chart-pie fa-2x"></i></p>
                <p class="heading" style="margin-top: 10px">データ分析</p>
                </div>
            </div> -->
            @if(Auth::user()->auth_str == 'admin')
            <div class="level-item has-text-centered">
                <a href="/authorities"><div>
                <p class="title has-text-link"><i class="fas fa-users fa-2x"></i></p>
                <p class="heading" style="margin-top: 10px">各種マスタ管理</p>
                </div></a>
            </div>
            @endif
        @endif
    </div>
</div>
@endsection
