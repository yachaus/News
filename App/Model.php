<?php

namespace App;

abstract class Model
{
    const TABLE = '';
    public $id;

    /**
     * Метод, возвращающий запись по id из базы данных, в виде обьекта
     * @param $id int
     * @return mixed
     */

    public static function findById($id)
    {
        $db = Db::instance();
        $data = [':id' => $id];
        $recordById = $db->query('SELECT ALL * FROM ' . static::TABLE . ' WHERE id=:id', static::class, $data);
        if (isset($recordById[0])) {
            return $recordById[0];
        } else
            return NULL;
    }

    /**
     * Метод, возвращающий все записи из базы данных, в виде обьекта
     * @return mixed
     */
    public static function findAll()
    {
        $db = Db::instance();
        $res = $db->queryEach(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
        return $res;
    }

    /**
     * Метод, проверяющий, установлено ли свойсто $id, для понимания новый это обьект или старый
     * @return bool
     */
    public function isNew()
    {
        return empty($this->id);
    }

    /**
     * Метод, Active Record, записывает данные в базу данных
     */
    public function insert()
    {

        $db = Db::instance();
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }
        $sql = '
        INSERT INTO ' . static::TABLE . '
        (' . implode(',', $columns) . ')
        VALUES
        (' . implode(',', array_keys($values)) . ')
         ';
        $db->execute($sql, $values);
    }

    /**
     * Метод, Active Record, обновляет данные в базе данных
     */
    public function update()
    {
        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[$k] = $v;
        }
        ob_start();
        foreach ($values as $k => $v) {
            if (strpos($k, 'id') === false) {
                echo $k . '=';
                echo "' $v '";
            }
        }
        $string = ob_get_contents();
        ob_end_clean();
        $sql = 'UPDATE ' . static::TABLE . ' SET ' . $string . ' WHERE ' . static::TABLE . '.id = ' . $this->id;
        $db = Db::instance();
        $db->execute($sql);
    }

    /**
     * Метод, Active Record, выбирает записать запись как новую или обновить ее
     */
    public function save()
    {
        if (!$this->isNew()) {
            $this->update();
        } else $this->insert();
    }

    /**
     * Метод, Active Record, удаляет данные из базы данных
     */
    public function delete()
    {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE ' . static::TABLE . '.id = ' . $this->id;
        $db = Db::instance();
        $db->execute($sql);
    }
}