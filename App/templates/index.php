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
        body {margin:0; padding:0; margin-top: 55px;}
        #header {width: 100%; display: table; position: fixed; top: 0px; left: 0px;}
    </style>
    <![endif]-->
</head>

<body role="document">

<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top p-4" role="navigation" id = "header">
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
<div class="pt-5 mt-5">
<?php
foreach ($news as $data) :
    echo '<article class="pt-5 mt-5">
    <h1><a href="/News/Article/?id='.$data->id.'">Новость №'.$data->id;
    if (isset($data->author_id)) {echo ' от '.$data->author->name; } echo '</a></h1>
    <hr>
    <h4>'.$data->text.'</h4>
</article>';
endforeach; ?>
</div>
<hr>
<?php echo $timer;
?>
</body>
</html>



