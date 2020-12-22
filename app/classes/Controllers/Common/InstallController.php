<?php

namespace App\Controllers\Common;

use App\App;
use Core\FileDB;

class InstallController
{
    public function install()
    {
        App::$db = new FileDB(DB_FILE);
        App::$db->createTable('users');
        App::$db->insertRow('users', [
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@fitness.lt',
            'password' => 'admin',
            'phone' => '868686868',
            'address' => 'Sauletekio al. 15'
        ]);
        App::$db->createTable('feedback');
    }
}

