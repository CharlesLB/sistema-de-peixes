<?php

//
// ─── DATABASE ───────────────────────────────────────────────────────────────────
//
    
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "db_peixes");

//
// ─── URL ────────────────────────────────────────────────────────────────────────
//

    
define("CONF_URL_BASE", "https://www.sistemadepeixes.com");
define("CONF_URL_TEST", "https://www.localhost/sistema-de-peixes");
define("CONF_URL_ADMIN", "/admin");


//
// ─── SITE ───────────────────────────────────────────────────────────────────────
//

    
define("CONF_SITE_NAME", "Laboratório de Biologia");
define("CONF_SITE_TITLE", "Site da bolsa de biologia do IF Sudeste MG Campus Juiz de Fora");
define("CONF_SITE_DESC",
    "O que o laboratório faz. Aqui é um pequeno textinho que aparece quando enviar o link para alguém kk");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "LINK.COM");
define("CONF_SITE_ADDR_STREET", "R. Bernardo Mascarenhas");
define("CONF_SITE_ADDR_NUMBER", "1283");
define("CONF_SITE_ADDR_COMPLEMENT", "IF Sudeste MG Campus Juiz de Fora.");
define("CONF_SITE_ADDR_CITY", "Juiz de Fora");
define("CONF_SITE_ADDR_STATE", "MG");
define("CONF_SITE_ADDR_ZIPCODE", "36080-001");


//
// ─── DATE ───────────────────────────────────────────────────────────────────────
//
  
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");


//
// ─── PASSWORD ───────────────────────────────────────────────────────────────────
//

define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

//
// ─── MESSAGE ────────────────────────────────────────────────────────────────────
//

    
define("CONF_MESSAGE_CLASS", "trigger");
define("CONF_MESSAGE_INFO", "info");
define("CONF_MESSAGE_SUCCESS", "success");
define("CONF_MESSAGE_WARNING", "warning");
define("CONF_MESSAGE_ERROR", "error");

//
// ─── VIEW ───────────────────────────────────────────────────────────────────────
//

    
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "Admin");


//
// ─── UPLOAD ─────────────────────────────────────────────────────────────────────
//


define("CONF_UPLOAD_DIR", "../storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

//
// ─── IMAGES ─────────────────────────────────────────────────────────────────────
//


define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

//
// ─── MAIL ───────────────────────────────────────────────────────────────────────
//


define("CONF_MAIL_HOST", "");
define("CONF_MAIL_PORT", "");
define("CONF_MAIL_USER", "");
define("CONF_MAIL_PASS", "");
define("CONF_MAIL_SENDER", ["name" => "Laboratório Biologia", "address" => "laboratoriobiologiaifjf@gmail.com"]);
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");