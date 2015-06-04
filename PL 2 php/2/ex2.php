<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xml:lang="pt" xmlns="http://www.w3.org/1999/xhtml" lang="pt">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1"/>
    <title>demo</title>
		
    <!-- //Definição de estilos -->
    <style type="text/css">

    tr{font:11pt verdana}
	
    select{font:8pt verdana}
	
    .rotulo{text-align:right;
			color:blue}

    #boxform {border: solid #33CCFF;
               background-color: #DDDDDD;
               width:75%;
               margin-left: auto;
               margin-right: auto;
    }
    .tableform { margin-left: auto;
               margin-right: auto;
    }
	
	input, select, textarea{
			background-color: red;
			}

			
    </style>

<script type="text/javascript">




function valida(){
	if(validaNome())
		if(validaIdade())
			if(validaEmail())
				if(imprimeDados()) return true;
	return false;
}

function validaNome(){
	var regExpr=/^[A-Za-z]+\D$/;
	num=document.getElementById("tnome").value;
	if (regExpr.test(num)){
		return true;
	}else{
		alert("Erro no Nome");
	}
	return false;
}

function validaEmail(){
	var regExpr=/^.+@.+\..{2,3}$/;
	email=document.getElementById("temail").value;
	if(regExpr.test(email)){
		return true;
	}else{
		alert("Email Invalido");
	}
	return false;
}

function validaIdade(){
	var num=document.getElementById("tidade").value;
	if(num>=16 && num<=116){
		return true;	
	}else{
		alert("Idade Invalida");
	}
	return false;
}

function imprimeDados(){
	var tnome=document.getElementById("tnome").value;
	var tidade=document.getElementById("tidade").value;
	window.confirm("Nome: "+tnome+"\nIdade: "+tidade);
	return true;
}

</script>

 </head><body>

<p style="text-align: center;">
<img style="width: 75%;" src="topo.jpg" alt="ISEP"/>
</p>
<p>
</p><div id="boxform">
<form action="action.php" method="GET" onsubmit="return valida();">

<table class="tableform">

    <caption style="font-size: 22pt; margin: 20px;">
                    Formulário de Registo
            
    </caption>
     
    <tbody><tr>

            <td class="rotulo">Nome:</td>
            <td><input name="tnome" id="tnome" size="36" type="text"/></td>
    </tr>
    <tr>
            <td class="rotulo">Idade:</td>
            <td><input name="tidade" id="tidade" size="3" type="text"/></td>
    </tr>

     <tr>
            <td class="rotulo">Distrito:</td>
            <td>
                    <select size="1" name="sdistrito" id="sdistrito">
                            <option selected="selected" value="Porto">Porto</option>
                            <option value="Lisboa">Lisboa</option>
                            <option value="Braga">Braga</option>
                            <option value="Viana">Viana do Castelo</option>
							<option value="Braga">Coimbra</option>
							<option value="Braga">�?vora</option>
							<option value="VilaReal">VilaReal</option>
                    </select></td>
    </tr>
    <tr>
            <td class="rotulo">Codigo Postal:</td>
            <td><input name="cpostal4" id="cpostal4" size="4" type="text"/> -
                <input name="cpostal3" id="cpostal3" size="3" type="text"/>

            </td>
    </tr>
    <tr>
            <td class="rotulo">Sexo:</td>
            <td>
            <input name="tsexo" value="Masculino" checked="checked" type="radio"/>Masculino
            <input name="tsexo" value="Feminino" type="radio"/>Feminino
            </td>
    </tr>

    <tr>
            <td class="rotulo">Interesses:</td>
            <td>
            <input name="interesses" value="1" checked="checked" type="checkbox"/>
                    Música
            <input name="interesses" value="2" type="checkbox"/>
                    Cinema
            <input name="interesses" value="3" type="checkbox"/>
                    Futebol
			 <input name="interesses" value="4" type="checkbox"/>
                    Teatro
	    <input name="interesses" value="5" type="checkbox"/>
                    Basquetebol		
            </td>

    </tr>
    <tr>
            <td class="rotulo">email:</td>
            <td><input name="temail" id="temail" type="text"/></td>
    </tr>
     <tr>
            <td class="rotulo">Observações</td>
            <td><textarea id="tarea" name="tarea" rows="3" cols="40"></textarea></td>

    </tr>

     <tr>
            <td class="rotulo">Password: </td>
            <td><input id="pass" name="pass" type="password" /></td>
    </tr>
    <tr>
            <td class="rotulo">Confirmar Password: </td>

            <td><input id="cpass" type="password"/></td>
    </tr>
    <tr>
            <td colspan="2" style="text-align: center;">
            <br/><input value="Enviar" type="submit" style="background-color:white;"/>
			&nbsp&nbsp<input value="Limpar" type="reset" style="background-color:white;"/>
			&nbsp&nbsp<input value="Limpar" type="reset" style="background-color:white;">
				
            </td>
    </tr>

    </tbody>

    </table>
    </form>
    </div>
<p>
    <a href="http://validator.w3.org/check?uri=referer">
	<img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /> </a>
  </p>
<p>
    <a href="http://jigsaw.w3.org/css-validator/check/referer"/>

        <img style="border:0;width:88px;height:31px"
            src="http://jigsaw.w3.org/css-validator/images/vcss"
            alt="Valid CSS!" />

</p>
</body>

</html> 
