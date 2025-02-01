<?php

namespace Metin2Register\Library;

use Medoo\Medoo;

class Database
{
    function dbConn($dbname)
    {
        $database = new Medoo([
            'type' => 'mysql',
            'host' => getenv('MYSQL_HOST'),
            'username' => getenv('MYSQL_USER'),
            'password' => getenv('MYSQL_PASSWORD'),
            'database' => $dbname,
        ]);

        return $database;
    }
}
