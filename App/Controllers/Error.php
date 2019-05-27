<?php

namespace App\Controllers;

class Error
    extends Base
{
    protected $message;

    public function __construct(string $message = NULL)
    {
        $this->message = $message;
        $this->view = new \App\View();
    }

    protected function actionMessage(){
        $this->view['message'] = $this->message;
        $this->view->display(__DIR__ . '/../../App/templates/exception.php');
    }

    protected function actionE404(){
        $this->view->display(__DIR__ . '/../../App/templates/404.php');
    }
}