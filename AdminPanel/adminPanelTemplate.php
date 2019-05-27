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
        body {
            margin: 0;
            padding: 0;
            margin-top: 55px;
        }

        #header {
            width: 100%;
            display: table;
            position: fixed;
            top: 0px;
            left: 0px;
        }

    </style>
    <![endif]-->
</head>

<body role="document">
<?php if (isset($errors)) {
    foreach ($errors as $error) : ?>
        <div class="alert alert-danger">
            <?= $error->getMessage() ?>
        </div>
    <?php endforeach;
}; ?>

<!-- Fixed navbar -->
<div class="navbar navbar-inverse navbar-fixed-top p-4" role="navigation" id="header">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Новости</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/News/ShowAll">Главная</a></li>
                <li><a href="/News/AdminPanelPanel/index.php">Админ-панель</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div>
    <div class=" container col-lg-4 col-md-6 col-sm-6 col-xs-12 float-left pt-3 pl-4">
        <h2 class="comment-reply-title">Изменить новость</h2>
        <form method="post" action="/News/AdminPanelPanel/index.php">
            <div class="form-group ">
                <label>
                    id:
                </label>
            </br>
                <select name="changeID">
                    <?php

                    foreach ($news1 as $option) : ?>
                        <option value=" <?= $option->id ?>"> id= <?= $option->id ?> &nbsp
                            (<?= cut_by_words(40, $option->text) ?>)
                        </option>
                    <?php endforeach;

                    ?>
                </select></br>
            </div>
            <div class="form-group">
                <label>Изменить текст новости:</label>
                <textarea type="comment" name="changeTEXT" id="about" class="form-control m-1"
                          placeholder="Введите текст новости"></textarea></textarea>
            </div>
            <input type="hidden" id="type" name="type" value="Change">
            <input type="submit" value="Submit" class="m-1">
        </form>
    </div>
    <div class="container col-lg-4 col-md-5 col-sm-12 col-xs-12 float-left pt-3 pl-4">
        <h2 class="comment-reply-title">Добавить новость:</h2>
        <form method="post" action="/News/AdminPanelPanel/index.php">
            <label>id:</label>
            <input type="text" name="AddAuthorId" placeholder="Введите id автора" class="form-control m-1">
            <div class="form-group">
                <label>Текст новости:</label>
                <textarea type="comment" name="addTEXT" id="record" class="form-control m-1"
                          placeholder="Введите новость"></textarea>
            </div>
            <input type="hidden" id="type" name="type" value="Add">
            <input type="submit" value="Submit" class="m-1">
        </form>
    </div>
    <div class="container col-lg-4 col-md-6 col-sm-12 col-xs-12 float-left pt-3 pl-4">
        <h2 class="comment-reply-title">Удалить новость:</h2>
        <form method="post" action="/News/AdminPanelPanel/index.php">
            <select name="deleteID">
                <?php
                foreach ($news2 as $option) : ?>
                    <option value =" <?= $option->id ?>"> id= <?= $option->id ?> &nbsp
                        (<?= cut_by_words(40, $option->text) ?>)
                    </option>
                <?php endforeach;

                ?>
            </select>
            <input type="hidden" id="type" name="type" value="Delete">
            <input type="submit" value="Submit" class="m-1">
        </form>
    </div>
</div>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Новость</th>
        <th>Автор</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($table1 as $row) :?>
    <tr>
        <th scope="row"><?= $row[0]?></th>
        <td><?= $row[1]; ?></td>
        <td><?= $row[2]; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<table class="table">
    <thead>
    <tr>
        <th>#</th>
        <th>Автор</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($table2 as $row) :?>
    <tr>
        <th scope="row"><?= $row[0]?></th>
        <td><?= $row[1]; ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>