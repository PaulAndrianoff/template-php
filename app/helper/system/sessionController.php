<?php
/**
 * Register global variable to session
 * @param string $name
 * 
 * @return void
 */
if (!function_exists('session_register')) {
    function session_register(string $name):void
    {
        global $$name;
        if (!isset($_SESSION[$name])) {
            $_SESSION[$name] = $$name;
        }
        $$name = &$_SESSION[$name];
    }
}

/**
 * Get global variable by name
 * @param string $name
 * @param string $key
 * 
 * @return mixed
 */
if (!function_exists('get_global')) {
    function get_global(string $name, $key = null)
    {
        if (isset($_SESSION[$name])) {
            if (null !== $key) {
                if (gettype($_SESSION[$name]) === 'object') {
                    return $_SESSION[$name]->$key;
                } else {
                    return $_SESSION[$name][$key];
                }
            }
            return $_SESSION[$name];
        }

        return null;
    }
}

session_start();
session_register('wantedPage');
session_register('wantedPageParamsMap');
session_register('wantedPageParams');
session_register('siteConfig');