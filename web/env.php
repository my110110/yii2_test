<?php
/**
 * Created by PhpStorm.
 * User: mayn
 * Date: 2018/9/15
 * Time: 10:28
 */
use Dotenv\Dotenv;
$dotenv = new Dotenv(dirname(__DIR__));
$dotenv->load();

defined('YII_DEBUG') or define('YII_DEBUG', getenv('YII_DEBUG') === 'true');
defined('YII_ENV') or define('YII_ENV', getenv('YII_ENV') ?: 'dev');