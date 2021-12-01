<?php

namespace App\Manager;


class BaseManager {

    protected $database_connection;

    public function __construct($database_connection)
    {
        $this->database_connection = $database_connection;
    }

}
