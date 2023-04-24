<?php

namespace App\Exception;

class CreateUserException extends \Exception
{
    protected $message  = "Unable to create a new user";
}