<?php
/**
 * Here you find all functions for debugging
 */

/**
 * Dump given variable and die
 * 
 * @return void
 */
function dd ():void
{
    echo '<pre class="xdebug-var-dump">';
    array_map(function ($x) {
        var_dump($x);
    }, func_get_args());
    die;
}

/**
 * Print given variable
 * 
 * @return void
 */
function d ():void
{
    echo '<pre class="xdebug-var-dump">';
    array_map(function ($x) {
        var_dump($x);
    }, func_get_args());
}