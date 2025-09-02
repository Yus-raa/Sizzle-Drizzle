<?php
/* ================================================
        Pilcrow Functions
================================================ */
    function nl2pilcrow(string $text): string // will return a string
    {
        return str_replace(["\r\n","\r","\n"], '¶', $text);
    }

    function pilcrow2nl(string $text): string 
    {
        return str_replace('¶', PHP_EOL, $text); //PHP has that information from the form submission and has a built-in constant called PHP_EOL which is the correct line break for that operating system
    }

    function pilcrow2p(string $text): string 
    {
        return sprintf('<p>%s</p>', str_replace('¶', '</p><p>',$text));
    }