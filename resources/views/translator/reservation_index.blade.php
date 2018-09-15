<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title>yahoo</title>
    <link rel="shortcut icon" href="images/logo.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script type="text/javascript" src="http://www.codefans.net/ajaxjs/jquery-1.6.2.min.js"></script>
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
                    <a class="nav-link" href="/register">登陆</a>
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
    <hr style="height:3px;border:none;border-top:1px solid #185598; "/>
    <table class="table">
        <p>予約{{ $reservations->count() }}件がとりました。</p>
            <tr>
                <th>観光者名前</th>
                <th>予約日付</th>
                <th>予約金額</th>
                <th>予約要望</th>
                <th>操作</th>
            </tr>
            @foreach($reservations as $reservation)
            <tr>
                <td>
                    {{$translator->name}}
                </td>
                <td>
                    @foreach($reservation_days as $reservation_day)
                        {{$reservation_day->pickup_date}}
                    @endforeach
                </td>
                <td>
                    {{$reservation->cost}}
                </td>
                <td>
                    {{$reservation->reservation_comment}}
                </td>
                <td>
                   
                    <button type = "submit" name="recept">受け取り</button>&emsp;|&emsp;
                    <button type = "submit" name="refuse">断り</button>
                </td>
            </tr>
            @endforeach
        </table>
</body>
</html>