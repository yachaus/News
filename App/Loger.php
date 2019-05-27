<?php

namespace App;

abstract class Loger
{
        public static function log(\Exception $exception){

            $error = date("Y-m-d H:i:s")."\t\t".$exception->getFile().'('.$exception->getLine().")\t\t".$exception->getMessage()."\n\n";
            $res = fopen(__DIR__ . '/../error_logs.txt', 'a');
            fwrite($res,$error);
            fclose($res);
    }
}