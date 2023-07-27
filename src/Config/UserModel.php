<?php

namespace App\Config;


abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}
