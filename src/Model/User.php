<?php

namespace App\Model;

use App\Config\UserModel;


class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public string $name = '';
    public string $email = '';
    public $status = self::STATUS_INACTIVE;
    public $mobilenumber = '';
    public string $password = '';
    public string $repeatpassword = '';



    public function attributes(): array
    {
        return ['name', 'email', 'mobilenumber', 'password', 'status'];
    }

    public function tableName(): string
    {
        return 'users';
    }

    public function rules(): array
    {
        return [
            'name' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => $this]], //it will be checked against its class name in the table
            'mobilenumber' => [self::RULE_REQUIRED],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 6], [self::RULE_MAX, 'max' => 15]],
            'repeatpassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }

    public function primaryKey(): string
    {
        return 'ID';
    }

    //override
    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = md5($this->password);
        return parent::save();
    }

    public function getDisplayName(): string
    {
        return $this->name;
    }


    public function changePassword(string $newPassword): bool
    {
        $hashedPassword = md5($newPassword);
        $tableName = static::tableName();
        $sql = "UPDATE $tableName SET password = :password WHERE email = :email";
        $stmt = self::prepare($sql);
        $stmt->bindValue(':email', $this->email);
        $stmt->bindValue(':password', $hashedPassword);
        return $stmt->execute();
    }
}
