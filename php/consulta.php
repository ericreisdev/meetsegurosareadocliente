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
        echo 'error';
    }
    	
    $nome_pontos = "";
    while ($row = mysqli_fetch_assoc($result)) {
        $nome_pontos .= $row['nome']." - ".$row['pontos'];    
    }
    echo $nome_pontos;
    mysqli_free_result($result);
?>