<?php
session_start();
require_once(__DIR__."/../vendor/autoload.php");
require_once(__DIR__."/../config/mysql.php");
$dbConn = new \Simplon\Mysql\Mysql(
    $db_config['host'],
    $db_config['user'],
    $db_config['password'],
    $db_config['database']
);
