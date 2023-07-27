<?php

namespace App\Model;

use App\Config\Application;
use App\Config\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addErrorNoRule('email', 'User does not exist with this email');
            return false;
        }
        if ($user->password !== md5($this->password)) {

            $this->addErrorNoRule('password', 'password is incorrect');
            return false;
        }

        return Application::$app->login($user);
    }
}
