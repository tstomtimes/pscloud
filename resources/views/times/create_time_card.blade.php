@extends('layouts.app_side')
@section('content')
  <?php
    use Carbon\Carbon;
   ?>
     @if($time <> null && $time->out == null)
         <h1 style="text-align: center;margin-bottom: 30px;">{{$member->last_name}} {{$member->first_name}}さん、お疲れ様でした。</h1>
     @else
         <h1 style="text-align: center;margin-bottom: 30px;">{{$member->last_name}} {{$member->first_name}}さん、こんにちは。</h1>
     @endif

    <div class="camera">
      <video id="video">Video stream not available.</video>
      <button id="startbutton">Take photo</button>
    </div>
    <canvas id="canvas" style="display:none;">
    </canvas>
    <div class="output">
      <img id="photo" alt="The screen capture will appear in this box.">
    </div>

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
          <input type="hidden" name="face" id="face" value="">
        <a href="{{route('time_card')}}" style="text-decoration: none"><button style="width:20%;height:100px;font-size: 20pt;margin-top: 50px" class="btn btn-default center-block">キャンセル</button></a>
    </form>
    <script type="text/javascript">
        (function() {
      // The width and height of the captured photo. We will set the
      // width to the value defined here, but the height will be
      // calculated based on the aspect ratio of the input stream.

      var width = 320;    // We will scale the photo width to this
      var height = 0;     // This will be computed based on the input stream

      // |streaming| indicates whether or not we're currently streaming
      // video from the camera. Obviously, we start at false.

      var streaming = false;

      // The various HTML elements we need to configure or control. These
      // will be set by the startup() function.

      var video = null;
      var canvas = null;
      var photo = null;
      var startbutton = null;

      function startup() {
        video = document.getElementById('video');
        canvas = document.getElementById('canvas');
        photo = document.getElementById('photo');
        startbutton = document.getElementById('startbutton');

        navigator.mediaDevices.getUserMedia({video: true, audio: false})
        .then(function(stream) {
          video.srcObject = stream;
          video.play();
        })
        .catch(function(err) {
          console.log("An error occurred: " + err);
        });

        video.addEventListener('canplay', function(ev){
          if (!streaming) {
            height = video.videoHeight / (video.videoWidth/width);

            // Firefox currently has a bug where the height can't be read from
            // the video, so we will make assumptions if this happens.

            if (isNaN(height)) {
              height = width / (4/3);
            }

            video.setAttribute('width', width);
            video.setAttribute('height', height);
            canvas.setAttribute('width', width);
            canvas.setAttribute('height', height);
            streaming = true;
          }
        }, false);

        startbutton.addEventListener('click', function(ev){
          takepicture();
          ev.preventDefault();
        }, false);

        clearphoto();
      }

      // Fill the photo with an indication that none has been
      // captured.

      function clearphoto() {
        var context = canvas.getContext('2d');
        context.fillStyle = "#AAA";
        context.fillRect(0, 0, canvas.width, canvas.height);

        var data = canvas.toDataURL('image/jpeg', 0.85);
        photo.setAttribute('src', data);
      }

      // Capture a photo by fetching the current contents of the video
      // and drawing it into a canvas, then converting that to a PNG
      // format data URL. By drawing it on an offscreen canvas and then
      // drawing that to the screen, we can change its size and/or apply
      // other changes before drawing it.

      function takepicture() {
        var context = canvas.getContext('2d');
        if (width && height) {
          canvas.width = width;
          canvas.height = height;
          context.drawImage(video, 0, 0, width, height);

          var data = canvas.toDataURL('image/jpeg', 0.85);
          document.getElementById("face").value = data;
          photo.setAttribute('src', data);
        } else {
          clearphoto();
        }
      }

      // Set up our event listener to run the startup process
      // once loading is complete.
      window.addEventListener('load', startup, false);
    })();


    function submitForm(event){
      event.preventDefaulst();
      var form = document.getElementById("form");
      var newInput = document.createElement("input");  //input要素作成
      newInput.type="hidden";
      newInupt.name = "canvas";
      newInput.value = data;  //値を設定
      form.appendChild(newInput);  //formにinupt要素を追加

      form.submit(); //送信
    }
    </script>
@stop
