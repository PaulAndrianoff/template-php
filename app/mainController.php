<!-- Main Controller -->
<?php
/**
 * Helper folder path
 */
$helperPath = './app/helper/';

/**
 * Global function
 */
include_once $helperPath . 'system/debug.php';
include_once $helperPath . 'system/sessionController.php';
include_once $helperPath . 'arrayHelper.php';

/**
 * Global functional
 */
include_once './config/config.php';
include_once $helperPath . 'system/prepareQuery.php';

/**
 * Main function
 */
include_once $helperPath . 'system/callBDD.php';
include_once $helperPath . 'system/getRouter.php';
include_once $helperPath . 'system/setHeadContent.php';

/**
 * Templating
 */
include_once $helperPath . 'contentTemplate.php';
include_once $helperPath . 'navigationTemplate.php';
include_once $helperPath . 'system/displayPart.php';