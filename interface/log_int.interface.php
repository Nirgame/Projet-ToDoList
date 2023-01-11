<?php

interface log_int {
    function __construct($path);
    function __destruct();
    public static function directWritelog ($path,$string);
}