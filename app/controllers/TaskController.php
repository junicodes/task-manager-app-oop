<?php

/**
 * Task Controller
 */
namespace App\Controllers;

use App\Core\App; 
use App\Core\Validation; 

class TaskController
{
	public $output = [];
	public $formValueKeeper = [];
	public $activeSessions;
	protected $table_name = 'tasks';
	protected $column_name = [
				'user_id' => 'user_id',
				'status' => 'status',
				'task_id' => 'task_id'
			];
	protected $id;
	protected $username;
	protected $key_passage;
	protected $user_id;
	protected $task_title;
	protected $task_description;
	protected $task_accomplish_method;
	protected $task_time;
	protected $task_date;
	protected $task_id;
	protected $status;


    public function updateTask()
    {
		$this->task_id = trim($_POST['task_id']);
		$this->status  = trim($_POST['status']);
		Validation::bindData('update', $this->table_name, [

					'task_id'   => $this->task_id,
					'status'    => $this->status
				]);

		$this->output = Validation::getDataCheck('update');
		
		if (empty($this->output['errors'])) {

			$column_name   = $this->column_name['status'];
			$value         = $this->status;
			$column_name_2 = $this->column_name['task_id'];
			$value_2       = $this->task_id;
			$table_name    = $this->table_name;
			$key = 'update';

			App::get('database')->updateData($table_name, $value_2, $column_name_2, array(

					$column_name => $value

				), $key);

			$datas = '';

		}else{

			$datas = $this->output['errors'];
		}

		//redirect to a universal ajax powerd view controller Datacontroller 
		$this->key_passage = 'update_status';

	    return $this->dropResult($this->key_passage, $datas);

    }

	public function emmitTasks()
	{
	
		$this->id = $_SESSION['user_id'];

		//My Controller to interact with database
		$column_name = $this->column_name['user_id'];
		$value       = $this->id;
		$table_name  = $this->table_name;

		App::get('database')->selectData($table_name, array($column_name, '=', $value));

		$datas = App::get('database')->result();

		$this->key_passage = 'emmit_task_data';

		//redirect to a universal ajax powerd view controller Datacontroller 

	    return $this->dropResult($this->key_passage, $datas);

	}
	
	public function insertTasks() {
		//Run the validation process for our registration form
			$this->user_id                 =  trim($_POST['user_id']);
			$this->task_title              =  trim($_POST['task_title']);
			$this->task_description        =  trim($_POST['task_description']);
			$this->task_accomplish_method  =  trim($_POST['task_accomplish_method']);
			$this->task_time               =  trim($_POST['task_time']);
			$this->task_date               =  trim($_POST['task_date']);	
			//Convert to uppper case

				$this->task_title             = ucfirst($this->task_title);
				$this->task_description       = ucfirst($this->task_description);
				$this->task_accomplish_method = ucfirst($this->task_accomplish_method);	

			Validation::bindData('task', $this->table_name, [

					'user_id'                => $this->user_id,
					'task_title'             => $this->task_title,
					'task_description'       => $this->task_description,
					'task_accomplish_method' => $this->task_accomplish_method,
					'task_time'              => $this->task_time,
					'task_date'              => $this->task_date

				]);

			//use to return the od input detaills  if an error occur
			$this->formValueKeeper = Validation::formValueKeeper('task');
				//Get the error output if any 
			$this->output = Validation::getDataTask('task');

			return $this->actionTask();
			//After Validation
		}
		
	public function actionTask() {	
/////////////////////////////////////////////////////////////////////////////
			if (empty($this->output['errors'])) {	

				$table_name = $this->table_name;
				$this->output['errors'] = 'success';
			    $msgs = $this->output['errors'];

			  
				//Insert the name into a database 
				App::get('database')->InsertData($table_name, [

				'user_id'                => $this->user_id,
				'task_title'             => $this->task_title,
				'task_description'       => $this->task_description,
				'task_accomplish_method' => $this->task_accomplish_method,
				'task_time'              => $this->task_time,
				'task_date'              => $this->task_date

				]);

				$datas =  [

					'msgs' => $msgs
				  ];

			}else{

				$msgs = $this->output['errors'];
				$infos = $this->formValueKeeper;

				foreach ($infos as $info) {
					$info['task_title'];
					$info['task_description'];
					$info['task_accomplish_method'];
				}

				$datas =  [

					'msgs'                   => $msgs,
					'task_title'             => $info['task_title'],
					'task_description'       => $info['task_description'],
					'task_accomplish_method' => $info['task_accomplish_method']
				  ];

			}

			$this->key_passage = 'task_data';

			return $this->dropResult($this->key_passage, $datas);
	}	

	public function deleteTask()
	{
	
		$this->task_id = trim($_POST['task_id']);

		//My Controller to interact with database
		$column_name = $this->column_name['task_id'];
		$value       = $this->task_id;
		$table_name  = $this->table_name;

		App::get('database')->deleteData($table_name, array($column_name, '=', $value));

		$datas = "This tasks has been successfully deleted!";

		$this->key_passage = 'delete_task_data';

		//redirect to a universal ajax powerd view controller Datacontroller 

	    return $this->dropResult($this->key_passage, $datas);

	}

	public function dropResult($key_passage, $datas)
	{

		return require 'DataController.php';
	}
}