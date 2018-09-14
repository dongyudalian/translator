<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>新規登録</title>
    </head>
    <body>
        @if(count($errors) > 0)
            <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            <ul>
        @endif
        <div class="application" style="text-align: center;">
            <h2>通訳者の新規登録</h2>
            <form class="new_application" action="{{ route('post_register') }}" method= "post" >
                @csrf
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
                                <option value="1">男</option>
                                <option value="2">女</option>
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
                        <th>パースワード</th>
                        <th>写真</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select class="select_salary" id="translator_salary" name="translator_salary">
                                <option value="">時給を選択</option>
                                @foreach($aas as $aa)
                                    <option value="{{$aa->id}}">{{$aa->value}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            @foreach($bbs as $bb)
                                <input type="checkbox" name="translator_specialities[]" value="{{$bb->id}}">{{$bb->value}}
                            @endforeach
                        </td>
                        <td>
                            @foreach($ccs as $cc)
                                <input type="checkbox" name="translator_statures[]" value="{{$cc->id}}">{{$cc->value}}
                            @endforeach
                        </td>
                        <td>
                            <select class="select_license" id="translator_license" name="translator_license">
                                <option value="">機動車免許を選択</option>
                                <option value="1">あり</option>
                                <option value="2">なし</option>
                            </select>
                        </td>
                        <td>
                            <input type="password" name="translator_password" value="">
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
                @foreach($dds as $dd)
                    <input type="checkbox" name="translator_ikus[]" value="{{$dd->id}}">{{$dd->value}}
                @endforeach
                <h3>空い時間選択</h3>
                <div class="row" style="margin-top:50px">
                    <div class="col-6">
                        <p>{{$mon}}月</p>
                    <table border='1' align='center'></br>
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
                            @if($mday <= $arr[$j-1])
                                <td width='80px'><input type='checkbox' name='translator_times[]' value='{{$year}}-{{$mon}}-{{$arr[$j-1]}}'>{{$arr[$j-1]}}</td>
                            @else
                                <td width='80px'>&nbsp&nbsp&nbsp&nbsp{{$arr[$j-1]}}</td>
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
                            @if($mday1 = $arr1[$j-1])
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
                            @if($mday2 = $arr2[$j-1])
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
                    </div>
                </div>
                <input type="submit" value="送る">
            </form>
        </div>
    </body>
</html>
