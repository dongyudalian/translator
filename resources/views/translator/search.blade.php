@extends('')

@section('content')

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

    .application{
      margin-top:50px;
      text-align: center;
    }

    .person{
      text-align: center;
    }

    .person{
      margin-top:20px;
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

      <div class="col-12 application">
          <h3>按照条件搜索</h3>
          <hr style="height:3px;border:none;border-top:1px solid #185598; "/>
              <div id="box">
              <h3>我要去的地方</h3>
              <form class="" action="index.html" method="post">
              {{ csrf_field() }}
                  <input type="checkbox" name="mtb_translator_ikus_id[]" value="1">东京
                  <input type="checkbox" name="mtb_translator_ikus_id[]" value="2">大阪
                  <input type="checkbox" name="mtb_translator_ikus_id[]" value="3">北海道
                  <input type="checkbox" name="mtb_translator_ikus_id[]" value="4">冲绳
                  <input type="checkbox" name="mtb_translator_ikus_id[]" value="5">横滨</br></br>
                  <script>
                  function show(){
                  var box = document.getElementById("box");
                  var text = box.innerHTML;               //text是所有的文本
                  var newBox = document.createElement("div"); //截取要一开始先显示的一部分放入newBox里面
                  var btn = document.createElement("a");
                  newBox.innerHTML = text.substring(0,400);
                  btn.innerHTML = text.length > 400 ? "...显示更多" : "";
                  btn.href = "#";
                  btn.onclick = function(){
                  if (btn.innerHTML == "...显示更多"){
                  btn.innerHTML = "收起";
                  newBox.innerHTML = text;
                  }else{
                  btn.innerHTML = "...显示更多";
                  newBox.innerHTML = text.substring(0,400);
                  }
                  }
                  box.innerHTML = "";
                  box.appendChild(newBox);
                  box.appendChild(btn);
                  }


                  show();
                  </script>
              </div>
              <hr style="height:3px;border:none;border-top:1px solid #185598; "/>
              <h3>我要哪天开始</h3>
              <input type="date" name="search_translator_time_begin" value="">
              <h3>我要哪天结束</h3>
              <input type="date" name="search_translator_time_finish" value="">
              <hr style="height:3px;border:none;border-top:1px solid #185598; "/>
              <h3>通过价钱选择</h3>
              <select class="select_salary" id="translator_salary" name="translator_salary_id">
                  <option value="">時給を選択</option>
                  <option value="0">1000円/時</option>
                  <option value="1">1500円/時</option>
                  <option value="2">2000円/時</option>
                  <option value="3">2500円/時</option>
              </select></br></br>
              <hr style="height:3px;border:none;border-top:1px solid #185598; "/>
              <h3>通过担当的专业性选择:</h3>
              <input type="radio" name="mtb_translator_specialities_id" value="0">生活
              <input type="radio" name="mtb_translator_specialities_id" value="1">商務</br></br>
              <hr style="height:3px;border:none;border-top:1px solid #185598; "/>
              <h3>通过关键字搜索:</h3>
              <input type="text" name="translator_self" value=""></br></br>
              </form></br>
              <input type="submit" name="" value="搜索"></br></br>
              <hr style="height:3px;border:none;border-top:1px solid #185598; "/>

              <!-- <h3>搜索结果一览</h3>
              <h4><a href="123">  1.小王(18岁,一小时1000) 此处是照片</a></h4>
              <h4><a href="123">  2.小张(28岁,一小时2000) 此处是照片</a></h4>
              <h4><a href="123">  3.小红(28岁,一小时3000) 此处是照片</a></h4> -->
      </div>

      <div class="row result">
        <div class="col-6 person">
          <img src="images/haruko.jpg" style="width:200px">

        </div>
        <div class="col-6 person">
          <table>
            <tr>
              <td>
                
              @foreach($Translators as $Translator) 
                {{$Translator}}
              @endforeach
              </td>
            </tr>
            <tr>
              <td>
                年龄
              </td>
            </tr>
            <tr>
              <td>
                小时费
              </td>
            </tr>
            <tr>
              <td>
                商务
              </td>
            </tr>
            <tr>
              <td>
                大阪
              </td>
            </tr>
            <tr>
              <td>
                我爱足球
              </td>
            </tr>
          </table>
        </div>
        <div class="col-6 person">
          <img src="images/haruko.jpg" style="width:200px">
          <!-- <br>1.姓名 年龄 小时费 商务 大阪 我爱足球 -->
        </div>
        <div class="col-6 person">
          <table>
            <tr>
              <td>
                姓名
              </td>
            </tr>
            <tr>
              <td>
                年龄
              </td>
            </tr>
            <tr>
              <td>
                小时费
              </td>
            </tr>
            <tr>
              <td>
                商务
              </td>
            </tr>
            <tr>
              <td>
                大阪
              </td>
            </tr>
            <tr>
              <td>
                我爱足球
              </td>
            </tr>
          </table>
        </div>
        <div class="col-6 person">
          <img src="images/haruko.jpg" style="width:200px">
          <!-- <br>1.姓名 年龄 小时费 商务 大阪 我爱足球 -->
        </div>
        <div class="col-6 person">
          <table>
            <tr>
              <td>
                姓名
              </td>
            </tr>
            <tr>
              <td>
                年龄
              </td>
            </tr>
            <tr>
              <td>
                小时费
              </td>
            </tr>
            <tr>
              <td>
                商务
              </td>
            </tr>
            <tr>
              <td>
                大阪
              </td>
            </tr>
            <tr>
              <td>
                我爱足球
              </td>
            </tr>
          </table>
        </div>
      </div>


  </body>
@endsection