<?php
/**
 * Created by PhpStorm.
 * User: mayn
 * Date: 2018/9/19
 * Time: 15:37
 */

$dotenv = new \Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG') === 'true');
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV') ?: 'prod');