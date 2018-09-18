<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <style type="text/css">
        p{
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
        <form class="" action="" method="post">
            <input type="hidden" name="status_id" value="1">
            @csrf

            <p>この通訳者さんが出勤できる時間を選択してください</p>
            <p>{{$mon}}月</p>
            <table border='1' align='center'>
                <tr>
                    <th>星期日</th>
                    <th>星期一</th>
                    <th>星期二</th>
                    <th>星期三</th>
                    <th>星期四</th>
                    <th>星期五</th>
                    <th>星期六</th>
                </tr>
                @for($j=1;$j<=count($arr);$j++)
                    @php
                    $n++;
                    @endphp

                    @if($n==1)
                    <tr>
                    @endif
                    @if(in_array($year."-".$mon."-".$arr[$j-1],$work_dates) && !in_array($year."-".$mon."-".$arr[$j-1],$choose_times))
                        <td width='80px'><input type='checkbox' name='translator_times[]' value='{{$year}}-{{$mon}}-{{$arr[$j-1]}}'>{{$arr[$j-1]}}</td>
                    @else
                        <td width='80px'value='{{$year}}-{{$mon}}-{{$arr[$j-1]}}'>&nbsp&nbsp&nbsp&nbsp{{$arr[$j-1]}}</td>
                    @endif
                    @if($n==7)
                        </tr>
                        @php
                        $n=0
                        @endphp
                    @endif
                @endfor
                @if($n!=7)
                    </tr>
                @endif
                </table></br></br>
                <p>{{$mon1}}月</p>
                <table border='1' align='center'>
                <tr>
                    <th>星期日</th>
                    <th>星期一</th>
                    <th>星期二</th>
                    <th>星期三</th>
                    <th>星期四</th>
                    <th>星期五</th>
                    <th>星期六</th>
                </tr>
                @for($j=1;$j<=count($arr1);$j++)
                    @php
                    $n1++;
                    @endphp
                    @if($n1==1)
                    <tr>
                    @endif
                    @if(in_array($year1."-".$mon1."-".$arr1[$j-1],$work_dates) && !in_array($year1."-".$mon1."-".$arr1[$j-1],$choose_times))
                        <td width='80px'><input type='checkbox' name='translator_times[]' value='{{$year1}}-{{$mon1}}-{{$arr1[$j-1]}}'>{{$arr1[$j-1]}}</td>
                    @else
                        <td width='80px'>&nbsp&nbsp&nbsp&nbsp{{$arr1[$j-1]}}</td>
                    @endif
                    @if($n1==7)
                        </tr>
                        @php
                        $n1=0
                        @endphp
                    @endif
                @endfor
                @if($n1!=7)
                    </tr>
                @endif
            </table></br></br>
            <p>{{$mon2}}月</p>
            <table border='1' align='center'>
                <tr>
                    <th>星期日</th>
                    <th>星期一</th>
                    <th>星期二</th>
                    <th>星期三</th>
                    <th>星期四</th>
                    <th>星期五</th>
                    <th>星期六</th>
                </tr>
                @for($j=1;$j<=count($arr2);$j++)
                    @php
                    $n2++;
                    @endphp
                    @if($n2==1)
                    <tr>
                    @endif
                    @if(in_array($year2."-".$mon2."-".$arr2[$j-1],$work_dates) && !in_array($year2."-".$mon2."-".$arr2[$j-1],$choose_times))
                        <td width='80px'><input type='checkbox' name='translator_times[]'value='{{$year2}}-{{$mon2}}-{{$arr2[$j-1]}}'>{{$arr2[$j-1]}}</td>
                    @else
                        <td width='80px'>&nbsp&nbsp&nbsp&nbsp{{$arr2[$j-1]}}</td>
                    @endif
                    @if($n2==7)
                        </tr>
                        @php
                        $n2=0
                        @endphp
                    @endif
                @endfor
                @if($n2!=7)
                    </tr>
                @endif
            </table></br></br>
            <div class="container" style="text-align:center;">
                <div class="card">
                    <div class="card-body">通訳者に連絡するメッセージを入力
                        <div  style="margin-top:20px;"><textarea name="reservation_comment" rows="3" cols="130"></textarea></div></br></br>
                    </div>
                    <p　name="salary" value="{{ $mtb_translator_salary->value}}">担当の料金最後の確認：{{ $mtb_translator_salary->value}}</p>
                    <div class"info1" style="margin-bottom:20px"; align="center">
                        <button type="submit" class="btn btn-outline-primary">予約確定</button>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
