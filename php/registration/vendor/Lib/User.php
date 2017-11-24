<?php

namespace Lib;

require_once 'Db.php';

class User
{
    const MAX_LENGTH = 100;

    public $id = null;

    public $name = null;

    public $pass = null;

    public function __construct($id = null, $name = null, $pass = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->pass = $pass;
    }

    public static function getPdo()
    {
        $db = Db::getPdo();

        return $db;
    }

    public static function findByName($name)
    {
        try{
            $pdo = self::getPdo();
            $dbh = $pdo->prepare("SELECT * FROM user WHERE name = :name");
            $dbh->bindParam(':name', $name);
            $dbh->execute();
            $row = $dbh->fetch(\PDO::FETCH_ASSOC);

            if(!empty($row)){
                return new User($row['id'], $row['name'], $row['pass']);
            }

            return null;

        } catch (\Exception $e){
            return false;
        }
    }

    public static function findById($id)
    {
        try{
            $id = (int)$id;
            $pdo = self::getPdo();
            $dbh = $pdo->prepare("SELECT * FROM user WHERE id = :id");
            $dbh->bindParam(':id', $id);
            $dbh->execute();
            $row = $dbh->fetch(\PDO::FETCH_ASSOC);

            if(!empty($row)){
                return new User($row['id'], $row['name'], $row['pass']);
            }

            return null;

        } catch (\Exception $e){
            return false;
        }
    }

    public function insert()
    {
        try{
            $pdo = self::getPdo();
            $dbh = $pdo->prepare("INSERT INTO user (id, name, pass) VALUES (NULL, :name, :pass)");
            $dbh->bindParam(':name', $this->name);
            $dbh->bindParam(':pass', $this->pass);
            $dbh->execute();
            $this->id = (int)$pdo->lastInsertId();
        } catch (\Exception $e){
            return false;
        }

        return true;
    }

    public function update()
    {
        try{
            $pdo = self::getPdo();
            $dbh = $pdo->prepare("
                UPDATE user 
                SET id = :id,
                name = :name,
                pass = :pass
            ");
            $dbh->bindParam(':id', $this->id);
            $dbh->bindParam(':name', $this->name);
            $dbh->bindParam(':pass', $this->pass);
            $dbh->execute();
        } catch (\Exception $e){
            return false;
        }

        return true;
    }

    public function delete()
    {
        try{
            $pdo = self::getPdo();
            $dbh = $pdo->prepare("DELETE FROM user WHERE id = :id");
            $dbh->bindParam(':id', $this->id);
            $dbh->execute();
        } catch (\Exception $e){
            return false;
        }

        return true;
    }
}
