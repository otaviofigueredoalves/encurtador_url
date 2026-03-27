<?php
namespace App\Dev\Core;

abstract class Model
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
}