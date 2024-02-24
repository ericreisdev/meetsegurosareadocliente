<?

$destinatario = "aldocampos@meetseguros.com.br, comercial@meetseguros.com.br";

$cod = $_REQUEST['cod'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$fim = $_REQUEST['fim'];
$message = $_REQUEST['message'];

 // monta o e-mail na variavel $body

$body = "===================================" . "\n";
$body = $body . "        AGENDAMENTO PARCEIRO        " . "\n";
$body = $body . "===================================" . "\n\n";
$body = $body . "Parceiro: " . $cod . "\n";
$body = $body . "Nome: " . $name . "\n";
$body = $body . "Email: " . $email . "\n";
$body = $body . "Celular/Whatsapp: " . $phone . "\n";
$body = $body . "Fim da Vigência: " . $fim . "\n";
$body = $body . "Mensagem: " . $message . "\n\n";
$body = $body . "===================================" . "\n";

// envia o email
mail($destinatario, $message , $body, "From: $email\r\n");

// redireciona para a página de obrigado
header("location:/agendamento/obrigado.html");


?>