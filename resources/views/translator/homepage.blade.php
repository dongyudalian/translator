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
                    var str = '<div class="col-4"><div class="person-pic"><img src="';
                    str += ordered_translaters[i].pictures;
                    str += '"></div><div class="person-introduction"><a href="';
                    str +='/translator_info/';
                    str += ordered_translaters[i].id;
                    str +='">';
                    str += ordered_translaters[i].name;
                    str += '</a ></div></div>';

                    $("#tokyo").append(str);
                }
            });

            $.get("demo/2",function(data,status){
                var ordered_translaters = data.ordered_translaters;
                for(var i =0; i < ordered_translaters.length; i++) {
                    var str = '<div class="col-4"><div class="person-pic"><img src="';
                    str += ordered_translaters[i].pictures;
                    str += '"></div><div class="person-introduction"><a href="';
                    str +='/translator_info/';
                    str += ordered_translaters[i].id;
                    str +='">';
                    str += ordered_translaters[i].name;
                    str += '</a ></div></div>';

                    $("#osaka").append(str);
                }
            });

            $.get("demo/3",function(data,status){
                var ordered_translaters = data.ordered_translaters;
                for(var i =0; i < ordered_translaters.length; i++) {
                    var str = '<div class="col-4"><div class="person-pic"><img src="';
                    str += ordered_translaters[i].pictures;
                    str += '"></div><div class="person-introduction"><a href="';
                    str +='/translator_info/';
                    str += ordered_translaters[i].id;
                    str +='">';
                    str += ordered_translaters[i].name;
                    str += '</a ></div></div>';

                    $("#hokaido").append(str);
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
                <div class="row" id ="tokyo">



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
                    <span style="font-size:30px;color:#4fa79e">大阪</span>
                    <span style="color:#9c9e9e">
                        「大阪」这个地名，本来是指大和川与淀川之间横跨南北的上町台地的北端区域，古代属于摂津国东成郡。
                        关于这个汉字地名最早的记录是，1496年，浄土真宗中兴的祖先莲如所写的御文中所出现的「摂州东成郡生玉乃庄内大坂」的相关记载。
                        本来，莲如所称的大坂一带，在古代是浪速（难波・浪花・浪华）等地域的名称，
                        莲如在如今的大阪城域中建立了大坂御坊（石山本愿寺），这股势力向周边延伸，便定称为大坂。
                        这个名字来源，虽然有种说法是因为该地区有个很大的坡（日语：坂），因此才叫大坂，但是在莲如以前的大坂，
                        发音不是「オホサカ」，而是「ヲサカ」，而且在各种资料中也会看到有「小坂（おさか）」的叫法（日在《日本书记》中称为乌瑳箇）。因此这种说法是缺少信赖性的。
                        莲如以后，大坂的读音为「おおざか」。江户时代，商人传兵卫遇到海难，漂流到俄罗斯帝国，俄罗斯人将发音听成为「ウザカ」并流传开来。
                        也有说法是因为以前大阪站的工作人员将「おさか」的发音延迟读作「おーさか」，才慢慢流传为「おおさか」这种读音。
                    </span>
                </div>
            </div>
            <div class="col-5 persons">
                <div class="row" id ="osaka">

                </div>
            </div>
        </div>

        <div class="row area">
            <div class="col-7">
                <div class="picture">
                    <img src="images/tokyo.jpg" style="width:600px">
                </div>
                <div class="Introduction">
                    <span style="font-size:30px;color:#4fa79e">北海道</span>
                    <span style="color:#9c9e9e">
                        北海道旧称虾夷地，曾居住着阿伊努族人。16世纪末，松前氏渡海建造了福山城，占领了土地。
                        后俄罗斯人南下，出于国防需要，开展了对北海道、千岛、萨哈林岛等地的探险活动，不久北海道就成为幕府的直辖地。
                        1868年（明治元年），明治新政府决定在虾夷地设置箱馆裁判所，随即把名称改为箱馆府。1869年虾夷地改称北海道，设置11国86郡（地理分区）。
                        同年7月设置北海道开拓使（箱馆府因此废除）之后，北海道的开拓正式进行。1882年废止开拓使，设置函馆，札幌，根室三县取代开拓使。
                        1886年代替3县设置北海道厅。由于明治政府的政策许多日本人从内地的各地移住，开拓的热潮涌入了道内各地。
                    </span>
                </div>
            </div>
            <div class="col-5 persons">
                <div class="row" id="hokaido">

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
