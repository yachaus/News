<?php

namespace AdminPanel;

class Base
{
    protected $view;

    public function __construct()
    {
        $this->view = new \App\View();
        if (isset($_POST['type'])) {

            if ($_POST['type'] == 'Add') {
                $this->add();
            }
            if ($_POST['type'] == 'Change') {
                $this->change();
            }
            if ($_POST['type'] == 'Delete') {
                $this->delete();
            }
        }
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
}

