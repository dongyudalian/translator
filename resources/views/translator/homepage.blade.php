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

    <script>
        $(document).ready(function(){
            $.get("demo/1",function(data,status){
                var ordered_translaters = data.ordered_translaters;
                for(var i =0; i < ordered_translaters.length; i++) {

                    // var str = '<div class="col-4"><div class="person-pic"><img src="';
                    // str += ordered_translaters[i].pictures;
                    // str += '"></div><div class="person-introduction"><a href="">';
                    // str += ordered_translaters[i].name;
                    // str += '</a></div></div>';

                    // $("#tokyo").append(str);

                    
                    var img_ele = document.createElement("img", {"src":ordered_translaters[i].pictures});
                    var img_div_ele = document.createElement("div",{"class":"person-pic"});
                    img_div_ele.innerHTML = img_ele;

                    var name_ele = document.createElement("a");
                    name_ele.innerHTML = ordered_translaters[i].name;
                    $("#tokyo").append(img_div_ele,name_ele);
                    
                }
            });
        });
    </script>
    <style>
        .main-container {
            max-width: 9600px;
            margin: auto;
        }

        .carousel-inner img{
            height: 450px;
        }

        .person-pic img{
            width: 150px;
            text-align: center;
        }

        .person-introduction {
            text-align: center;
            margin-top: 5px;
        }

        .persons {
            border-left:1px solid #336699;
        }

        .area {
            margin-top: 50px;
        }

        .picture{
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
            @if(Auth::guard("visitor")->check())
                <p class="nav-link">ようこそ:{{ $user->name . '(' . $user->email . ')' }}</p>
                <a class="nav-link" href="visitor_logout">ログアウト</a>
                <a class="nav-link" href="search">検索</a>
            @elseif(Auth::check())
                <p class="nav-link">ようこそ:{{ $user->name . '(' . $user->email . ')' }}</p>
                <a class="nav-link" href="logout">ログアウト</a>
                <a class="nav-link" href="/reservation">予約管理</a>
            @else
                <div class="col-10 title">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="/visitor_register">旅客新規登録</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/translator_register">通訳新規登録</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/visitor_login">旅客ログイン</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="translator_login">通訳ログイン</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">お客様対応</a>
                        </li>
                    </ul>
                </div>

            @endif

        </div>
        <!-- navigation end -->

        @if(Session::has('message'))

            <p class="alert alert-info">{{Session::get('message') }}</p>

        @endif

        <!-- pic start -->
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
                    <img src="images/carousel-pic1.jpg">
                </div>
                <div class="carousel-item">
                    <img src="./images/carousel-pic1.jpg">
                </div>
                <div class="carousel-item">
                    <img src="images/carousel-pic1.jpg">
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
        <!-- pic end -->
        <div class="row area">
            <div class="col-7">
                <div class="picture">
                    <img src="images/tokyo.jpg" style="width:600px">
                </div>
                <div class="Introduction">
                    <span style="font-size:30px;color:#4fa79e">東京都</span>
                    <span style="color:#9c9e9e">
                        :東京（とうきょう、Tōkyō），是位于日本关东平原中部面向东京湾的国际大都市，
                        是日本事实上的首都（但并没有正式的相关法律规定）。狭义上指东京都、或东京都区部（即东京市区），
                        亦可泛指东京都及周边卫星都市群相连而成的“首都圈”（东京都会区）。
                        东京是江户幕府的所在地——江户在庆应4年7月（1868年9月）改名为东京的一个地方.
                    </span>
                </div>
            </div>
            <div class="col-5 persons">
                <div class="row" id="tokyo">





                </div>
            </div>
        </div>
    </div>
    <div class="row area">
            <div class="col-7">
                <div class="picture">
                    <img src="images/tokyo.jpg" style="width:600px">
                </div>
                <div class="Introduction">
                    <span style="font-size:30px;color:#4fa79e">东京</span>
                    <span style="color:#9c9e9e">
                        :东京（とうきょう、Tōkyō），是位于日本关东平原中部面向东京湾的国际大都市，
                        是日本事实上的首都（但并没有正式的相关法律规定）。狭义上指东京都、或东京都区部（即东京市区），
                        亦可泛指东京都及周边卫星都市群相连而成的“首都圈”（东京都会区）。
                        东京是江户幕府的所在地——江户在庆应4年7月（1868年9月）改名为东京的一个地方.
                    </span>
                </div>
            </div>
            <div class="col-5 persons">
                <div class="row">
                    <div class="col-4">
                        <div class="person-pic">
                            <img src="images/haruko.jpg">
                        </div>
                        <div class="person-introduction">
                            <a href="图片链接地址1">No.1 晴子</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="person-pic">
                            <img src="images/haruko.jpg">
                        </div>
                        <div class="person-introduction">
                            <a href="图片链接地址1">No.2 晴子</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="person-pic">
                            <img src="images/haruko.jpg">
                        </div>
                        <div class="person-introduction">
                            <a href="图片链接地址1">No.3 晴子</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="person-pic">
                            <img src="images/haruko.jpg">
                        </div>
                        <div class="person-introduction">
                            <a href="图片链接地址1">No.4 晴子</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="person-pic">
                            <img src="images/haruko.jpg">
                        </div>
                        <div class="person-introduction">
                            <a href="图片链接地址1">No.5 晴子</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="person-pic">
                            <img src="images/haruko.jpg">
                        </div>
                        <div class="person-introduction">
                            <a href="图片链接地址1">No.6 晴子</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row area">
            <div class="col-7">
                <div class="picture">
                    <img src="images/tokyo.jpg" style="width:600px">
                </div>
                <div class="Introduction">
                    <span style="font-size:30px;color:#4fa79e">东京</span>
                    <span style="color:#9c9e9e">
                        :东京（とうきょう、Tōkyō），是位于日本关东平原中部面向东京湾的国际大都市，
                        是日本事实上的首都（但并没有正式的相关法律规定）。狭义上指东京都、或东京都区部（即东京市区），
                        亦可泛指东京都及周边卫星都市群相连而成的“首都圈”（东京都会区）。
                        东京是江户幕府的所在地——江户在庆应4年7月（1868年9月）改名为东京的一个地方.
                    </span>
                </div>
            </div>
            <div class="col-5 persons">
                <div class="row">
                    <div class="col-4">
                        <div class="person-pic">
                            <img src="images/haruko.jpg">
                        </div>
                        <div class="person-introduction">
                            <a href="图片链接地址1">No.1 晴子</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="person-pic">
                            <img src="images/haruko.jpg">
                        </div>
                        <div class="person-introduction">
                            <a href="图片链接地址1">No.1 晴子</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="person-pic">
                            <img src="images/haruko.jpg">
                        </div>
                        <div class="person-introduction">
                            <a href="图片链接地址1">No.1 晴子</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="person-pic">
                            <img src="images/haruko.jpg">
                        </div>
                        <div class="person-introduction">
                            <a href="图片链接地址1">No.1 晴子</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="person-pic">
                            <img src="images/haruko.jpg">
                        </div>
                        <div class="person-introduction">
                            <a href="图片链接地址1">No.1 晴子</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="person-pic">
                            <img src="images/haruko.jpg">
                        </div>
                        <div class="person-introduction">
                            <a href="图片链接地址1">No.1 晴子</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="font-size:40px;color:#4fa79e; margin-top:50px;text-align: center;">
        日本特色饮食
    </div>
    <div class="row foodinfo" style="margin-top:50px;text-align: center;">
        <div class="col-3">
            <img src="images/food.jpg" width="200px">
        </div>
        <div class="col-3">
            <img src="images/food.jpg" width="200px">
        </div>
        <div class="col-3">
            <img src="images/food.jpg" width="200px">
        </div>
        <div class="col-3">
            <img src="images/food.jpg" width="200px">
        </div>
    </div>

    <div style="font-size:40px;color:#4fa79e; margin-top:50px;text-align: center;">
        日本特色文化
    </div>
    <div class="row foodinfo" style="margin-top:50px;text-align: center;">
        <div class="col-3">
            <img src="images/food.jpg" width="200px">
        </div>
        <div class="col-3">
            <img src="images/food.jpg" width="200px">
        </div>
        <div class="col-3">
            <img src="images/food.jpg" width="200px">
        </div>
        <div class="col-3">
            <img src="images/food.jpg" width="200px">
        </div>
    </div>
</body>
</html>
