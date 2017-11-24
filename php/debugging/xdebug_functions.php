<?php

//php.ini html_errors = On;

//debug_zval_dump
// - показывает передана ли переменная по ссылке - is_ref
// - количество ссылок - refcount
$var = "qwerty";
debug_zval_dump($var);

//debug_backtrace - показать call-стэк
var_dump(debug_backtrace());

//xdebug_get_declared_vars - показать инициализированные переменные
//xdebug.collect_vars = 1
//xdebug.show_local_vars = 1
//xdebug.collect_params = 4
var_dump(xdebug_get_declared_vars());

