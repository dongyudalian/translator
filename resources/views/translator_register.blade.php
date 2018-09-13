<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>新規登録</title>
    </head>
    <img src="japan1.png" alt="" width="auto" height="auto">

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
                    本月空闲时间:
                    <table border='1' align='center'>10月</br>
                      <tr>
                        <th>星期日</th>
                        <th>星期一</th>
                        <th>星期二</th>
                        <th>星期三</th>
                        <th>星期四</th>
                        <th>星期五</th>
                        <th>星期六</th>
                      </tr>
                      <tr>
                            <td width='80px'></td>
                            <td width='80px'><input type='checkbox' name='translator_times[]'value='2018-10-01'>1</td>
                            <td width='80px'><input type='checkbox' name='translator_times[]'value='2018-10-02'>2</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>3</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>4</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>5</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>6</td>
                        </tr>
                        <tr>
                            <td width='80px'><input type='checkbox' name='translator_time'>7</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>8</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>9</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>10</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>11</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>12</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>13</td>
                        </tr>
                        <tr>
                            <td width='80px'><input type='checkbox' name='translator_time'>14</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>15</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>16</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>17</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>18</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>19</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>20</td>
                        </tr>
                        <tr>
                            <td width='80px'><input type='checkbox' name='translator_time'>21</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>22</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>23</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>24</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>25</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>26</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>27</td>
                        </tr>
                        <tr>
                            <td width='80px'><input type='checkbox' name='translator_time'>28</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>29</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>30</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>31</td>
                        </tr>
                    </table>
                  </div>


                  <div class="col-6">
                    次月空闲时间:
                    <table border='1' align='center'>11月</br>
                        <tr>
                            <th>星期日</th>
                            <th>星期一</th>
                            <th>星期二</th>
                            <th>星期三</th>
                            <th>星期四</th>
                            <th>星期五</th>
                            <th>星期六</th>
                        </tr>
                        <tr>
                            <td width='80px'></td>
                            <td width='80px'></td>
                            <td width='80px'></td>
                            <td width='80px'></td>
                            <td width='80px'><input type='checkbox' name='translator_time'>1</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>2</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>3</td>
                        </tr>
                        <tr>
                            <td width='80px'><input type='checkbox' name='translator_time'>4</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>5</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>6</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>7</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>8</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>9</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>10</td>
                        </tr>
                        <tr>
                            <td width='80px'><input type='checkbox' name='translator_time'>11</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>12</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>13</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>14</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>15</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>16</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>17</td>
                        </tr>
                        <tr>
                            <td width='80px'><input type='checkbox' name='translator_time'>18</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>19</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>20</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>21</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>22</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>23</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>24</td>
                        </tr>
                        <tr>
                            <td width='80px'><input type='checkbox' name='translator_time'>25</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>26</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>27</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>28</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>29</td>
                            <td width='80px'><input type='checkbox' name='translator_time'>30</td>
                        </tr>
                    </table>
                  </div>
                </div>
                <input type="submit" value="送る">
            </form>
        </div>
    </body>
</html>
