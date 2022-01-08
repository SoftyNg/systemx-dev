<?php

namespace app\models;
use systemx\systemx\DbModel;
use systemx\systemx\Model;
use systemx\systemx\Application;
use app\models\User;

class LoginForm extends Model{
	
	
	public string $email='';
	public string $password ='';
	
	
	
	public function tableName():string{
		return 'users';
	}

	   public function rules(): array{
		   return [		    
			 'email'=> [self::RULE_REQUIRED, self::RULE_EMAIL],
			 'password'=> [self::RULE_REQUIRED]			 
		   ];
	   }
	   	public function login(){
			$user = User::findOne(['email'=> $this->email]);
			if(!$user){
				$this->addError('email', 'User does not exist with this email address');
				return false;
			}
			if(!password_verify($this->password, $user->password)){
					$this->addError('password', 'Password is incorrect');
				return false;
				}
				
				
				return Application::$app->login($user);
				
	   }
	   public function attributes():array
	   {
		   return ['firstname','lastname','email','password','status'];
	   }
	   public function labels():array{
		   return [
		   
		   'email' =>'Email address',
		   'password' =>'Password'
		   ];
	   }
	   
}