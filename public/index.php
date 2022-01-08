<?php
/*
Systemx
*/
use app\controllers\SiteController;

use app\controllers\AuthController;
use systemx\systemx\Application;
use app\models\User;
require_once __DIR__.'/../vendor/autoload.php'; 


$dotenv = Dotenv\Dotenv::createMutable(dirname(__DIR__));
$dotenv->load();
$config =[
      'userClass'  => \app\models\User::class,
      'db' => [
	         
	        'dsn' => $_ENV['DB_DSN'],
			'user' => $_ENV['DB_USER'],
			'password' => $_ENV['DB_PASSWORD'],
			
			]
	  ];

$app = new Application(dirname(__DIR__), $config);
$app->on(Application::EVENT_BEFORE_REQUEST, function(){
	echo "Before request";
});

$app->router->get('home',[SiteController::class, 'home']);
    
$app->router->get('contact',[SiteController::class, 'contact']);
$app->router->post('contact',[SiteController::class, 'contact']);
$app->router->get('login',[AuthController::class, 'login']);
$app->router->post('login',[AuthController::class, 'login']);
$app->router->get('register',[AuthController::class, 'register']);
$app->router->post('register',[AuthController::class, 'register']);
$app->router->get('logout',[AuthController::class, 'logout']);
$app->router->get('profile',[AuthController::class, 'profile']);
$app->run();
