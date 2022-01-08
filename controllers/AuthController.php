<?php

namespace app\controllers;

use systemx\systemx\Controller;
use systemx\systemx\Request;
use app\Models\User;
use app\Models\LoginForm;
use systemx\systemx\Application;
use systemx\systemx\Response;
use systemx\systemx\middlewares\AuthMiddleware;

class AuthController extends Controller{
	public function __construct(){
		$this->registerMiddleware(new AuthMiddleware(['profile']));
	}
	
	
	   public function login(Request $request, Response $response){
		   $loginForm = new LoginForm();
		    if($request->isPost() ){
			
			   $loginForm->loadData($request->getBody());
			
			   if($loginForm->validate() && $loginForm->login()){
				   Application::$app->session->setFlash('success', 'Thanks for registering');
				   $response->redirect('home');
				   return;
			   }			 
	 		   			   
		   }
		   $this->setLayout('auth');
		   return $this->render('login', [
		   'model' => $loginForm
		   ]);
	   }

	   public function register(Request $request){
		   $user = new User();
		   if($request->isPost() ){
			   $user = new User();
			   $user->loadData($request->getBody());
			
			   if($user->validate() && $user->save()){
				   Application::$app->session->setFlash('success', 'Thanks for registering');
				   Application::$app->response->redirect('home');
				   exit;
			   }
			 
	 		    return $this->render('register',[
			      'model'=>$user
               ]);
			   
		   }
		    $this->setLayout('auth');
		    return $this->render('register',[
			   'model'=>$user
			   ]);
	   }
	   public function logout(Request $request, Response $response){
		  Application::$app->logout(); 
		  $response->redirect('home');
	   }
	    public function profile(){
			
		  return $this->render('profile');
	   }

}