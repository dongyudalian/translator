<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>yahoo</title>
    <link rel="shortcut icon" href="images/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <style>
      .main-container {
        max-width: 1200px;
        margin: auto;
      }

      .container{
        text-align: center;
      }
    </style>
  </head>

  <body>
    <div class="main-container container-fluid">
        <!-- navigation start -->
        <div class="row">
            <div class="col-2">
                <img src="/images/logo.png" style="width: 35px; height: 35px">
            </div>
            <div class="col-10">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="/homepage">ホームページ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/visitor_logout">ログアウト</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- navigation end -->

        <!-- pic -->
        <div class="class="carousel-inner"">
          <img src="/images/carousel-pic1.jpg" style="width:1200px">
        </div>
        <!-- pic -->

        <div class="row" style="margin-top:30px;">
            <div class="col-4 pic">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- 指示符 -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <!-- 轮播图片 -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/images/haruko.jpg">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/haruko.jpg">
                    </div>
                    <div class="carousel-item">
                        <img src="/images/haruko.jpg">
                    </div>
                </div>
                <!-- 左右切换按钮 -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
          </div>
          <div class="col-8 personinfo">
              <div class="container">
                  <h2>担当個人情報</h2>
                  <div class="card">
                      <div class="card-body">
                          <p class="card-text">個人紹介：{{$translator->translator_self}}</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        </div>
        <div class="container" style="margin-top:30px;">
            <div class="card bg-primary text-white">
              <div class="card-body">誕生日：{{$translator->birthday}}
              </div>
            </div>
        </div>
        <div class="container" style="margin-top:30px;">
            <div class="card bg-warning text-white">
              <div class="card-body"> 性別：{{$translator->sex}}
              </div>
            </div>
        </div>
        <div class="container" style="margin-top:30px;">
            <div class="card bg-danger text-white">
              <div class="card-body"> 出身地：{{$translator->city}}
              </div>
            </div>
        </div>
        <div class="container" style="margin-top:30px;">
            <div class="card bg-info text-white">
              <div class="card-body">E-mail：{{$translator->email}}
              </div>
            </div>
        </div>
        <div class="container" style="margin-top:30px;">
            <div class="card bg-success text-white">
              <div class="card-body">Tel：{{$translator->tel}}
              </div>
            </div>
        </div>
        <div class="container" style="margin-top:30px;">
            <div class="card bg-secondary text-white">
              <div class="card-body">担当の料金：{{ $mtb_translator_salary->value}}
              </div>
            </div>
        </div>
        <div class="container" style="margin-top:30px;">
              <div class="card bg-dark text-white">
                <div class="card-body">得意な分野：{{ $mtb_translator_speciality->value}}
                </div>
              </div>
        </div>
        
        <div class="container" style="margin-top:30px;">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Translator Calendar Cherk</h4>
                  <a class="card-text">You can click on the <a href="{{route('choose',['id'=>$translator->id])}}" class="card-link">link</a> below to query the date.</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
