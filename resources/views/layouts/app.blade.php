<?php $user = Auth::user(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <title>@yield('title', 'PS Cloud')</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
        <link rel="stylesheet" href="/css/theme.default.css">

        <!-- ファビコン -->
        <link rel="icon" href="/favicon.ico">
        <!-- スマホ用アイコン -->
        <link rel="apple-touch-icon" sizes="180x180" href="./apple-touch-icon-180x180.png">
        <!-- Windows8, 10用設定 -->
        <meta name="application-name" content="Pioneer System Cloud"/>
        <meta name="msapplication-square70x70logo" content="small.jpg"/>
        <meta name="msapplication-square150x150logo" content="medium.jpg"/>
        <meta name="msapplication-wide310x150logo" content="wide.jpg"/>
        <meta name="msapplication-square310x310logo" content="large.jpg"/>
        <meta name="msapplication-TileColor" content="#ffffff"/>

        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <script defer src="/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src='main.js'></script>
        <script class="is-mobile">
        function reload(){
            location.reload();
        }
        var sound = new Audio("/sound/b_001.mp3");
         $(function(){ 
             var aTags = $('a'); //ページ内のaタグ群を取得。aTagsに配列として代入。
             aTags.each(function(){ //全てのaタグについて処理
                if($(this).hasClass('navbar-burger')){
                    return true;
                }
                 var url = $(this).attr('href');//aタグのhref属性からリンク先url取得
                 $(this).removeAttr('href');//念のため、href属性は削除
                 $(this).click(function(){//クリックイベントをバインド
                    location.href = url;
                 });
             });
         });
        function ring(){
            // sound.stop();
            // sound.currentTime=0;
            // sound.play();
        }
        $(function() {
          // ボタンクリックで時刻を更新
          $('.button').click(function(e) {
            ring();
          });
          $('input').click(function(e) {
            ring();
          });
        });
        </script>
        <style type="text/css" media="screen">
            html, body{
              position: relative;
              overflow: hidden;
            }
            .main{
              width: 100vw;
              height: 100vh;
              padding-top: 100px;
              overflow: hidden;
            }
            .copy{
                position: absolute;
                bottom: 10px;
                right: 10px;
                text-align: right;
            }
            .navbar{
                position: absolute;
                top: 0;
                width: 100%;
                height: 52px;
            }
            .fadein {
                opacity : 0;
                transform : translate(0, 50px);
                transition : all 800ms;
            }
            .fadein.scrollin {
                opacity : 1;
                transform : translate(0, 0);
            }
            @media (max-width:850px) {
                .main{
                    overflow: auto !important;
                    -webkit-overflow-scrolling: touch;
                }
            }
        </style>
    </head>
    <body>

        <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                @if (Route::has('login'))
                    @auth
                        <a class="navbar-item" href="/dashboard" title="">
                            <img style="display: inline-block;margin-right: 10px;" src="/image/logo.png"><span class="has-text-weight-bold">PS Cloud</span>
                        </a>
                    @else
                        <a class="navbar-item" href="/" title="">
                            <img style="display: inline-block;margin-right: 10px;" src="/image/logo.png"><span class="has-text-weight-bold">PS Cloud</span>
                        </a>
                    @endauth
                @endif

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                  <span aria-hidden="true"></span>
                  <span aria-hidden="true"></span>
                  <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-end">
                    @if (Route::has('login'))
                        @auth
                            <?php $user = \Auth::user(); ?>
                            <div class="navbar-item">Login/<b>{{ $user->name }}</b></div>
                        @endauth
                    @endif
                    <div class="navbar-item">
                    </div>
                    <div class="navbar-item">
                        <div class="field is-grouped">
                            <p class="control">
                                <input type="button" class="button is-success" onclick="reload()" value="更新">
                            </p>
                            @if (Route::has('login'))
                                @auth
                                    <p class="control">
                                        <a class="button is-link" href="{{ route('logout') }}">
                                            <span class="icon">
                                                <i class="fas fa-sign-out-alt"></i>
                                            </span>
                                            <span>
                                                ログアウト
                                            </span>
                                        </a>
                                    </p>
                                @else
                                    <p class="control">
                                        <a class="button is-link" href="{{ route('login') }}">
                                            <span class="icon">
                                                <i class="fas fa-sign-in-alt"></i>
                                            </span>
                                            <span>
                                                ログイン
                                            </span>
                                        </a>
                                    </p>
                                    @if (Route::has('register'))
                                        <p class="control">
                                            <a class="button is-info" href="{{ route('register') }}">
                                                <span class="icon">
                                                    <i class="fas fa-user-edit"></i>
                                                </span>
                                                <span>
                                                    新規登録
                                                </span>
                                            </a>
                                        </p>
                                    @endif
                                @endauth
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <section class="section main">
            <div style="overflow: auto;">
                @yield('content')
            </div>
        </section>

        <p class="copy">©PIONEERSYSTEM Inc.</p>
    </body>
</html>

