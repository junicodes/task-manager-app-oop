<?php
/**
 * Post controller
 */

namespace App\Controllers;


use App\Core\App; 
use App\Core\Validation; 
use App\Core\Session;

Session::start();


class UserController
{
	public $output          = [];
	public $formValueKeeper = [];
	protected $table_name   = 'users';
	protected $column_name  = 'username';
	protected $value        = '';

	public function emitData() {
		//Run the validation process for our registration form
		if (isset($_POST['submit'])) 
		{

			$username = trim($_POST['username']);
			$password =  trim($_POST['password']);

			$this->value = $username;

			Validation::bindData('log', $this->table_name, [
					'username' => $username,
					'password' => $password
				]);
			//values to show in the form
			$this->formValueKeeper = Validation::formValueKeeper('log');
			//get the log from the validation
			$this->output = Validation::getData('log');


			if (empty($this->output['errors'])) 
			{	

				$column_name = $this->column_name;
				$value       = $this->value;
				$table_name  = $this->table_name;

				App::get('database')->selectData($table_name, array($column_name, '=', $value));

				$datas = App::get('database')->result();

				foreach ($datas as $data) {
					$_SESSION['user_id']  = $data->user_id;
					$_SESSION['username'] = $data->username;
					$_SESSION['email']    = $data->email;
					$_SESSION['name']     = $data->name;;
					$_SESSION['ip']       = $data->ip;
				}	

				//Bind the session

				Session::bindSession('sess', [

					'id'       => $_SESSION['user_id'],
					'username' => $_SESSION['username'],
					'email'    => $_SESSION['email'] ,
					'name'     => $_SESSION['name'],
					'ip'       => $_SESSION['ip']

				]);



				return view("profile", [

						'id'       => $_SESSION['user_id'],
						'username' => $_SESSION['username'],
						'email'    => $_SESSION['emaail'],
						'name'     => $_SESSION['name'],
						'ip'       => $_SESSION['ip']

				]);

			}else{

				$msgs  = $this->output['errors'];
				$infos = $this->formValueKeeper;
				
				return view("login", [

					'msgs'  => $msgs,
					'infos' => $infos


				]);

			}
		}
	} 


	public function inputData() {
		//Run the validation process for our registration form
		if (isset($_POST['submit'])) 
		{
			$username       = trim($_POST['username']);
			$password       =  trim($_POST['password']);
			$retypepassword =  trim($_POST['retypepassword']);
			$email          =  trim($_POST['email']);
			$name           =  trim($_POST['name']);

				//Convert to upercase

			$name = ucfirst($name);

			Validation::bindData('reg', $this->table_name, [

					'username'       => $username,
					'password'       => $password,
					'retypepassword' => $retypepassword,
					'email'          => $email,
					'name'           => $name

				]);
			$this->formValueKeeper = Validation::formValueKeeper('reg');

			$this->output = Validation::getData('reg');


			if (empty($this->output['errors'])) {	

				//Hash the password 

				$hashPass = password_hash($password, PASSWORD_DEFAULT);
				$ip = $this->getIp();

				$table_name = $this->table_name;
				//Insert the name into a database 

				App::get('database')->InsertData($table_name, [

				'username' => $username,
				'password' => $hashPass,
				'email'    => $email,
				'name'     => $name,
				'ip'       => $ip

				]);
				$this->output['errors'] = 'success';

			    $msgs  = $this->output['errors'];
			}else{

				$msgs  = $this->output['errors'];
				$infos = $this->formValueKeeper;

			}

			return view("register", [

					'msgs'  => $msgs,
					'infos' => $infos


				]);
		}


	} 

	public function getIp()
	{
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
}