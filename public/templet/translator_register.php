<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>新規登録</title>
    </head>
    <img src="japan1.png" alt="" width="auto" height="auto">

    <body>
        <div class="application" style="text-align: center;">
            <h2>通訳者の新規登録</h2>
            <form class="new_application" action="" method="post">
                <h3>基本資料</h3>
                <table id="table-1" border="1" align="center">
                    <thead>
                        <th>名前</th>
                        <th>出身地</th>
                        <th>出生年月日</th>
                        <th>性別</th>
                        <th>電話番号</th>
                        <th>Eメール</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <input type="text" name="translator_name" value="">
                        </td>
                        <td>
                            <input type="text" name="translator_birthcity" value="">
                        </td>
                        <td>
                            <input type="date" name="translator_birthday" value="">
                        </td>
                        <td>
                            <select class="select_frame" id="translator_sex" name="translator_sex">
                                <option value="">性別を選択</option>
                                <option value="0">男</option>
                                <option value="1">女</option>
                            </select>
                        </td>
                        <td>
                            <input type="tel" name="translator_tel" value="">
                        </td>
                        <td>
                            <input type="email" name="translator_email" value="">
                        </td>
                    </tr>
                    </tbody>
                    <thead>
                        <th>料金設定</th>
                        <th>専門性</th>
                        <th>外見</th>
                        <th>免許</th>
                        <th>興味</th>
                        <th>写真</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select class="select_salary" id="translator_salary" name="translator_salary">
                                <option value="">時給を選択</option>
                                <option value="0">1000円/時</option>
                                <option value="1">1500円/時</option>
                                <option value="2">2000円/時</option>
                                <option value="3">2500円/時</option>
                            </select>
                        </td>
                        <td>
                            <input type="radio" name="translator_speciality" value="0">生活
                            <input type="radio" name="translator_speciality" value="1">商務
                        </td>
                        <td>
                            <input type="checkbox" name="translator_stature" value="1">運動
                            <input type="checkbox" name="translator_stature" value="2">淑やか
                            <input type="checkbox" name="translator_stature" value="3">可愛い
                            <input type="checkbox" name="translator_stature" value="4">成熟
                        </td>
                        <td>
                            <select class="select_license" id="translator_license" name="translator_license">
                                <option value="">機動車免許を選択</option>
                                <option value="0">あり</option>
                                <option value="1">なし</option>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="translator_interest" value="">
                        </td>
                        <td>
                            <input type="file" name="translator_image" multiple="multiple"  value="">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <h3>自己紹介</h3>
                <textarea name="translator_self" rows="14" cols="140"></textarea>
                <h3>行ける場所</h3>
                <input type="checkbox" name="translator_iku" value="1">东京
                <input type="checkbox" name="translator_iku" value="2">大阪
                <input type="checkbox" name="translator_iku" value="3">北海道
                <input type="checkbox" name="translator_iku" value="4">冲绳
                <input type="checkbox" name="translator_iku" value="5">横滨
                <h3>空い時間選択</h3>
                <?php
                    $time = getdate();
                    $mday = $time["mday"];
                    $mon = $time["mon"];
                    $year = $time["year"];

                    if($mon==4||$mon==6||$mon==9||$mon==11){
                        $day = 30;
                    }elseif($mon==2){
                        if(($year%4==0&&$year%100!=0)||$year%400==0){
                            $day = 29;
                        }else{
                            $day = 28;
                        }
                    }else{
                        $day = 31;
                    }
                    $w = getdate(mktime(0,0,0,$mon,1,$year))["wday"];
                    $date = function($day,$w){
                    echo "<table border='1' align='center'>";
                    echo date("n")."月" ;
                    echo "<tr><th>星期日</th><th>星期一</th><th>星期二</th><th>星期三</th><th>星期四</th><th>星期五</th><th>星期六</th></tr>";
                    $arr = array();
                    for($i=1;$i<=$day;$i++){
                        array_push($arr,$i);
                    }
                    if($w>=1&&$w<=6){
                        for($m=1;$m<=$w;$m++){
                            array_unshift($arr,"");
                        }
                    }
                    $n=0;
                    for($j=1;$j<=count($arr);$j++){
                        $n++;
                        if($n==1) echo "<tr>";
                        global $mday;
                        if($mday > $arr[$j-1]){
                            echo "<td width='80px'>".$arr[$j-1]."</td>";
                        }
                        else{
                            echo "<td width='80px'><input type='checkbox' name='translator_time'>".$arr[$j-1]."</td>";
                        }
                        if($n==7){
                            echo "</tr>";
                            $n=0;
                        }
                    }
                    if($n!=7)echo "</tr>";
                    echo "</table>";
                    };
                    $date($day,$w);
                ?>
                <?php
                    $time = getdate();
                    $mday = $time["mday"];
                    $mon = $time["mon"]+1;
                    $year = $time["year"];

                    if($mon==4||$mon==6||$mon==9||$mon==11){
                        $day = 30;
                    }elseif($mon==2){
                        if(($year%4==0&&$year%100!=0)||$year%400==0){
                            $day = 29;
                        }else{
                            $day = 28;
                        }
                    }else{
                        $day = 31;
                    }
                    $w = getdate(mktime(0,0,0,$mon,1,$year))["wday"];
                    $date = function($day,$w){
                    echo "<table border='1' align='center'>";
                    echo (date("n")+1)."月" ;
                    echo "<tr><th>星期日</th><th>星期一</th><th>星期二</th><th>星期三</th><th>星期四</th><th>星期五</th><th>星期六</th></tr>";
                    $arr = array();
                    for($i=1;$i<=$day;$i++){
                        array_push($arr,$i);
                    }
                    if($w>=1&&$w<=6){
                        for($m=1;$m<=$w;$m++){
                            array_unshift($arr,"");
                        }
                    }
                    $n=0;
                    for($j=1;$j<=count($arr);$j++){
                        $n++;
                        if($n==1) echo "<tr>";
                        global $mday;
                        if($arr[$j-1] == 0){
                            echo "<td width='80px'>".$arr[$j-1]."</td>";
                        }
                        else{
                            echo "<td width='80px'><input type='checkbox' name='translator_time'>".$arr[$j-1]."</td>";
                        }
                        if($n==7){
                            echo "</tr>";
                            $n=0;
                        }
                    }
                    if($n!=7)echo "</tr>";
                    echo "</table>"."</br>";
                    };
                    $date($day,$w);
                ?>
                <?php
                    $time = getdate();
                    $mday = $time["mday"];
                    $mon = $time["mon"]+2;
                    $year = $time["year"];

                    if($mon==4||$mon==6||$mon==9||$mon==11){
                        $day = 30;
                    }elseif($mon==2){
                        if(($year%4==0&&$year%100!=0)||$year%400==0){
                            $day = 29;
                        }else{
                            $day = 28;
                        }
                    }else{
                        $day = 31;
                    }
                    $w = getdate(mktime(0,0,0,$mon,1,$year))["wday"];
                    $date = function($day,$w){
                    echo "<table border='1' align='center'>";
                    echo (date("n")+2)."月" ;
                    echo "<tr><th>星期日</th><th>星期一</th><th>星期二</th><th>星期三</th><th>星期四</th><th>星期五</th><th>星期六</th></tr>";
                    $arr = array();
                    for($i=1;$i<=$day;$i++){
                        array_push($arr,$i);
                    }
                    if($w>=1&&$w<=6){
                        for($m=1;$m<=$w;$m++){
                            array_unshift($arr,"");
                        }
                    }
                    $n=0;
                    for($j=1;$j<=count($arr);$j++){
                        $n++;
                        if($n==1) echo "<tr>";
                        global $mday;
                        if($arr[$j-1] == 0){
                            echo "<td width='80px'>".$arr[$j-1]."</td>";
                        }
                        else{
                            echo "<td width='80px'><input type='checkbox' name='translator_time'>".$arr[$j-1]."</td>";
                        }
                        if($n==7){
                            echo "</tr>";
                            $n=0;
                        }
                    }
                    if($n!=7)echo "</tr>";
                    echo "</table>"."</br>";
                    };
                    $date($day,$w);
                ?>
            </form>
            <input type="submit" name="" value="送る">
        </div>
    </body>
</html>
