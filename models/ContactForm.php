<?php

  namespace app\models;
use systemx\systemx\DbModel;
use systemx\systemx\Model;
use systemx\systemx\Application;
use app\models\User;

class ContactForm extends Model{
	
	
	public string $email='';
	public string $subject ='';
	public string $body ='';
	
	
	public function tableName():string{
		return 'users';
	}

	   public function rules(): array{
		   return [		    
			 'email'=> [self::RULE_REQUIRED, self::RULE_EMAIL],
			 'subject'=> [self::RULE_REQUIRED],
              'body'=> [self::RULE_REQUIRED]			 
		   ];
	   }
	   	public function send(){
		// $this->status = self::STATUS_INACTIVE;
		// $this->password = password_hash($this->password, PASSWORD_DEFAULT);
		// return parent::save();
		return true;
		
	   }
	   // public function attributes():array
	   // {
		   // return ['firstname','lastname','email','password','status'];
	   // }
	    public function labels():array{
		    return [
		   
		    'email' =>'Email address',
		    'body' =>'Enter your subject here',
			'subject' =>'Enter subject'
		   ];
	   }
	   
}