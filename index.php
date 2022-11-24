<?php
include_once "./app/mainController.php";

try
{
    prepareQuery ();
}
catch (Exception $e)
{
    // Failed to connect
    die('Could not connect');
}

include_once './public/index.php';