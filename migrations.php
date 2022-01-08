<?php
/*
Systemx
*/
use app\controllers\SiteController;

use app\controllers\AuthController;
use app\core\Application;
use app\core\Database;
//use app\migrations\m0001_initials;
require_once __DIR__.'/vendor/autoload.php'; 


$dotenv = Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->load();
$config =[
      'db' => [
	        'dsn' => $_ENV['DB_DSN'],
			'user' => $_ENV['DB_USER'],
			'password' => $_ENV['DB_PASSWORD'],
			
			]
	  ];

$app = new Application(__DIR__, $config);
$app->db->applyMigrations();
