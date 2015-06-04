<?php

class DAL{
	
	public $dbname = "i100580";
	public $conn;

	function connect(){
		$this->conn = mysql_connect('localhost',"i100580","992564");
		mysql_select_db($this->dbname,$this->conn);
	}
	
	function listar(){
		$sqlQuery = "select * from Alunos75";
		$recordset = mysql_query($sqlQuery,$this->conn);
		$this->record = mysql_fetch_array($this->recordset);
		while ($this->record){
		echo $this->record["Nome"]." – ".$this->record["Email"]."<br/>";
		$record = mysql_fetch_array($this->recordset);
		}
	}
}
?>