<html>
<head>
    <style>
        .img{
            margin: auto;
            max-width: 1200px;
        }
        h1.position{
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
            margin-bottom: 10px;
        }
        div.position{
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
            padding: 50px 120px 50px 80px;
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
        p.message1{
            margin: 10px 40px 10px 40px;
        }
        button.button{
            background-image: linear-gradient(180deg,#0067cc 0,#04407a 100%);
            box-shadow: 0 1px #062440;
            color: #fff;
            width: 200px;
            height:50px;
            border-radius: 10px;
        }
        .text-danger{
            color: red;
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
    </style>
</head>
<body>
    <div class="img">
        <img src="images/carousel-pic1.jpg" height="300" width="1200px">
    </div>
    <h1 class="position">旅客新規登録</h1>
    <span class="mark">必須</span>
    <a class="font"> マークのある項目にはすべて入力してください。</a>
    <form action="" method="post">
        {{csrf_field()}}
        <div class="position">
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>名前</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            <input class="input1" type="text" name="name" value="{{old('name')}}" placeholder="&nbsp&nbsp&nbsp名前を入力してください。(半角英数字 128文字以内)">
                            @if($errors->has('name'))
                                <p class="text-danger">{{$errors->first('name')}}</p>
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
                            <input class="input1" type="text" name="name" value="{{old('name')}}" placeholder="&nbsp&nbsp&nbspメールアドレスを入力してください。(半角英数字 128文字以内)">
                            @if($errors->has('name'))
                                <p class="text-danger">{{$errors->first('name')}}</p>
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
                            <input class="input1" type="text" name="name" value="{{old('name')}}" placeholder="&nbsp&nbsp&nbspパスワードを入力してください。(半角英数字5〜20文字以内、スペース不可)">
                            @if($errors->has('name'))
                                <p class="text-danger">{{$errors->first('name')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
            </div>
            <div class="info">
                <dl class="dl1">
                    <dt class="dt1"><p>パスワード再入力</p>
                        <div class="mark">必須</div>
                    </dt>
                    <dd>
                        <div class="inp">
                            <input class="input1" type="text" name="name" value="{{old('name')}}" placeholder="&nbsp&nbsp&nbsp同じパスワードを再入力してください。">
                            @if($errors->has('name'))
                                <p class="text-danger">{{$errors->first('name')}}</p>
                            @endif
                        </div>
                    </dd>
                </dl>
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
