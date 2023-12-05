<?php
/*Criando conexão com o banco de dados */
$servidor = 'rafael.mysql.database.azure.com';
$user = 'rafael';
$password = 'Felippe@4';
$banco = 'programa';

$conexao = mysqli_connect($servidor,$user,$password,$banco);

/*Recebendo dados do form */
$empresa = $_POST ['empresa'];
$telefone = $_POST ['telefone'];
$endereco = $_POST ['endereco'];
$numero = $_POST ['numero'];
$bairro = $_POST ['bairro'];
$cidade = $_POST ['cidade'];
$estado = $_POST ['estado'];
$cep = $_POST ['cep'];
$cnpj = $_POST ['cnpj'];
$email = $_POST ['email'];
$senha = $_POST ['senha'];


/*Comando para insert into*/
$sql = "INSERT INTO `empresa` (`cnpj`, `nm_empresa`, `nr_telefone`, `nm_endereco`, `nr_endereco`, `nm_bairro`, `cep`, `nm_cidade`, `nm_estado`, `email`, `senha`) 
        VALUES ('$cnpj', '$empresa', '$telefone', '$endereco', '$numero', '$bairro', '$cep', '$cidade', '$estado', '$email', '$senha');";


/*Comando para enviar os dados o banco*/
$insert = mysqli_query($conexao, $sql);

if ($insert) {
	echo "<script>alert('Registro inserido com sucesso!'); window.history.back();</script>";

} else {
    echo "Erro ao inserir registro: " . mysqli_error($conexao);
}

mysqli_close($conexao);

?>
