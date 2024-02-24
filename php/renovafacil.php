<?

$destinatario = "aldocampos@meetseguros.com.br, comercial@meetseguros.com.br";

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$cpf = $_REQUEST['cpf'];
$estadocivil = $_REQUEST['estado_civil'];
$placa = $_REQUEST['placa'];
$anofabricacao = $_REQUEST['ano_fab'];
$zero = $_REQUEST['zero_km'];
$cep = $_REQUEST['cep'];
$garage = $_REQUEST['garagem'];
$portao = $_REQUEST['portao'];
$gartrab = $_REQUEST['gar_trab'];
$garfac = $_REQUEST['gar_fac'];
$uso = $_REQUEST['uso'];
$outro = $_REQUEST['outros'];
$cobertura = $_REQUEST['cobertura'];
$tipomoradia = $_REQUEST['tipo'];
$kmtrabalho = $_REQUEST['km_trab'];
$alienado = $_REQUEST['alienado'];
$kitgas = $_REQUEST['kit_gas'];
$seguradora = $_REQUEST['seguradora'];
$bonus = $_REQUEST['bonus'];
$vigencia = $_REQUEST['vigencia'];
$sinistrado = $_REQUEST['sinistro'];
$observa = $_REQUEST['observacao'];
$message = $_REQUEST['name'];

 // monta o e-mail na variavel $body

$body = "===================================" . "\n";
$body = $body . "RENOVAÇÃO SEGURO AUTO" . "\n";
$body = $body . "===================================" . "\n\n";
$body = $body . "Nome: " . $name . "\n";
$body = $body . "Email: " . $email . "\n";
$body = $body . "Celular/Whatsapp: " . $phone . "\n";
$body = $body . "CPF: " . $cpf . "\n";
$body = $body . "Estado Civil: " . $estadocivil . "\n";
$body = $body . "Placa do Veículo: " . $placa . "\n";
$body = $body . "Ano Fabricação/Ano Modelo: " . $anofabricacao . "\n";
$body = $body . "Veículo Zero Km? " . $zero . "\n";
$body = $body . "CEP de Pernoite: " . $cep . "\n";
$body = $body . "Garagem na Residência: " . $garage . "\n";
$body = $body . "Tipo de Portão: " . $portao . "\n";
$body = $body . "Garagem no Trabalho? " . $gartrab . "\n";
$body = $body . "Garagem na Faculdade? " . $garfac . "\n";
$body = $body . "Tipo de Uso do Veículo: " . $uso . "\n";
$body = $body . "Outro Tipo de Uso: " . $outro . "\n";
$body = $body . "Deseja Cobertura Para 18 a 25 anos?  " . $cobertura . "\n";
$body = $body . "Tipo de Moradia: " . $tipomoradia . "\n";
$body = $body . "Km até o trabalho? " . $kmtrabalho . "\n";
$body = $body . "O Veículo é Alienado? " . $alienado . "\n";
$body = $body . "Possui Kit-Gás? " . $kitgas . "\n";
$body = $body . "Qual é a Seguradora Atual? " . $seguradora . "\n";
$body = $body . "Qual a Classe de Bônus Atual? " . $bonus . "\n";
$body = $body . "Quando é o Fim da Vigência? " . $vigencia . "\n";
$body = $body . "Houve Algum Sinistro? " . $sinistrado . "\n";
$body = $body . "Observações: " . $observa . "\n\n";
$body = $body . "===================================" . "\n";

// envia o email
mail($destinatario, $message, $body, "From: $email\r\n");

// redireciona para a página de obrigado
header("location:/agendamento/obrigado.html");

?>