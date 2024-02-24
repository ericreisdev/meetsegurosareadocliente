<?

$destinatario = "aldocampos@meetseguros.com.br, comercial@meetseguros.com.br";

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$phone = $_REQUEST['phone'];
$cpf = $_REQUEST['cpf'];
$cep = $_REQUEST['cep'];
$tipo = $_REQUEST['tipo'];
$marca = $_REQUEST['marca'];
$modelo = $_REQUEST['modelo'];
$serie = $_REQUEST['serie'];
$zerokm = $_REQUEST['zero_km'];
$ano = $_REQUEST['ano'];
$valor = $_REQUEST['valor'];
$local = $_REQUEST['local'];
$quadro = $_REQUEST['quadro'];
$configuracao = $_REQUEST['configuracao'];
$modalidade = $_REQUEST["modalidade"] ? implode(", ", $_POST["modalidade"]) : "Nenhum módulo selecionado.";
$utilizacao =  isset($_POST["utilizacao"]) ? implode(", ", $_POST["utilizacao"]) : "Nenhum módulo selecionado.";
$terreno =  isset($_POST["terreno"]) ? implode(", ", $_POST["terreno"]) : "Nenhum módulo selecionado.";
$uso = $_REQUEST['uso'];
$treina = $_REQUEST['treina'];
$frequencia = $_REQUEST['frequencia'];
$observa = $_REQUEST['observacao'];
$message = $_REQUEST['name'];

 // monta o e-mail na variavel $body

$body = "===================================" . "\n";
$body = $body . "COTAÇÃO SEGURO BIKE" . "\n";
$body = $body . "===================================" . "\n\n";
$body = $body . "Nome: " . $name . "\n";
$body = $body . "Email: " . $email . "\n";
$body = $body . "Celular/Whatsapp: " . $phone . "\n";
$body = $body . "CPF: " . $cpf . "\n";
$body = $body . "CEP: " . $cep . "\n";
$body = $body . "Tipo da Bike: " . $tipo . "\n";
$body = $body . "Marca da Bike: " . $marca . "\n";
$body = $body . "Modelo da Bike: " . $modelo . "\n";
$body = $body . "Número de Série: " . $serie . "\n";
$body = $body . "É Nova? " . $zerokm . "\n";
$body = $body . "Ano de Fabricação: " . $ano . "\n";
$body = $body . "Valor de Mercado: " . $valor . "\n";
$body = $body . "Local de Compra? " . $local . "\n";
$body = $body . "Material do Quadro: " . $quadro . "\n";
$body = $body . "Configuração da Bike: " . $configuracao . "\n";
$body = $body . "Modalidade da Bike?  " . $modalidade . "\n";
$body = $body . "Utilização da Bike? " . $utilizacao . "\n";
$body = $body . "Tipo de Terreno que Irá Rodar?? " . $terreno . "\n";
$body = $body . "Participa de Competições? " . $uso . "\n";
$body = $body . "Treina com Assessoria?? " . $treina . "\n";
$body = $body . "Frequência de Uso? " . $frequencia . "\n";
$body = $body . "Observações: " . $observa . "\n\n";
$body = $body . "===================================" . "\n";

// envia o email
mail($destinatario, $message, $body, "From: $email\r\n");

// redireciona para a página de obrigado
header("location:/agendamento/obrigado.html");

?>