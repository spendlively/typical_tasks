<?php

ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('log_errors_max_len', 0);
ini_set('error_log', 'error.log');

$var = "qwerty";
//debug_zval_dump($var);

var_dump(xdebug_get_declared_vars(''));

