<?php
class Database{
	public $mysql;
	function __construct(){
		$this->mysql=new mysqli("localhost","root","","ttms") or die("There's a problem connecting to the database.");
		}
	
	function affected(){
		$num=mysqli_affected_rows($this->mysql);
		return $num;
	}

	function select($var){
		$result=mysqli_query($this->mysql, $var);
		return $result;
	}
	
	function fetch($result){
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
	
	function query($var){
		mysqli_query($this->mysql, $var);
		}
}	
?>