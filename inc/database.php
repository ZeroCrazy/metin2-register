<?php

    use Medoo\Medoo;

    function dbConn($dbname) {
        global $database_connection;
    
        $database = new Medoo([
            'type' => 'mysql',
            'host' => $database_connection['host'],
            'username' => $database_connection['user'],
            'password' => $database_connection['pass'],
            'database' => $dbname,
        ]);
    
        return $database;
    }