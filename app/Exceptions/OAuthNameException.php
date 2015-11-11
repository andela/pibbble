<?php

namespace Pibbble\Exceptions;

use Exception;
use Pibbble\User;

class OAuthNameException extends Exception
{
    private $user;

    public function setUser(User $_user)
    {
        $this->user = $_user;
    }

    public function getUser()
    {
        return $this->user;
    }
}