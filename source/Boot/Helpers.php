<?php

//
// ─── URL ────────────────────────────────────────────────────────────────────────
//

function url(string $path = null): string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost")) {
        if ($path) {
            return CONF_URL_TEST . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }else{
            return CONF_URL_TEST;
        }
    }else{
        if ($path) {
            return CONF_URL_BASE . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }else{
            return CONF_URL_BASE;
        }
    }

    
}

function view( string $path = null): string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost")) {
        if ($path) {
            return CONF_URL_TEST . "/views/" . CONF_VIEW_THEME . "/" .($path[0] == "/" ? mb_substr($path, 1) : $path);
        }else{
            return CONF_URL_TEST . "/views/" . CONF_VIEW_THEME;
        }
    }else{
        if ($path) {
            return CONF_URL_BASE . "/views/" . CONF_VIEW_THEME . "/" .($path[0] == "/" ? mb_substr($path, 1) : $path);
        }else{
            return CONF_URL_BASE . "/views/" . CONF_VIEW_THEME;
        }
    }
}