<?php
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';


$shortcuts=dirname(__FILE__).'/protected/helpers/shortcuts.php';
$utils=dirname(__FILE__).'/protected/helpers/utils.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
error_reporting(-1);
ini_set('display_errors', true);
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);


require($shortcuts);
require($utils);

require_once($yii);
Yii::createWebApplication($config)->run();

?>
