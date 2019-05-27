<?php

namespace App\Controllers;

use App\Exceptions\E404;

class News
    extends Base
{
    protected function actionShowAll()
    {

        $this->view['news'] = \App\Models\News::findAll();
        $this->view['timer'] = \SebastianBergmann\Timer\Timer::resourceUsage();
        if (NULL == $this->view['news']) {
            throw new E404('Пользователи не найдены!');
        }
        $this->view->display(__DIR__ . '/../templates/index.php');

    }

    protected function actionArticle()
    {
        $this->view['article'] = \App\Models\News::findById($_GET['id']);
        $this->view['timer'] = \SebastianBergmann\Timer\Timer::resourceUsage();
        if (NULL == $this->view['article']) {
            throw new \App\Exceptions\E404('Пользователя №' . $_GET['id'] . ' не существует!');
        }
        $this->view->display(__DIR__ . '/../templates/articleTemplate.php');
    }
}