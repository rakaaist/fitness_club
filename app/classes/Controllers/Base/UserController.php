<?php

namespace App\Controllers\Base;

use App\App;

class UserController
{
    protected string $redirect = '/login';

    public function __construct()
    {
        if (!App::$session->getUser()) {
            header("Location: $this->redirect");
            exit();
        }
    }
}