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
    .table{
      width:1000px;
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
                <a class="nav-link" href="/homepage">ホームページ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/visitor_logout">ログアウト</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">お客様対応</a>
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
    <form id="search-form" action="{{ route('get_search') }}" method="get">
              {{ csrf_field() }}
      <div class="col-12 application">
          <h3>按照条件搜索</h3>
          <hr style="height:3px;border:none;border-top:1px solid #185598; "/>
          <div id="box">

            <h3>我要去的地方</h3>
              @foreach ($Mtb_translator_ikus as $Mtb_translator_iku)
                <input type="checkbox" name="search_mtb_translator_ikus_ids[]" value="{{$Mtb_translator_iku->id}}"
                  @if( isset($search_info['search_mtb_translator_ikus_ids']) && is_array($search_info['search_mtb_translator_ikus_ids']) && in_array($Mtb_translator_iku->id, $search_info['search_mtb_translator_ikus_ids']) )
                    checked
                  @endif
                >{{$Mtb_translator_iku->value}}
                </br>
              @endforeach
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
          <input type="date" name="search_translator_time_begin" value="{{ isset($search_info['search_translator_time_begin']) ? $search_info['search_translator_time_begin'] : '' }}">
          <h3>我要哪天结束</h3>
          <input type="date" name="search_translator_time_finish" value="{{ isset($search_info['search_translator_time_finish']) ? $search_info['search_translator_time_finish'] : '' }}">
          <hr style="height:3px;border:none;border-top:1px solid #185598; "/>

          <h3>通过价钱选择</h3>
          <select class="select_salary" id="translator_salary" name="search_mtb_translator_salary_id">
            <option value="">時給を選択</option>
              @foreach ($Mtb_translator_salaries as $Mtb_translator_salary)
                <option value="{{$Mtb_translator_salary->id}}"
                 {{ (isset($search_info["search_mtb_translator_salary_id"]) && $search_info["search_mtb_translator_salary_id"] == $Mtb_translator_salary->id) ? 'selected' : '' }}
                >{{$Mtb_translator_salary->value}}</option>
              @endforeach
          </select></br></br>
          <hr style="height:3px;border:none;border-top:1px solid #185598; "/>

          <h3>通过担当的专业性选择:</h3>
            @foreach ($Mtb_translator_specialities as $Mtb_translator_speciality)
            <input type="checkbox" name="search_mtb_translator_specialities_ids[]" value="{{$Mtb_translator_speciality->id}}"
              @if( isset($search_info['search_mtb_translator_specialities_ids']) && is_array($search_info['search_mtb_translator_specialities_ids']) && in_array($Mtb_translator_speciality->id, $search_info['search_mtb_translator_specialities_ids']) )
                checked
              @endif
            >{{$Mtb_translator_speciality->value}}
            @endforeach
          </br>
          <hr style="height:3px;border:none;border-top:1px solid #185598; "/>

          <h3>通过关键字搜索:</h3>
          <input type="text" name="search_translator_self" value="{{ isset($search_info['search_translator_self']) ? $search_info['search_translator_self'] : '' }}"></br></br>
          </br>
          <input type="submit" value="送信">
       </div>
    </form>

    <div class="row result">
      <div class="col-6 person">

        <table class="table">
        <p>{{ $translators->count() }}件が該当しました。</p>
          <tr>
              <th>名前</th>
              <th>生年月日</th>
              <th>時間金額</th>
              <th>担当領域</th>
              <th>自己評価</th>
          </tr>
          @foreach($translators as $translator)
          <tr>
            <td>
              <a  href="{{route('get_translator_info',['id'=>$translator->id])}}"> {{$translator->name}}</a>
            </td>
            <td>
              {{ date("Y.m.d", strtotime($translator->birthday))}}
            </td>
            <td>
              {{ $translator->mtb_translator_salary->value}}
            </td>
            <td>
              @foreach($translator->translator_and_specialities as $translator_and_speciality)
                {{ $translator_and_speciality->mtb_translator_speciality->value }}
              @endforeach
            </td>
            <td>
              {{ $translator->translator_self}}
            </td>

          </tr>

         @endforeach
        </table>
      </div>
    </div>
  </body>
</html>
