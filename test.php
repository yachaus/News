<?php
require __DIR__ . '/cut_by_words.php';
require __DIR__ . '/autoload.php';

$ex = new \Exception('Сообщение об исключении');
echo $ex->getMessage();
