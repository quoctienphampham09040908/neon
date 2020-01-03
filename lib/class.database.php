<?php

if(!defined('_lib')) die("Error");

class database{

	var $db;

	var $result;

	var $insert_id;

	var $sql = "";

	var $refix = "";



	var $servername;

	var $username;

	var $password;

	var $database;



	var $table = "";

	var $condition = "";



	var $error = array();



	function database($config = array()){

		if(!empty($config)){

			$this->init($config);

			$this->connect();

		}

	}



	function init($config = array()){

		foreach($config as $k=>$v)

			$this->$k = $v;

	}



	function connect(){

		$this->db = @mysql_connect($this->servername, $this->username, $this->password);



		if( !$this->db){

			die('Could not connect: ' . mysql_error());

		}



		if( !mysql_select_db($this->database, $this->db)){

			die(mysql_errno($this->db) . ": " . mysql_error($this->db));

			return false;

		}



		mysql_query('SET NAMES "utf8"',$this->db);

	}



	function query($sql=""){

		if($sql)

			$this->sql = str_replace('#_', $this->refix, $sql);

		$this->result = mysql_query($this->sql,$this->db);

		if(!$this->result){

			die("syntax error: ".$this->sql);

		}

		return $this->result;

	}



	function insert($data = array()){

		$key = "";

		$value = "";

		foreach($data as $k => $v){

			$key .= ",`" . $k . "`";

			if($v != "NULL")

				$value .= ",'" . mysql_escape_string($v) . "'";

			else

				$value .= "," . $v;

		}

		if($key{0} == ",") $key{0} = "(";

		$key .= ")";

		if($value{0} == ",") $value{0} = "(";

		$value .= ")";

		$this->sql = "insert into ".$this->refix.$this->table.$key." values ".$value;

		$this->query();

		$this->insert_id = mysql_insert_id();

		return $this->result;

	}



	function update($data = array()){

		$values = "";

		foreach($data as $k => $v){

			if($v != "NULL")

				$values .= ", `" . $k . "` = '" . mysql_escape_string($v)  ."' ";

			else

				$values .= ", `" . $k . "` = " . $v  ." ";

		}

		if($values{0} == ",") $values{0} = " ";

		$this->sql = "update " . $this->refix . $this->table . " set " . $values;

		$this->sql .= $this->condition;

		return $this->query();

	}



	function delete(){

		$this->sql = "delete from " . $this->refix . $this->table . " " . $this->condition;

		return $this->query();

	}



	function select($str = "*"){

		$this->sql = "select " . $str;

		$this->sql .= " from " . $this->refix . $this->table;

		$this->sql .= " " . $this->condition;

		return $this->query();

	}



	function num_rows(){

		return mysql_num_rows($this->result);

	}



	function fetch_array(){

		return mysql_fetch_assoc($this->result);

	}



	function result_array(){

		$arr = array();

		while ($row = mysql_fetch_assoc($this->result))

			$arr[] = $row;

		return $arr;

	}



	function setTable($tbl){

		$this->table = str_replace($this->refix, "", $tbl);

	}



	function setCondition($condition = ""){

		$this->condition = $condition;

	}



	function getMaxId($table){

		$this->query(sprintf("select max(id) as maxid from #_%s", $table));

		$result = $this->fetch_array();

		if(in_array(@$result['maxid'], array(0, "0", "", NULL)))

			return 1;

		return intval($result['maxid']) + 1;

	}

}

?>