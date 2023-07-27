<?php

namespace App\Config;

use Attribute;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    abstract public function primaryKey(): string;

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $statement = self::prepare(
            "
            INSERT INTO $tableName (" . implode(',', $attributes) . ")
             VALUES(" . implode(',', $params) . ")"
        );

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        $statement->execute();
        return true;
    }

    public static function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        //WHERE email=:email AND firstname=:firstname
        $sql = implode("AND", array_map(fn ($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public static function findOneByEmail($email)
    {
        $tableName = static::tableName();
        $sql = "SELECT ID FROM $tableName WHERE email = :email";
        $statement = self::prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        return $result ? $result['ID'] : null;
    }
}
