<?

$destinatario = "aldocampos@meetseguros.com.br, comercial@meetseguros.com.br";

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$placa = $_REQUEST['placa'];
$seguradora = $_REQUEST['seguradora'];
$vigencia = $_REQUEST['vigencia'];
$lgpd = $_REQUEST['lgpd'];
$observacao = $_REQUEST['observacao'];
$message = $_REQUEST['name'];

 // monta o e-mail na variavel $body

$body = "=================================================" . "\n";
$body = $body . " AGENDAMENTO - CLUBE DE DESCONTO - PARCERIA S001 " . "\n";
$body = $body . "=================================================" . "\n\n";
$body = $body . "Nome: " . $name . "\n";
$body = $body . "Email: " . $email . "\n";
$body = $body . "Celular/Whatsapp: " . $phone . "\n";
$body = $body . "Placa: " . $placa . "\n";
$body = $body . "Seguradora: " . $seguradora . "\n";
$body = $body . "Fim da Vigência: " . $vigencia . "\n";
$body = $body . "Observação: " . $observacao . "\n\n";
$body = $body . "=================================================" . "\n";

// envia o email
mail($destinatario, $message , $body, "From: $email\r\n");

// redireciona para a página de obrigado
header("location:/agendamento/obrigado.html");


?>