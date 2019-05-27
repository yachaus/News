<?php
/**
 * Функция, которая обрезает строку по словам
 * @param $maxlen int Максимальная длинна текста
 * @param $text string Текст, который нужно обрезать
 * @return string
 */
function cut_by_words($maxlen, $text)
{
    $len = (mb_strlen($text) > $maxlen) ? mb_strripos(mb_substr($text, 0, $maxlen), ' ') : $maxlen;
    $cutStr = mb_substr($text, 0, $len);
    $temp = (mb_strlen($text) > $maxlen) ? $cutStr . '...' : $cutStr;
    return $temp;
}