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
                <img src="images/logo.png" style="width: 35px; height: 35px">
            </div>
            <div class="col-10">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">注册</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">登陆</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">个人信息</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">公司简介</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">客服</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- navigation end -->

        <!-- pic -->
        <div class="titlepic">
          <img src="images/carousel-pic1.jpg" style="width:1200px">
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
                        <img src="images/haruko.jpg">
                    </div>
                    <div class="carousel-item">
                        <img src="images/haruko.jpg">
                    </div>
                    <div class="carousel-item">
                        <img src="images/haruko.jpg">
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
          <div class="col-8 personinfo" style=" background:yellow">

            个人信心介绍：{{$translator->translator_self}}


          </div>
        </div>

        <div class="container" style="margin-top:30px;">
            <div class="card">

              <div class="card-body">担当料金：{{ $mtb_translator_salary->value}}</div>

            </div>
            </div>
          <div class="container" style="margin-top:30px;">
              <div class="card">

                <div class="card-body">擅长领域：{{ $mtb_translator_speciality->value}}
                </div>

              </div>
              </div>

        <div class="container" style="margin-top:30px;">
            <div class="card">
              <div class="card-body">用户对当前翻译评价：</div>
            </div>
            </div>

        <div class="row" style="margin-top:50px">
          <div class="col-6">
            本月空闲时间:
            <table border='1' align='center'>10月</br>
              <tr>
                <th>星期日</th>
                <th>星期一</th>
                <th>星期二</th>
                <th>星期三</th>
                <th>星期四</th>
                <th>星期五</th>
                <th>星期六</th>
              </tr>
              <tr>
                    <td width='80px'></td>
                    <td width='80px'><input type='checkbox' name='translator_time'>1</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>2</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>3</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>4</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>5</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>6</td>
                </tr>
                <tr>
                    <td width='80px'><input type='checkbox' name='translator_time'>7</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>8</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>9</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>10</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>11</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>12</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>13</td>
                </tr>
                <tr>
                    <td width='80px'><input type='checkbox' name='translator_time'>14</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>15</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>16</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>17</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>18</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>19</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>20</td>
                </tr>
                <tr>
                    <td width='80px'><input type='checkbox' name='translator_time'>21</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>22</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>23</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>24</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>25</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>26</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>27</td>
                </tr>
                <tr>
                    <td width='80px'><input type='checkbox' name='translator_time'>28</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>29</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>30</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>31</td>
                </tr>
            </table>
          </div>


          <div class="col-6">
            次月空闲时间:
            <table border='1' align='center'>11月</br>
                <tr>
                    <th>星期日</th>
                    <th>星期一</th>
                    <th>星期二</th>
                    <th>星期三</th>
                    <th>星期四</th>
                    <th>星期五</th>
                    <th>星期六</th>
                </tr>
                <tr>
                    <td width='80px'></td>
                    <td width='80px'></td>
                    <td width='80px'></td>
                    <td width='80px'></td>
                    <td width='80px'><input type='checkbox' name='translator_time'>1</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>2</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>3</td>
                </tr>
                <tr>
                    <td width='80px'><input type='checkbox' name='translator_time'>4</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>5</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>6</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>7</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>8</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>9</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>10</td>
                </tr>
                <tr>
                    <td width='80px'><input type='checkbox' name='translator_time'>11</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>12</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>13</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>14</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>15</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>16</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>17</td>
                </tr>
                <tr>
                    <td width='80px'><input type='checkbox' name='translator_time'>18</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>19</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>20</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>21</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>22</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>23</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>24</td>
                </tr>
                <tr>
                    <td width='80px'><input type='checkbox' name='translator_time'>25</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>26</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>27</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>28</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>29</td>
                    <td width='80px'><input type='checkbox' name='translator_time'>30</td>
                </tr>
            </table>
          </div>
        </div>

        <div class"info1" style="margin-top:50px"; align="center">
          <input type="submit" name="" value="送る">
        </div>


</body>

</html>
