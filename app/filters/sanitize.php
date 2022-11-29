<?php

function SANITIZE_INPUT_STRING(string $string): string
{
    $str = preg_replace('/[^A-Za-z0-9]/','',$string);
    return str_replace(["'", '"','alert','script'], ['&#39;', '&#34;','',''], $str);
}