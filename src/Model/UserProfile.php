<?php

namespace App\Model;

use App\Config\DbModel;

class UserProfile extends DbModel
{
    public string $name = '';
    public string $email = '';
    public string $mobilenumber = '';
    public string $registrationDate = '';

    public function attributes(): array
    {
        return ['name', 'email', 'mobilenumber'];
    }

    public function tableName(): string
    {
        return 'users';
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'mobilenumber' => [self::RULE_REQUIRED],
        ];
    }

    public function primaryKey(): string
    {
        return 'ID';
    }

    public function getUserProfile($email)
    {
        $tableName = static::tableName();
        $sql = "SELECT * FROM $tableName WHERE email = :email";
        $stmt = self::prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function updateProfile($email)
    {
        $tableName = static::tableName();
        $sql = "UPDATE $tableName SET name = :name, mobilenumber = :mobilenumber WHERE email = :email";
        $stmt = self::prepare($sql);
        $stmt->bindValue(':name', $this->name);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':mobilenumber', $this->mobilenumber);
        return $stmt->execute();
    }
}
