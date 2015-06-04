<?php

		$dbname = "i100580";
		$conn = mysql_connect('localhost',"i100580","992564");
		mysql_select_db($dbname,$conn);
		$nome=$_GET['unome'];
		$email=$_GET['uemail'];
		$nota=$_GET['unota'];
		$bi=$_GET['ubi'];
		if(!empty($nome)){
			$sqlQuery = "UPDATE Alunos75
						SET Nome='$nome'
						WHERE NumBI='$ubi'";
			mysql_query($sqlQuery,$conn);
		}
		if(!empty($email)){
			$sqlQuery = "UPDATE Alunos75
						SET Email='$email'
						WHERE NumBI='$ubi'";
			mysql_query($sqlQuery,$conn);
		}
		if(!empty($nota)){
			$sqlQuery = "UPDATE Alunos75
						SET Nota='$nota'
						WHERE NumBI='$ubi'";
			mysql_query($sqlQuery,$conn);
		}
?>