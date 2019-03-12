<?php


session_start();

class QueryBuilder
{
	protected $pdo;
	protected $query;
	protected $result;
	protected $count;

	public function __construct($pdo)
	{
		$this->pdo = $pdo;
	}

	public function selectData($table, $where)
	{
		return $this->action('SELECT *', $table, $where);
	}

	public function deleteData($table, $where)
	{
		$key = 'del';
		return $this->action('DELETE', $table, $where, $key);
	}

	public function action($action, $table, $where = array(), $key='')
	{
		$operators = array('=', '>', '<', '>=', '<=', 'Like', 'like');
		$commands = array('AND', 'and', 'OR', 'or');	

			$field       = $where[0];
			$operator    = $where[1];
			$value       = $where[2];
			$command     = $where[3];
			$field_2     = $where[4];
			$value_2     = $where[6];

		if (empty($where)) {

				$query = "{$action} FROM {$table}";

		}elseif (count($where) === 3) {

				if (in_array($operator, $operators)) {
					$query = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
					//Bind the value to the query method above
				}

					
		} elseif (count($where) === 7) {

				if (in_array($operator, $operators)) {
					if (in_array($command, $commands)) {
						$query = "{$action} FROM {$table} WHERE {$field} {$operator} ? {$command} {$field_2} {$operator} ?";
					}
					//Bind the value to the query method above


			     }
		}
		    try {

		    	   if (!empty($value_2)) {
		    			return $this->query($query, array($value, $value_2));

		    		}else{
		    			return $this->query($query, array($value), $key);

				
		    		}

				} catch (Exception $e) {

					die('1 Oops something when wrong');
				}
	}


	public function query($sql, $params = array(), $key='')
	{
		$this->query = $this->pdo->prepare($sql);

		
		//check for equaliy
		if ($this->query) {
			//count the params
			$x = 1;
			if (count($params)) {
				//loop thru and bind the values
				foreach ($params as $param) {
					//use the $x variable to locate the place hoder from the sql query
					$this->query->bindValue($x, $param);
					$x++;
				}
			}
			try {
				if ($key == "del" || $key == "update") {
					$this->query->execute();
				}else{
					$this->query->execute();
					//Return the data's 
					$this->result = $this->query->fetchAll(PDO::FETCH_OBJ);
					//update the count property 
					$this->count = $this->query->rowCount();
				}

			} catch (Exception $e) {

				die('2 Oops something when wrong');
			}
			
		}
	}

	public function result()
	{
		return $this->result;
	}

	public function getCount()
	{
		return $this->count;
	}
	
	public function updateData($table, $id, $id_name, $fields, $key='')
	{
		$set = "";
		$x = 1;
		foreach ($fields as $name => $value) {
			$set .= "{$name} = ?";

			if ($x < count($fields)) {
				$set .= " , ";
			}
			$x++;
		}

		$sql = "UPDATE {$table} SET {$set} WHERE {$id_name} = {$id}";

		try {

				return $this->query($sql, $fields, $key);

			} catch (Exception $e) {

				die('Oops something when wrong');
			}	
	
	}

	public function InsertData($table, $parameters)
	{
		//get the first array key from the array

		
		$sql = sprintf(

				'INSERT INTO %s (%s) VALUES (%s)',
				//first place holder	
				 $table,
				//Second place holder	
				 implode(',', array_keys($parameters)),
				//Third place holder
				 ':' . implode(', :', array_keys($parameters))
			);

		try {
			$statement = $this->pdo->prepare($sql);

		    $statement->execute($parameters);

		} catch (Exception $e) {
			die('Oops something when wrong');
		}
	
	}
}

?>