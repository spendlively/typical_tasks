<?php

function a($arg){
    b('beta');
}

function b($arg){
    d('delta');
}

function d($arg){
    var_dump(debug_backtrace());
}

a('alfa');
