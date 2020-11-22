<?php
class Database {
	private $servername, $username, $password, $database, $refix;
	private $connect, $result,$table;
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
		return $this->result->fetch_array();
	}
	function result_array() {
		while ($row = $this->result->fetch_array()) {
		   $row[] = $row;  
		} 

		return  empty($row) ==  true? false : $row;

	}
	function setTable($table){
        $this->table = $table;
	}
	function insert($data = array()){
       if (!empty($data) || !empty($this->table)) {
           $keys = array_keys($data);
           $values = array();
           var_dump($keys);
           exit();
           foreach ($data as $value) {
             	$item = array();
           	  foreach ($keys as  $value_k) {
           	  	$item[]= $data[$value_k];
           	  }

           	  $values[] = '( '.implode(",", $item).' )';
           }
           $values = implode(",", $values);
           $keys = '( '.implode(",", $keys).' )';
       	   $sql = "insert into {$this->refix}{$this->table} {$keys} values {$values};";
       	   var_dump($sql);
       	   exit();
       	   $this->connect->query($sql);
       }else{
       	die(1);
       }
	}
	function close() {
		$this->connect->close();
	}
}
?>