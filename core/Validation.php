<?php

namespace App\Core;

use App\Core\App; 

class Validation
{
	protected static $registry = [];
	public static $output = [];
	protected static $tableName;
	protected static $errors = "";
    public static $current_date;

	public static function bindData($key, $table, $data=[])
	{
		static::$registry[$key] = $data;
		static::$tableName      = $table;
	}

	public static function formValueKeeper($key)
	{
		if (array_key_exists($key, static::$registry)) 
		{

			return static::$registry;

		}
		
	}

	public static function getData($key)
	{
		if (! array_key_exists($key, static::$registry)) 
		{

			throw new Exception('Error in registration');

		}else{
			if ($key == 'reg') {
				
				foreach (static::$registry as $value) {
					$username = $value['username'];
					$email = $value['email'];
					$password = $value['password'];
					$retypepassword = $value['retypepassword'];
					$name = $value['name'];

					if (empty($username) || empty($email) || empty($password) || empty($name)) {
						static::$errors = "Registration error>> Please fill up empty field";
					}elseif (strlen($username) > 20) {
						static::$errors = "Username error>> Username should be less than 15 character's";
					}elseif (!preg_match("/^[a-zA-Z0-9@_]*$/", $username)) {
						static::$errors = "Username error>> Please use valid input character's [a-zA-Z0-9]";
					}elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						static::$errors = "Email error>> Email is invalid";
					}elseif (!preg_match("/^[a-zA-Z0-9_@.]*$/", $email)) {
					    static::$errors = "Email error>> Please use valid input character's [a-zA-Z0-9_@.]";
					}elseif (!preg_match("/^[a-zA-Z0-9@]*$/",$password)) {
						static::$errors = "Passowrd error>> Please use valid input character's [a-zA-Z0-9@]";
					}elseif (strlen($password) < 6) {
					    static::$errors = "Passowrd error>> Password must be above 6 character's";
					}elseif ($password !== $retypepassword) {
						static::$errors = "Passowrd error>> Password do not match";
					}elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
						static::$errors = "Name error>> Please use valid input character's [a-zA-Z ]";
					}elseif (strlen($name) > 30) {
						static::$errors = "Name error>> Name's should be less than 15 character's";
					
					}
				}
				//Check if user exist in the database
					if (empty(static::$errors)) 
					{
						 $column_name = 'username';
						 $value = $username;
						 $id = 'reg';
						 static::userCheck($column_name, $value, $column_name_2,  $value_2, $id, $password);
					}
				//Check if user email exist in the database
					if (empty(static::$errors)) 
					{
						 $column_name = 'email';
						 $value = $email;
						 $id = 'reg';
						 static::userCheck($column_name, $value, $column_name_2,  $value_2, $id, $password);
					}
			}

			if ($key == 'log') {

				foreach (static::$registry as $value) {
					$username = $value['username'];
					$password = $value['password'];

					if (empty($username) || empty($password)) {
						static::$errors = "Login error>> Please fill up empty field";
					}elseif (!preg_match("/^[a-zA-Z0-9@_]*$/", $username)) {
						static::$errors = "Login error>> Please use valid input character's [a-zA-Z0-9]";
					}elseif (!preg_match("/^[a-zA-Z0-9@]*$/",$password)) {
						static::$errors = "Login error>> Please use valid input character's [a-zA-Z0-9@]";
					}
				}

				if (empty(static::$errors)) 
					{
						 $column_name = 'username';
						 $value = $username;
						 $id = 'log';
						 static::userCheck($column_name, $value, $column_name_2,  $value_2, $id, $password);
					}
				//Check if user email exist in the database

			}
			return static::$output = [

				  'errors' => static::$errors

				   ];
		
		}	
	
	}


	public static function getDataTask($key)
	{

		static::$current_date = date('Y-m-d', time()+3600);;
		

		if (! array_key_exists($key, static::$registry)) 
		{

			throw new Exception('Error in registration');

		}else{
			if ($key == 'task') {
				
				foreach (static::$registry as $value) {

					$user_id                = $value['user_id'];
					$task_title             = $value['task_title'];
					$task_description       = $value['task_description'];
					$task_accomplish_method = $value['task_accomplish_method'];
					$task_time              = $value['task_time'];
					$task_date              = $value['task_date'];


					if (empty($task_title) || empty($task_description) || empty($task_date)) {
						static::$errors = "Please fill up empty field";
					}elseif (strlen($task_title) > 30) {
						static::$errors = "Task title should be less than 20 character's";
					}elseif (strlen($task_description) > 300) {
						static::$errors = "Task description/Accomplish means should be less than 300 character's";
					}elseif (strlen($task_accomplish_method) > 1000) {
						static::$errors = "Task Accomplish method should be less than 1000 character's";
					}elseif (!preg_match("/^[a-zA-Z0-9@_ ]*$/", $task_title)) {
						static::$errors = "Invalid input character's for task title[a-zA-Z0-9]";
					}elseif (static::$current_date > $task_date) {
						static::$errors = "Task Date should be above current Date!";
					
					}
				}
				//Check if user exist in the database
					if (empty(static::$errors)) 
					{
						 $column_name          = 'task_title';
						 $column_name_2        = 'user_id';
						 $value                = $task_title;
						 $value_2              = $user_id;
						 $id                   = 'task';
						 static::userCheck($column_name, $value, $column_name_2,  $value_2, $id, $password);
					}
			}
			return static::$output = [

				  'errors' => static::$errors

				   ];
		
		}	
	
	}
	public static function getDataCheck($key)
	{
		if (! array_key_exists($key, static::$registry)) 
		{
			throw new Exception('Error in validation');
		}else{
			if ($key == 'update') {
				foreach (static::$registry as $value) {
						$status = $value['status'];
						$task_id    = $value['task_id'];

						if (empty($status) || empty($task_id )) {
							static::$errors = "Validation error>> Error Occured! Please refresh";
						}
			  	   }	

				if (empty(static::$errors)) 
					{
						 $column_name = 'task_id';
						 $column_name_2 = 'status';
						 $value = $task_id;
						 $value_2 = $status;
						 $id = 'update';
						 static::userCheck($column_name, $value, $column_name_2, $value_2, $id, $password);
					}
			}	
			return static::$output = [

			  'errors' => static::$errors

			   ];
		}

	}

	public static function userCheck($column_name, $value, $column_name_2='', $value_2='', $id, $password='')
	{
			$table_name = static::$tableName;

			if ($id == 'task' || $id == 'update') {
				$check = App::get('database')->selectData($table_name, array($column_name, '=', $value, 'AND', $column_name_2, '=', $value_2));
			}else{
				$check = App::get('database')->selectData($table_name, array($column_name, '=', $value));
			}

			$check_count = App::get('database')->getCount();



					if ($id == 'reg') {
							if ($check_count == 1) 
							{
								return static::$errors = "Registration error>> {$value} already exist!";
							}
					 }elseif ($id == 'task'){
					 		if ($check_count == 1) 
					 		{
								return static::$errors = "Task title already exist!";
							}
					 }elseif ($id == 'log'){
					 		if ($check_count < 1) 
					 		{
								return static::$errors = "Login error>> Username or password does not exist!";
							}
					 }elseif ($id == 'update'){
					 		if ($check_count == 1) 
					 		{
								return static::$errors = "This task has already been confirmed!";
							}
					 }

				if ($id =='log') {
					$check_user_details = App::get('database')->result();
					foreach ($check_user_details as $check_user_detail) {
						$check_user_detail->username;
						$check_user_detail->password;

						//Dehashing password
						$de_hashing_pass = password_verify($password, $check_user_detail->password);


						if ($check_user_detail->username !== $value) {
							return static::$errors = "Login error 1>> {$value} or password does not exist!";
						}
						if($de_hashing_pass === false){
							return static::$errors = "Login error 2>> {$value} or password does not exist!";
						}
					}
			     }
	}

	

}
