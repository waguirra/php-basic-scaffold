<?php

/** Conexão com banco da dados */
const CONFIG_CONNECT = [
    "driver"   => "mysql",
    "host"     => "localhost",
    "port"     => "3306",
    "dbname"   => "castrolanda_lanches",
    "username" => "root",
    "passwd"   => "",
    "options"  => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_CASE               => PDO::CASE_NATURAL
    ]
];

/** Senha */
const CONFIG_PASSWD_MIN_LEN = 4;
const CONFIG_PASSWD_MAX_LEN = 16;

/** PATH's */
define('PATH_ROOT', dirname(__DIR__));