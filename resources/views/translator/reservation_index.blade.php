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
    <div class="titlepic">
        <img src="images/carousel-pic1.jpg" style="width:1200px">
    </div>
    <hr style="height:3px;border:none;border-top:1px solid #185598; "/>
    <table class="table">
        <p>予約{{ $reservations->count() }}件がとりました。</p>
            <tr>
                <th>観光者名前</th>
                <th>予約日付</th>
                <th>予約総金額</th>
                <th>旅客からメッセージ</th>
                <th>操作機能</th>
            </tr>

            <form action="" method="post" >
                {{csrf_field()}}
			@for($i=0;$i<count($reservations);$i++)
            <tr>
				<td>
						@foreach($visitors[$i] as $aa)
						<P>
	                    	{{$aa->name}}
						</p>
						@endforeach
				</td>
				<td>
						@foreach($reservation_days[$i] as $bb)
						<p>
                        	{{$bb->pickup_date}}
						</p>
						@endforeach
				</td>
                <td>
                    {{$reservations[$i]->cost * count($reservation_days[$i])}}円

                </td>
                <td>
                    {{$reservations[$i]->reservation_comment}}
                </td>
                <td>

					 <input type="hidden" name="id" value="{{$reservations[$i]->id}}" />
                    @if($reservations[$i]->status_id==1)
                        <div class="row">
                            <div class="col-5" >

                                <a href="{{route('get_edit_reservation', ['id'=>$reservation->id,'status_id'=>'2'])}}">受け取り</a>

                            </div>

                            <div class="col-5">

                                <a href="{{route('get_edit_reservation', ['id'=>$reservation->id,'status_id'=>'3'])}}">断り</a>

                            </div>
                        </div>

                    @elseif($reservations[$i]->status_id==2)
                        <input type="button" value="予約済み">
                    @elseif($reservations[$i]->status_id==3)
                        <input type="button" value="断り済み">
                    @elseif($reservations[$i]->status_id==4)
                        <input type="button" value="期限切れ">
                    @endif
                </td>
            </tr>
            </form>
            @endfor
    </table>
</body>
</html>
