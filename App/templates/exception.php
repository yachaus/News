<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <style type="text/css">
        body, html {
            height: 100%;
            margin: 0;
        }
        #alert {
            position: fixed;
            z-index: 12;
            top: 10%;
            right: 50%;
            transform: translate(50%, -50%);
        }

        body {
            margin: 0;
            padding: 0;
            margin-top: 55px;
        }

        #header {
            width: 100%;
            display: table;
            position: fixed;
            top:    0px;
            left:   0px;
        }

        .bg {
            /* The image used */
            background-image: url("/News/Apps/App/templates/404.jpg");

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin-top: -1%;
            margin-bottom: -5%;
        }

    </style>
    <![endif]-->
</head>

<body role="document">

<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="header">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Новости</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="../../index.php">Главная</a></li>
                <li><a href="/News/AdminPanel/index.php">Админ-панель</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="alert alert-danger">
            <?php  echo $message; ?>
</div>
</body>
</html>