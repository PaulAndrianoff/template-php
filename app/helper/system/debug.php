<?php

function dd ($value) {
    echo '<pre class="xdebug-var-dump">';
    var_dump($value);
    die;
}

function d ($value) {
    echo '<pre>';
    print_r($value);
}