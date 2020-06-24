<?php

//
// ─── ROUTES ─────────────────────────────────────────────────────────────────────
//

function url(string $path = null): string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost")) {
        if ($path) {
            return URL["localhost"]  . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return URL["localhost"];
    }

    if ($path) {
        return URL["base"] . "/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }

    return URL["base"];
}

function asset(string $path, string $view): string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost")) {
        return URL["localhost"] . "/views/{$view}/assets/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }

    return URL["base"] . "/views/{$view}/assets/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
}

function shared(string $path): string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost")) {
        return URL["localhost"] . "/Shared/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }

    return URL["base"] . "/Shared/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
}

function script(string $path): string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost")) {
        return URL["localhost"] . "/fragments/scripts/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }

    return URL["base"] . "/fragments/scripts/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
}

function storage(string $path): string
{
    if (strpos($_SERVER['HTTP_HOST'], "localhost")) {
        return URL["localhost"] . "/Storage/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }

    return URL["base"] . "/Storage/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
}
