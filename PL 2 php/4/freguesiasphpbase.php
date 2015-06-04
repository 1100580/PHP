<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset="ISO-8859-1">
  
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <script type="text/javascript" >
	/*
        var xmlHttpObj;
		
		function CreateXmlHttpRequestObject(){
			xmlHttpObj = new XMLHttpRequest()
			return xmlHttpObj;
		}
		
		function MakeXMLHTTPCall(){
			xmlHttpObj = CreateXmlHttpRequestObject();
			if(xmlHttpObj){
				xmlHttpObj.open("GET","http://phpdev.dei.isep.ipp.pt/i100580/public_html/dados.xml", true);
				xmlHttpObj.onreadystatechange = stateHandler;
				xmlHttpObj.send(null);
			}
		}
		
		function stateHandler(){
			if ( xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200){
				var docxml = xmlHttpObj.responseXML;
			}
	*/
    </script>
    <?php
    // informação em arrays mas poderia também estar numa BD   
    $concelhosFreg= array( "Porto" => "Aldoar,Bonfim,Cedofeita,Foz do Douro,Lordelo do Ouro,Massarelos,Miragaia,Nevogilde,Paranhos,Ramalde",
                       "Vila Nova de Gaia" => "Arcozelo,Avintes,Canelas,Canidelo,Crestuma,Gulpilhares,Lever,Madalena,Mafamude,Olival,Oliveira do Douro,Pedroso,Perozinho"); 
    $n = count($concelhosFreg);
    if(isset($_GET['concelho']))
            {
            $concelho=$_GET['concelho'];
            }
	else
             $concelho="Porto"; 
      
     
    function fillFreguesias()
    {
       foreach($concelhosFreg as  $key => $value){
			if(is_array($value)
				$value=implode(", ",$value);
			echo "<option>$value>$key</option>";
		}
    } 
    
    function fillConcelhos()
    {
        foreach($concelhosFreg as $value){
			if(is_array($value)
				$value=implode(", ",$value);
			echo "<option>$value</option>";
		}
    }
    ?>
  </head>
  <body>
	<div style="text-align:center; color:blue;" >
	<img src="topo_index.jpg" "/><p/>
	<img src="javascript.jpg" />
	<img src="php.jpg" />
	<h3>DEI - ISEP</h3>
	<h4>ARQUITECTURA de SISTEMAS </h4>
	<br/>
	</div>

      <h3>
          Exemplo PHP - Dados do lado do servidor      </h3>
      <form action="" method="get">
      <table>
          <label>Nome</label>
          <input type="text" size="50" id="nome" />
          <p>Natural de:</p>
          <tr>
              <th>Concelho</th>
              <th>Freguesia</th>
          </tr>
          <tr>
              <td>
                  <select name="concelho" id ="concelho"  >
                    			
                   </select>
              </td>
              <td>
              <select name="freguesia" id ="freguesia" >
                
              </select>
              </td>
          </tr>
      </table>
      </form>
      
</body>
</html>