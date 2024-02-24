<?php
	ini_set('display_errors', 1);
	$username = "meetsegu_admin";
	$password = "meetpromoadmin";
	$database = "meetsegu_promo";
	
    $link = mysqli_connect("localhost", $username, $password, $database);
	 
	$input = mysqli_real_escape_string($link, $_POST['input']);
	
	$query = "SELECT `nome`, `pontos` FROM `promo` where `id` = '$input' ";
	
	$result = mysqli_query($link, $query);
	
	if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
        echo 'Desculpe, você ainda não tem pontos acumulados. Comece a indicar para ter acesso a todos os benfícios. Se tiver alguma dúvida, fale no nosso Whatsapp:71 98554-6000';
    }
    	
    $nome_pontos = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $nome_pontos .= $row['nome']." - ".$row['pontos'];    
    }
    echo $nome_pontos;
    mysqli_free_result($result);
?>