<?php
require __DIR__ . '/autoload.php';
require __DIR__ . '/cut_by_words.php';

$base = new \App\Controllers\Base();
$ctrl = $base->ctrl();
$action = $base->act();
$controller = new $ctrl();
try {
    $controller->action($action);
} catch (\App\Exceptions\Db $e) {
    $message = $e->getMessage();
    $error = new \App\Controllers\Error($message);
    $error->action('Message');
    \App\Loger::log($e);
} catch (\App\Exceptions\E404 $e) {
    $error = new \App\Controllers\Error();
    $error->action('E404');
    \App\Loger::log($e);
}
