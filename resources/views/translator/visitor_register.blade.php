<html>
  <head>
    <style>
	   div.img{
       text-align:center;
	   }

     h1.position{
       margin-left:100px;
     }

     span.mark{
       font-size: .875rem;
  	    display: inline-block;
  	    width: 50px;
  	    height: 20px;
  	    line-height: 20px;
  	    text-align: center;
  	    background: #e30026;
  	    color: #fff;
  	    font-weight: 400;
  	    margin-left:100px;
      }

      a.font{
        font-weight: 700;
    	  color:red;
      }

      div.position{
      	margin-left:100px;
      	margin-right: 100px;
      	margin-top: 20px;
      	border-top: 1px solid;
      	border-bottom: 1px solid ;
      }

      div.mark{
        font-size: .875rem;
  	    display: inline-block;
  	    width: 50px;
  	    height: 20px;
  	    text-align: center;
  	    background: #e30026;
  	    color: #fff;
  	    font-weight: 400;
        margin-right: 5px;
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
	      border-bottom: 2px solid #DCDCDC;
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
		  border-top: 1px solid;
		  border-bottom: 1px solid #DCDCDC
      }

      dt.dt2{
          background: #f8f9fa ;
	      width: 150px;
	      display: table-cell;
	      padding: 50px 120px 50px 80px;
	      font-weight: 1000;
	      vertical-align: top;
		    border-bottom: 1px solid #DCDCDC
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
    </style>
  </head>

  <body>
    <div class="img">
      <img src="images/carousel-pic1.jpg" height="300" width="1200px">
    </div>
    <h1 class="position">新規登録</h1>
    <hr style="height:10px;margin-left:100px;margin-right:100px;border:none;border-top:5px solid #DCDCDC;">
    <span class="mark">必須</span><a class="font"> マークのある項目にはすべて入力してください。</a>
    <br>
    <form action="" method="post">
      {{csrf_field()}}
      <div class="position">
        <dl class="dl1">
          <dt class="dt1"><p>名前</p><div class="mark">必須</div><p></p></dt>
          <dd>
            <div style="margin-top:30px;">
              <p >あなたの名前を入力してください。</p>
		    </div>
            <div>
              <input class="input1" type="text" name="name" value="">

              @if($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
              @endif

            </div>
            <span><font color="gray">半角英数字 128文字以内</font></span>
          </dd>
        </dl>
        <dl class="dl2">
          <dt class="dt2"><p>メールアドレス</p><div class="mark">必須</div><p></p></dt>
          <dd>
            <div style="margin-top:30px;">
              <p >パソコンまたはスマートフォンのEメールアドレスを入力してください。</p>
            </div>
            <div>
              <input class="input1" type="email" name="email" value="">

              @if($errors->has('email'))
                <p class="text-danger">{{$errors->first('email')}}</p>
              @endif

            </div>
            <span><font color="gray">半角英数字 128文字以内</font></span>
				</dd>
			</dl>
      <dl class="dl2">
        <dt class="dt2">
          <p>パスワード</p>
          <div class="mark">必須
          </div>
        </dt>
        <dd>
          <div style="margin-top:30px;">
            <p >8文字以上の半角英数を混ぜたものをお奨めします</p>
					</div>
          <div>
						<input class="input1" type="password" name="password" value="">

            @if($errors->has('password'))
              <p class="text-danger">{{$errors->first('password')}}</p>
            @endif

					</div>
					<span>
            <font color="gray">半角英数字5〜20文字以内、スペース不可</font>
          </span>
        </dd>
      </dl>
      <dl class="dl2">
        <dt class="dt2"><p>パスワード<br>再入力</p><div class="mark">必須</div><p></p></dt>
        <dd>
          <div style="margin-top:50px;"	>
						<input class="input1" type="password" name="password_confirmation" value="">

            @if($errors->has('password'))
              <p class="text-danger">{{$errors->first('password')}}</p>
            @endif

					</div>
					<span>
            <font color="gray">同じパスワードを再入力してください。</font>
          </span>
				</dd>
			</dl>
    </div>
    <br><br>
    <div style="text-align:center;">
      <button class="button" type="submit" value="">
        <font size="3">新規会員の登録</font>
      </button>
    </div>
    </form>
  </body>
</html>
