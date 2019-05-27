<?php

namespace App\Models;

use App\MultiException;

class News extends \App\Model
{
    const TABLE = 'news';
    public $text;
    public $id;
    public $author_id;

    public function fill($data)
    {
        $e = new MultiException();

        if (empty($data['author_id'])) {
            $e[] = new \Exception('Автор не выбран');
        }
        if (empty($data['text'])) {
            $e[] = new \Exception('Текст новости отсутствует');
        }
        if (!$e->isEmpty()){
             throw $e;
        }
        $this->author_id = $data['author_id'];
        $this->text = $data['text'];

    }

    /**
     * Магический метод вывода Автора
     * @param $key
     * @return Author
     */
    public function __get($key)
    {
        switch ($key) {
            case 'author' :
                if (isset($this->author_id)) {
                    return Author::findById($this->author_id);
                }
                break;
            default :
                return null;
                break;
        }
    }

    /**
     * Магический метод для проверки свойства id_author на пустоту
     * @param $key
     * @return bool
     */
    public function __isset($key)
    {
        switch ($key) {
            case 'author' :
                return !empty($this->author_id);
                break;
            default :
                return false;
                break;
        }
    }
}