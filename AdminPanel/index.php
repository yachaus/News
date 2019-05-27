<?php
require __DIR__ . '/../cut_by_words.php';
require __DIR__ . '/../autoload.php';
$controller = new \AdminPanel\AdminPanel();
$action ='Show';
try {
    $controller->action($action);
} catch (\App\Exceptions\Db $e) {

    \App\Loger::log($e);
    $message = $e->getMessage();
    include __DIR__ . '/../App/templates/exception.php';
} catch (\App\Exceptions\Model $e) {
    echo $e->getMessage();
    \App\Loger::log($e);
}
