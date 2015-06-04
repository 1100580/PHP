<?php
		$dbname = "i100580";
		$conn = mysql_connect('localhost',"i100580","992564");
		mysql_select_db($dbname,$conn);
		
		$nome=$_GET['tnome'];
		$bi=$_GET['tbi'];
		$email=$_GET['temail'];
		$nota=$_GET['tnota'];
		$sqlQuery = "INSERT INTO Alunos75 (Nome, numBI, Email, Estado, Nota)
						VALUES ('$nome','$bi','$email','1','$nota')";
						
		if (!mysql_query($sqlQuery,$conn))
		{
			die('Could not execute query insert:'.mysql_error());
		}else{
			echo"Inserted into Alunos75";
		}
?>