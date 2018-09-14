<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
        <script src="https://cdn.bootcss.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css">
        <style>
        </style>
    </head>
    <body>

        @if(Session::has('message'))
            <p class="alert alert-info">{{Session::get('message') }}</p>
        @endif

        <div class="img">
            <img src="images/carousel-pic1.jpg"  height="300" width="1200px">
        </div>

    </body>
</html>
