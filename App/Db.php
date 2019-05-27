<?php

namespace App;

class Db
{
    use \App\Singleton;

    protected $dbh;

    protected function __construct()
    {
        try {
            $this->dbh = new \PDO('mysql:host=localhost; dbname=test', 'root', 'root');
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db('Невозможно подключиться к базе данных!');
        }
    }

    public function execute($sql, $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $res = $sth->execute($params);
            return $res;
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db($e->getMessage());
        }
    }

    public function query($sql, $class, $params = [])
    {
        try {
            $sth = $this->dbh->prepare($sql);
            $res = $sth->execute($params);
            if ($res == false) {
                throw new \App\Exceptions\Db('Ошибка в запросе');
            }
            if (false !== $res) {
                return $sth->fetchAll(8, $class);
            } else
                return false;
        } catch (\PDOException $e) {
            throw new \App\Exceptions\Db($e->getMessage());
        }

    }

    public function queryEach($sql, $class, $params = [])
    {
        $sth = $this->dbh->prepare($sql,[\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
        $res = $sth->execute($params);
        $sth->setFetchMode(8, $class);
        if ($res == false) {
            throw new \App\Exceptions\Db('Ошибка в запросе');
        } else {
            while ($fetch = $sth->fetch()) {
                yield $fetch;
            }
        }
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId('id');
    }
}