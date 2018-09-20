<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>通訳者新規登録</title>
    <style>
        .img{
            margin: auto;
            max-width: 1200px;
        }
        h1{
            text-align: center;
            margin-top: 50px;
        }
        span.mark{
            font-size: .875rem;
      	    display: inline-block;
      	    width: 50px;
      	    height: 20px;
      	    text-align: center;
      	    background: #e30026;
      	    color: #fff;
      	    font-weight: 400;
      	    margin-left:110px;
            margin-top: 30px;
            margin-bottom: 0px;
        }
        .position{
      	    margin-left:100px;
      	    margin-right: 100px;
      	    margin-top: 20px;
        }
        div.mark{
            font-size: .875rem;
      	    width: 50px;
      	    height: 20px;
      	    text-align: center;
      	    background: #e30026;
      	    color: #fff;
            margin:auto;
        }
        input.input1{
            border-radius: 3px;
            width: 600px;
            height:50px;
            background-color: #fff2f2;
          	border: 1px solid #e30026
        }
        dl.dl1{
          	display: table;
      	    width: 100%;
            margin: 0;
        }
        dl.dl2{
            display: table;
            width: 100%;
            border-bottom: 2px solid #DCDCDC ;
            margin: 0;
        }
        dt.dt1{
            background: #f8f9fa ;
            width: 150px;
            display: table-cell;
            padding: 40px 120px 50px 80px;
            font-weight: 1000;
            vertical-align: top;
        }
        dt.dt2{
            background: #f8f9fa ;
            width: 150px;
            display: table-cell;
            padding: 50px 120px 50px 80px;
            font-weight: 1000;
        }
        .inp{
            text-align: center;
            margin-top: 50px;
        }
        .info{
            border: 1px solid;
            color: #e9e7e7;
            max-width:1200px;
            margin: auto;
            margin-top: 1px;
        }
        p{
            text-align: center;
            color: black;
        }
        .button{
            background-image: linear-gradient(180deg,#0067cc 0,#04407a 100%);
            box-shadow: 0 1px #062440;
            color: #fff;
            width: 200px;
            height:50px;
            border-radius: 10px;
        }
        .selectput{
            width: 300px;
            height: 50px;
            margin: auto;
            font-size:20px;
            text-align-last: center;
        }
        .birthday{
            width: 300px;
            height: 50px;
            margin: auto;
            font-size:20px;
            text-align-last: center;
        }
        .checkbox1{
            font-size:30px;
            text-align-last: center;
            color: red;
        }
        .se{
            text-align-last: center;
        }
        .text-danger{
            color: red;
        }
    </style>
</head>
<body>
    <div style="text-align:center;">
        <a class="nav-link" href="/homepage"　style="">ホームページ</a>
    </div>
    <div class="img">
        <img src="images/carousel-pic1.jpg" height="300" width="1200px">
    </div>
    <h1>通訳者新規登録</h1>
    <div>
        <span class="mark">必須</span>
        <a class="font"> マークのある項目にはすべて入力してください。</a>
    </div>
    <br>
    <form action="{{route('post_register')}}" method= "post"  enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="position">
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>名前</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            <input class="input1" type="text" name="translator_name" value="{{old('translator_name')}}" placeholder="&nbsp&nbsp&nbsp名前を入力してください。(半角英数字 128文字以内)">
                            @if($errors->has('translator_name'))
                                <p class="text-danger">{{$errors->first('translator_name')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>出身地</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            <input class="input1" type="text" name="translator_birthcity" value="{{old('translator_birthcity')}}" placeholder="&nbsp&nbsp&nbsp出身地を入力してください。(半角英数字 128文字以内)">
                            @if($errors->has('translator_birthcity'))
                                <p class="text-danger">{{$errors->first('translator_birthcity')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>性別</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            <select class="selectput" id="translator_sex" name="translator_sex">
                                <option value="">性別を選択</option>
                                <option value="1" {{ old('translator_sex') == 1 ? 'selected' : '' }}>男</option>
                                <option value="2" {{ old('translator_sex') == 2 ? 'selected' : '' }}>女</option>
                            </select>
                            @if($errors->has('translator_sex'))
                                <p class="text-danger">{{$errors->first('translator_sex')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>生年月日</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            <input class="birthday" type="date" name="translator_birthday" value="{{ old('translator_birthday', date('1990-01-01')) }}">
                            @if($errors->has('translator_birthday'))
                                <p class="text-danger">{{$errors->first('translator_birthday')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>電話番号</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            <input class="input1" type="tel" name="translator_tel" value="{{old('translator_tel')}}" placeholder="&nbsp&nbsp&nbsp電話番号を入力してください。(半角英数字 128文字以内)">
                            @if($errors->has('translator_tel'))
                                <p class="text-danger">{{$errors->first('translator_tel')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>メールアドレス</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            <input class="input1" type="email" name="translator_email" value="{{old('translator_email')}}" placeholder="&nbsp&nbsp&nbspメールアドレスを入力してください。(半角英数字 128文字以内)">
                            @if($errors->has('translator_email'))
                                <p class="text-danger">{{$errors->first('translator_email')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>時給を選択</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            <select class="selectput" id="translator_salary" name="mtb_translator_salaries">
                                <option value="">時給を選択</option>
                                @foreach($aas as $aa)
                                    <option value="{{$aa->id}}" {{old('mtb_translator_salaries') == $aa->id ? 'selected' : ''}}>{{$aa->value}}円/日(約8時間)</option>
                                @endforeach
                            </select>
                            @if($errors->has('mtb_translator_salaries'))
                                <p class="text-danger">{{$errors->first('mtb_translator_salaries')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>専門性を選択</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            @foreach($bbs as $bb)
                                <input class="checkbox1" type="checkbox" name="translator_specialities[]" value="{{$bb->id}}" {{ (is_array(old('translator_specialities')) and in_array($bb->id, old('translator_specialities'))) ? ' checked' : '' }}>{{$bb->value}}
                            @endforeach
                            @if($errors->has('translator_specialities'))
                                <p class="text-danger">{{$errors->first('translator_specialities')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>外見を選択</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            @foreach($ccs as $cc)
                                <input type="checkbox" name="translator_statures[]" value="{{$cc->id}}" {{ (is_array(old('translator_statures')) and in_array($cc->id, old('translator_statures'))) ? ' checked' : '' }}>{{$cc->value}}
                            @endforeach
                            @if($errors->has('translator_statures'))
                                <p class="text-danger">{{$errors->first('translator_statures')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>機動車免許を選択</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            <select class="selectput" id="translator_license" name="translator_license">
                                <option value="">機動車免許を選択</option>
                                <option value="1" {{ old('translator_license') == 1 ? 'selected' : '' }}>あり</option>
                                <option value="2" {{ old('translator_license') == 2 ? 'selected' : '' }}>なし</option>
                            </select>
                            @if($errors->has('translator_license'))
                                <p class="text-danger">{{$errors->first('translator_license')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>パスワード</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            <input class="input1" type="password" name="translator_password" value="{{old('translator_password')}}" placeholder="&nbsp&nbsp&nbspパスワードを入力してください。(半角英数字5〜20文字以内、スペース不可)">
                            @if($errors->has('translator_password'))
                                <p class="text-danger">{{$errors->first('translator_password')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>写真</p>
                    </dt>
                    <dd>
                        <div class="inp">
                            
                            <input class="" type="file" name="translator_image" multiple="multiple"  value="">
                            @if($errors->has('name'))
                                <p class="text-danger">{{$errors->first('name')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>自己紹介</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            <textarea class="se" name="translator_self" rows="5" cols="100">{{old('translator_self')}}</textarea>
                            @if($errors->has('translator_self'))
                                <p class="text-danger">{{$errors->first('translator_self')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>行ける場所</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            @foreach($dds as $dd)
                                <input type="checkbox" name="translator_ikus[]" value="{{$dd->id}}" {{ (is_array(old('translator_ikus')) and in_array($dd->id, old('translator_ikus'))) ? ' checked' : '' }}>{{$dd->value}}
                            @endforeach
                            @if($errors->has('translator_ikus'))
                                <p class="text-danger">{{$errors->first('translator_ikus')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="row" style="margin-top:50px">
                    <div class="col-6">
                        <p>{{$mon}}月</p >
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
                                <td width='80px'><input type='checkbox' name='translator_times[]' value='{{$year}}-{{$mon}}-{{$arr[$j-1]}}' {{ (old('translator_times') and is_array(old('translator_times')) and in_array($year. "-" . $mon . "-" . $arr[$j-1], old('translator_times'))) ? ' checked' : '' }}>{{$arr[$j-1]}}</td>
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
                    <p>{{$mon1}}月</p >
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
                                <td width='80px'><input type='checkbox' name='translator_times[]' value='{{$year1}}-{{$mon1}}-{{$arr1[$j-1]}}' {{ (old('translator_times') and is_array(old('translator_times')) and in_array($year1. "-" . $mon1 . "-" . $arr1[$j-1], old('translator_times'))) ? ' checked' : '' }}>{{$arr1[$j-1]}}</td>
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
                    <p>{{$mon2}}月</p >
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
                                <td width='80px'><input type='checkbox' name='translator_times[]'value='{{$year2}}-{{$mon2}}-{{$arr2[$j-1]}}' {{ (old('translator_times') and is_array(old('translator_times')) and in_array($year2. "-" . $mon2 . "-" . $arr2[$j-1], old('translator_times'))) ? ' checked' : '' }}>{{$arr2[$j-1]}}</td>
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
                    @if($errors->has('translator_times'))
                        <p class="text-danger">{{$errors->first('translator_times')}}</p>
                    @endif
                </div>
        </div>
        <div style="text-align:center;margin-top:30px;">
            <button class="button" type="submit" value="">
                <font size="3">新規会員の登録</font>
            </button>
        </div>
    </form>
</body>
</html>
