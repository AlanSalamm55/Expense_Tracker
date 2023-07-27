<?php

namespace App\Model;

use App\Config\Model;

class ChangePasswordForm extends Model
{
    public string $currentPassword = '';
    public string $newPassword = '';
    public string $confirmPassword = '';

    public function rules(): array
    {
        return [
            'currentPassword' => [self::RULE_REQUIRED],
            'newPassword' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 6]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'newPassword']],
        ];
    }

    public function validateCurrentPassword(User $user)
    {
        if (md5($this->currentPassword) !== $user->password) {
            $this->addError('currentPassword', 'Incorrect current password.');
            return false;
        }
        return true;
    }
}
