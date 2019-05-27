<?php

namespace App\Controllers;

class Base
{
    protected $view;

    public function __construct()
    {
        $this->view = new \App\View();
    }

    public function beforeAction()
    {

    }

    public function action($method)
    {
        $this->beforeAction();
        $methodName = 'action' . $method;
        $this->$methodName();
    }

    public function ctrl()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = str_replace('/', '\\', $url);
        $url = substr($url, 1);
        if ('index.php' == $url || '' == $url) {
            $ctrl = '\App\Controllers\News';

        } else {

            $ctrl = stristr($url, '\\', true);
            $ctrl = '\App\Controllers\\' . $ctrl;
            if ('\App\Controllers\News' != $ctrl) {
                $ctrl = '\App\Controllers\News';
            }

        }
            return $ctrl;
    }

    public function act()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = str_replace('/', '\\', $url);
        $url = substr($url, 1);
        if ('index.php' == $url || '' == $url) {
            $action = 'ShowAll';
        }
        $action = stristr($url, '\\');
        $action = substr($action, 1);
        if (isset($_GET['id'])) {
            $action = stristr($action, '\\', true);
        }
        if ('ShowAll' != $action && 'Article' != $action) {
            $action = 'ShowAll';
        }
        return $action;
    }
}

