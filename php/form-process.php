<?php

	ini_set('display_errors', 1);
	$ORIGIN = $_POST["origin"];
	unset($_POST["origin"]);

	if($ORIGIN == 'contato'){
		$Subject = "[CONTATO SITE MEETSEGUROS] Nova mensagem!";
	}
	elseif($ORIGIN == 'agendamento'){
		$Subject = "[AGENDAMENTO] Nova solicitação!";
	}
	elseif($ORIGIN == 'bike'){
		$Subject = "[COTAÇÃO] Nova solicitação de cotação de seguro bicicleta!";
	}
	foreach ($_POST as $k => $v) {
		$Body .= "$k: $v\n";
	}

	$EmailTo = "comercial@meetseguros.com.br";
	// // send email
	$success = mail($EmailTo, $Subject, $Body, "From:".$_POST["Email"]);
	 
	// // redirect to success page
	if ($success){
	   echo "success";
	}else{
	    echo "invalid";
	}
 
?>