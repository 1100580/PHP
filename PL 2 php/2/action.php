<?
	$nome=$_GET['tnome'];
	$idade=$_GET['tidade'];
	$dist=$_GET['sdistrito'];
	$cpostm=$_GET['cpostal4'];
	$cposts=$_GET['cpostal3'];
	$sexo=$_GET['tsexo'];
	$inter=$_GET['interesses[]'];
?>
<html>
	<body>
		<table border="1">
			<th>Campo</th><th>Valor</th>
			<tr><td>Nome:</td><td><?php echo "$nome" ?></td></tr>
			<tr><td>Idade:</td><td><?php echo "$idade" ?></td></tr>
			<tr><td>Distrito:</td><td><?php echo "$dist" ?></td></tr>
			<tr><td>Cod. Postal:</td><td><?php echo "$cpostm-$cposts" ?></td></tr>
			<tr><td>Sexo:</td><td><?php echo "$sexo" ?></td></tr>
			<tr><td>Interesses:</td><td><?php foreach($_GET as $key => $value){
												if(is_array($value))
													$value = implode(", ", $value);
												echo "<tr><td>$key</td></tr>|<td>$value</td></tr>"
											}?>
		</table>
	</body>
</html>
