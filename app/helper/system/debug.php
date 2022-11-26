<?php
/**
 * Here you find all functions for debugging
 */

/**
 * Dump given variable and die
 * @param mixed $value
 * 
 * @return void
 */
function dd ($value):void
{
    echo '<pre class="xdebug-var-dump">';
    var_dump($value);
    die;
}

/**
 * Print given variable
 * @param mixed $value
 * 
 * @return void
 */
function d ($value):void
{
    echo '<pre class="xdebug-var-dump">';
    print_r($value);
}