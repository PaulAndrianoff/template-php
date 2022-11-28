<style>
    pre.xdebug-var-dump {
    background-color: #18171B;
    color: #FF8400;
    line-height: 1.2em;
    font: 12px Menlo, Monaco, Consolas, monospace;
    word-wrap: break-word;
    position: relative;
    z-index: 99999;
    word-break: break-all;
    display: block;
    white-space: pre;
    padding: 5px;
    overflow: initial !important;
}
</style>

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