<?

$destinatario = "aldocampos@meetseguros.com.br, comercial@meetseguros.com.br";

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$message = $_REQUEST['message'];

 // monta o e-mail na variavel $body

$body = "===================================" . "\n";
$body = $body . "FALE CONOSCO - AGENDAMENTO" . "\n";
$body = $body . "===================================" . "\n\n";
$body = $body . "Nome: " . $name . "\n";
$body = $body . "Email: " . $email . "\n";
$body = $body . "Celular/Whatsapp: " . $phone . "\n";
$body = $body . "Mensagem: " . $message . "\n\n";
$body = $body . "===================================" . "\n";

// envia o email
mail($destinatario, $message , $body, "From: $email\r\n");

// redireciona para a página de obrigado
header("location:/agendamento/obrigado.html");


?>