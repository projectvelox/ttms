<?php
require 'database.php';
class Functions extends Database{
function test(){
	$this->result=$this->select("SELECT * from tournament");
	echo '<option value="">Select Tournament</option>';
	while($this->row=$this->fetch($this->result)) {    
		echo '<option value="'.$this->row['name'].'">'.$this->row['name'].'</option>';
		}
	
	}
}
?>