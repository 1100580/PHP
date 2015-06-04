<?php
include 'DAL.php';
		$dal = new DAL();
		$dal->connect();
		$dal->listar();
?>