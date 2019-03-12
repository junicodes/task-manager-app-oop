<?php


/**
 * Page Controller Class

 */

namespace App\Controllers;

use App\Core\App; 
use App\Core\Session; 

class PageController
{
	protected $table_name = [
		'tasks' => 'tasks',
		'users' => 'users'
	];

	protected $column_name = [
		'tasks_column' => 'user_id',
		'users_column' => ''
	];
	protected $value = [
		'tasks_value' => '',
		'users_value' => ''
	];

	public function home()
	{	

		$this->value['tasks_value'] = $_SESSION['user_id'];

			//My Controller to interact with database
		$column_name = $this->column_name['tasks_column'];
		$value       = $this->value['tasks_value'];
		$table_name  = $this->table_name['tasks'];

		App::get('database')->selectData($table_name, array($column_name, '=', $value));

		$datas = App::get('database')->result();

		return view("index", [

			'datas' => $datas
		]);

	}

	public function about()
	{
		Session::start();
		return view("about");
	}

	public function contact()
	{
		Session::start();
		return view("contact");
	}


	public function login()
	{
		Session::start();
		Session::destroy();
		return view("login");

	}

	public function register()
	{	Session::start();
		Session::destroy();
		return view("register");

	}
	public function logout()
	{
		Session::destroy();
		return userView('login');

	}
	public function profile()
	{
		Session::start();
		return view("profile");

	}
}