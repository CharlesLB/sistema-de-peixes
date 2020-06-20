<?php

//
// ─── URL ─────────────────────────────────────────────────────────────────────
//


define("URL", [
    "localhost" => "https://www.localhost/sistema-de-peixes",
    "base" => "https://www.laboratoriobiologia.com"
]);

//
// ─── SITE ───────────────────────────────────────────────────────────────────────
//


define("SITE", [
    "name" => "Laboratório de Biologia",
    "github" => "https://github.com/CharlesLB/sistema-de-peixes"
]);


//
// ─── MAIL ───────────────────────────────────────────────────────────────────────
//

/* Secret Data */
define("MAIL", [
    "host" => "",
    "port" => "",
    "user" => "",
    "passwd" => "",
    "from_name" => "",
    "from_email" => "",
]);


//
// ─── DATABASE ───────────────────────────────────────────────────────────────────
//

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "db_sdp",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);
