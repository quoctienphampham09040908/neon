<?php
class Database {
	private $servername, $username, $password, $database, $refix;
	private $connect, $result,$table,$condition;
	public function __construct($config = array()) {
		$this->servername = $config['servername'];
		$this->username = $config['username'];
		$this->password = $config['password'];
		$this->database = $config['database'];
		$this->refix = $config['refix'];
	}
	// public function __destruct(){
	// 	 echo "Destroy class Database";
	// }
	public function connect() {
		$this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
		if ($this->connect->connect_error) {
			die("Connection failed: " . $this->connect->connect_error);
		}
		$this->connect->set_charset("utf8");
	}
	function query($sql) {
		$this->result = $this->connect->query($sql);
	}
	function fetch_assoc() {
		return $this->result->fetch_assoc();
	}
	function fetch_array() {
		return $this->result->fetch_array(MYSQLI_ASSOC);
	}
	function result_array() {
		$row= array();
		while (true) {
		  $item =  $this->result->fetch_array(MYSQLI_ASSOC);
		  if(!empty($item)){
			$row[] = $item;  
		  }else{
		     break;
		  }
		} 
		return  empty($row) ==  true? false : $row;
	}
	function setTable($table){
        $this->table = $table;
	}
	function condition($condition){
        $this->condition = $condition;
	}
	function getMaxId($table){

		$this->query("select max(id) as maxid from {$this->refix}{$table}");
		$result = $this->result->fetch_array(MYSQLI_ASSOC);
		if(in_array(@$result['maxid'], array(0, "0", "", NULL)))
			return 1;
		return intval($result['maxid']);
	}
	function insert($data = array()){
       if (!empty($data) || !empty($this->table)) {
           $keys = array_keys($data);
		   $values = array();
           foreach ($data as $value) {
             	$item = array();
           	  foreach ($keys as  $value_k) {
					 $item[]= $data[$value_k];

           	  }

		   }
		   $values = "('".implode("','", $item)."')";
		 
           $keys = '( '."`".implode("`,`", $keys)."`".')';
			  $sql = "insert into {$this->refix}{$this->table} {$keys} values {$values};";
			 if($this->connect->query($sql)){
				 return true;
			 }else{
				 return false;
			 }
			  
       }else{
       	die(1);
       }
	}
	function update($data = array()){
		if (!empty($data) || !empty($this->table)) {
			$keys = array_keys($data);
			$values = array();
			foreach ($data as $value) {
				  $item = array();
				  foreach ($keys as  $value_k) {
					  $item[]=  "`{$value_k}` = '{$data[$value_k]}'";
 
				  }
			}
			$values = implode(",", $item);
			$sql = "update {$this->refix}{$this->table} set {$values} where {$this->condition}";
			if($this->connect->query($sql)){
				return true;
			}else{
				return false;
			}
			
		}else{
			die(1);
		}
	 }
	function close() {
		$this->connect->close();
	}
}
