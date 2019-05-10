@extends('layouts.app_side')

@section('sidebar')
    @include('component.sidebar_report')
@endsection

@section('content')
<style type="text/css" media="screen">
    input{
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
<script type="text/javascript">
$(function() {
  $(".tenkey").keypad({
    layout: ['789','456','123','0'+$.keypad.BACK],
    keypadOnly: true,
    showAnim: '',
    keypadClass: 'ten'
  }).keypad('option', 'backText', '⌫');

  $(".option").keypad({
    separator: '|',
    layout: [
    <?php 
    foreach ($tags as $tag){
        if ($report_detail->report->place_id == $tag->place_id && $tag->is_using == '1') {
            echo "'".$tag->name."',";
        }
    }
    ?>
    $.keypad.CLEAR],
    keypadOnly: true,
    showAnim: '',
    keypadClass: 'option'
  }).keypad('option', 'clearText', '消去');
});


</script>
<section class="section">
    <nav class="breadcrumb" aria-label="breadcrumbs">
      <ul>
        <li><a href="/report_details">一覧</a></li>
        <li class="is-active"><a href="#" aria-current="page">作成</a></li>
      </ul>
    </nav>
    <h1 class="title is-1">{{ $report_detail->report->place->name }} {{ $report_detail->report->date }}</h1>
    <form method="POST" action="/report_details">
        {{ csrf_field() }}
        <input type="hidden" name="report_id" value="{{ $report_detail->report_id }}">
        <input type="hidden" name="place_id" value="{{ $report_detail->report->place_id }}">
        <input type="hidden" name="place_id" value="{{ $report_detail->date }}">
        <?php
            use Carbon\Carbon; 
            $i = 1 
        ?>
        <div class="level is-mobile">
            <div class="level-item" style="justify-content: flex-start;width: 80px;">名前</div>
            <div class="level-item" style="justify-content: flex-start;width: 50px;">
                <div class="field">メイク数</div>
            </div>
            <div class="level-item" style="justify-content: flex-start;width: 120px;">
                <div class="field">出社時間</div>
            </div>
            <div class="level-item" style="justify-content: flex-start;width: 120px;">
                <div class="field">退社時間</div>
            </div>
            <div class="level-item" style="justify-content: flex-start;width: 200px">
                <div class="field">（オプション）</div>
            </div>
        </div>
        <hr>
        <div style="overflow: auto;">
            @foreach ($members as $member)
                @foreach ($report_details as $report_detail)
                    @if($member->id == $report_detail->member_id)
                        <div class="level is-mobile">
                            <div class="level-item" style="justify-content: flex-start;">
                                <div id="name{{ $i }}" style="width: 100px;" class="button">{{ $member->last_name }} {{ $member->first_name }}</div>
                            </div>
                            <input type="hidden" name="member_id{{ $i }}" value="{{ $member->id }}">
                            <input type="hidden" id="is_working{{ $i }}" name="is_working{{ $i }}" value="{{ $report_detail->is_working }}">
                            <script type="text/javascript">
                            $(document).ready(function(){
                                if ($("#is_working{{ $i }}").val() == 0) {
                                    $('#make{{ $i }}').attr('type', 'hidden');
                                    $('#in{{ $i }}-1').attr('type', 'hidden');
                                    $('#in{{ $i }}-2').attr('type', 'hidden');
                                    $('#out{{ $i }}-1').attr('type', 'hidden');
                                    $('#out{{ $i }}-2').attr('type', 'hidden');
                                    $('#tag{{ $i }}').attr('type', 'hidden');
                                    $("#is_working{{ $i }}").val("0");
                                    $('#name{{ $i }}').removeClass('is-success');
                                    $('.ex{{$i}}').hide();
                                }else{
                                    $('#make{{ $i }}').attr('type', 'tel');
                                    $('#in{{ $i }}-1').attr('type', 'tel');
                                    $('#in{{ $i }}-2').attr('type', 'tel');
                                    $('#out{{ $i }}-1').attr('type', 'tel');
                                    $('#out{{ $i }}-2').attr('type', 'tel');
                                    $('#tag{{ $i }}').attr('type', 'text');
                                    $("#is_working{{ $i }}").val("1");
                                    $('#name{{ $i }}').addClass('is-success');
                                    $('.ex{{$i}}').show();
                                }
                            });
                            $(function() {
                                $('#name{{ $i }}').on('click',function(){
                                    if ($("#is_working{{ $i }}").val() == 1) {
                                        $('#make{{ $i }}').attr('type', 'hidden');
                                        $('#in{{ $i }}-1').attr('type', 'hidden');
                                        $('#in{{ $i }}-2').attr('type', 'hidden');
                                        $('#out{{ $i }}-1').attr('type', 'hidden');
                                        $('#out{{ $i }}-2').attr('type', 'hidden');
                                        $('#tag{{ $i }}').attr('type', 'hidden');
                                        $("#is_working{{ $i }}").val("0");
                                        $('#name{{ $i }}').removeClass('is-success');
                                        $('.ex{{$i}}').hide();
                                    }else{
                                        $('#make{{ $i }}').attr('type', 'tel');
                                        $('#in{{ $i }}-1').attr('type', 'tel');
                                        $('#in{{ $i }}-2').attr('type', 'tel');
                                        $('#out{{ $i }}-1').attr('type', 'tel');
                                        $('#out{{ $i }}-2').attr('type', 'tel');
                                        $('#tag{{ $i }}').attr('type', 'text');
                                        $("#is_working{{ $i }}").val("1");
                                        $('#name{{ $i }}').addClass('is-success');
                                        $('.ex{{$i}}').show();
                                    }
                                });
                            });
                        </script>
                            <div class="level-item" style="justify-content: flex-start;">
                                <div class="field">
                                    <div class="control is-large">
                                        <input id="make{{ $i }}" name="make{{ $i }}" type="hidden" style="width: 60px" class="tenkey input has-text-centered has-text-weight-bold {{ $errors->has('make.$i') ? 'is-danger' : '' }}" value="{{ $report_detail->make_total }}">
                                    </div>
                                </div>
                            </div>
                            <?php 
                                $start = Carbon::createFromTimeString($report_detail->start, 'Asia/Tokyo');
                                $finish = Carbon::createFromTimeString($report_detail->finish, 'Asia/Tokyo');
                            ?>
                            <div class="level-item" style="justify-content: flex-start;">
                                <div class="field">
                                    <div class="control">
                                        <input id="in{{ $i }}-1" name="in{{ $i }}-1" type="hidden" style="width: 60px" class="tenkey input has-text-centered has-text-weight-bold" value="{{ $start->hour }}">
                                        <span class="ex{{$i}}" style="font-size: 20px;display: none;"> : </span>
                                        <input id="in{{ $i }}-2" name="in{{ $i }}-2" type="hidden" style="width: 60px" class="tenkey input has-text-centered has-text-weight-bold" value="{{ $start->minute }}">
                                    </div>
                                </div>
                            </div>
                            <div class="level-item" style="justify-content: flex-start;">
                                <div class="field">
                                    <div class="control">
                                        <input id="out{{ $i }}-1" name="out{{ $i }}-1" type="hidden" style="width: 60px" class="tenkey input has-text-centered has-text-weight-bold" value="{{ $finish->hour }}">
                                        <span class="ex{{$i}}" style="font-size: 20px;display: none;"> : </span>
                                        <input id="out{{ $i }}-2" name="out{{ $i }}-2" type="hidden" style="width: 60px" class="tenkey input has-text-centered has-text-weight-bold" value="{{ $finish->minute }}">
                                    </div>
                                </div>
                            </div>
                            <div class="level-item" style="justify-content: flex-start;">
                                <div class="field">
                                    <div class="control">
                                        <input type="hidden" id="tag{{ $i }}" name="tag{{ $i }}" style="width: 200px" class="option input has-text-centered has-text-weight-bold" value="{{ $report_detail->tag }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    <?php $i++ ?>
                    @endif
                @endforeach 
            @endforeach 
        </div>

        <input type="hidden" name="member_count" value="{{ $i }}">

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">更新</button>
                <a href="/report_details" class="button is-light">戻る</a>
            </div>
        </div>

        @include ('errors')
    </form>
</section>
@endsection