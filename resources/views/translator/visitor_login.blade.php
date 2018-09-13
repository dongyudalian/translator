<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
    <style>
      div.img{
    		width:"1600";
    		height:"450";
    		text-align:center;
    		padding-top:0.5cm;
      }

      div.kaiin{
        margin-top:20px;
      }

      div.shinnki{
        margin-top:20px;
      }

      h2.title1{
		   font-size: 125%;
	     font-weight: bold;
	     letter-spacing: -1px;
	     background: #DCDCDC;
	     margin: 0 0 20px;
	     padding: 11px 10px;
      }

      h2.title2{
  		 font-size: 125%;
	     font-weight: bold;
	     letter-spacing: -1px;
	     background: #DCDCDC;
	     margin: 0 0 20px;
	     padding: 11px 10px;
	   }

     h3.message{
  	 	 margin-left:150px;
  		 margin-right:100px;
  		 font-weight: 600;
  	   display: inline-block;
  	   vertical-align: baseline;
     }

     h1{
       margin-left:100px;
     }

     dl.dl1{
    	 display: table;
	     margin: 0;
	     width: 100%;
	     border-top: 1px solid;
     }

     dl.dl2{
    	 display: table;
	     margin: 0;
	     width: 100%;
	     border-top: 2px solid #DCDCDC;
		   border-bottom:  1px solid ;
     }

     dt.dt{
    	 background: rgba(255,192,203,0.5);
	     width: 150px;
	     display: table-cell;
	     padding: 20px 10px 50px 20px;
	     font-weight: 700;
	     vertical-align: top;
     }

     input.input1{
		   border: 1px solid #999;
	     border-radius: 3px;
	     margin: 20px 2px 0 0;
	     width: 300px;
	     height:40px;
     }

     input.input2{
		   border: 1px solid #999;
	     border-radius: 3px;
	     margin: 20px 2px 0 0;
	     width: 300px;
	     height:40px;
     }

     button.button1{
	     background-image: linear-gradient(180deg,#0067cc 0,#04407a 100%);
	     box-shadow: 0 1px #062440;
	     color: #fff;
	     width: 200px;
	     height:50px;
	     margin-left:200px;
	     border-radius:10px;
     }

     button.button2{
	     background-image: linear-gradient(180deg,#0067cc 0,#04407a 100%);
	     box-shadow: 0 1px #062440;
	     color: white;
	     width: 200px;
	     height:50px;
	     margin-left:100px;
	     border-radius: 10px;
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
     }

     a.font{
       font-style: normal;
    	 font-weight: 700;
    	 color:red;
     }

     div.style{
       width: 100%;
	     margin: 10px auto;
	     padding: 6px 0px;
	     background: rgba(255,192,203,0.5);
     }

     ul li{
       list-style-type:none;
       font-weight: bold;
     }

     i.fa {
       color:#00C5CD;
		   font-size:10px;
		   padding: 20px 10px;
     }
   </style>
 </head>

 <body>
   <div class="img">
     <img src="images/carousel-pic1.jpg"  height="300" width="1200px">
   </div>
   <div style="margin-left:100px ;margin-top:30px">
     <h2>ログイン</h2>
   </div>
   <hr style="height:10px;margin-left:100px;margin-right:100px;border:none;border-top:5px solid #DCDCDC;">
   <div style="margin-left:100px ;margin-top:30px;margin-right:100px">
     <h4 class="message">ごログイン、誠にありがとうございます。ご希望のメールアドレスとパスワードを入力の上、「ログイン」ボタンを押してください。まだ新規登録していない方は先に登録してください。</h4>
   </div>
   <div class="row">
     <div class="col-5 kaiin" style="margin-left:100px">
      <h2 class="title1">会員の方</h2>
      <span class="mark">必須</span>
      <a class="font"> マークのある項目にはすべて入力してください。</a>
      <form action="" method="post">
        {{csrf_field()}}
        <dl style="text-align:center"class="dl1">
          <dt class="dt">
            <span>メールアドレス</span>
            <br>
            <span class="mark">必須</span>
          </dt>
            <dd>
              <input class="input1" type="email" name="email" value="">
              <br>
              <span><font color="gray">半角英数字 128文字以内</font></span>
            </dd>
       </dl>
       <dl style="text-align:center"class="dl2">
         <dt class="dt">
           <span>パスワード</span>
           <br>
           <span class="mark">必須</span>
         </dt>
         <dd>
           <input class="input2" type="password" name="password" value=""><br>
           <span><font color="gray">半角英数字 128文字以内</font></span>
         </dd>
       </dl>
       <br>
       <button class="button1" type="submit"><font size="4">ログイン</font></button>
	    </form>
    </div>
    <div class="col-5 shinnki" style="margin-right:100px">
      <h2 class="title2">はじめてご利用の方</h2>
      <p>楽訳がはじめての方は、新規会員登録が必要です。</p>
      <div class="style">
        <ul>
          <li><i class="fa fa-circle"></i>あなただけの会員ページ</li>
          <li><i class="fa fa-circle"></i>予約情報がいつでも見られる</li>
          <li><i class="fa fa-circle"></i>便利な検索機能</li>
        </ul>
      </div>
      <br>
      <button class="button2" type="button">
        <a href="/visitor_register"><font size="3" style="color:white">新規会員の登録</font></a>
      </button>
    </div>
   </div>
 </body>
</html>
