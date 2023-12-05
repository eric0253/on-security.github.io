<?php
/*Criando conexão com o banco de dados */
$servidor = 'rafael.mysql.database.azure.com';
$user = 'rafael';
$password = 'Felippe@4';
$banco = 'programa';

$conexao = mysqli_connect($servidor,$user,$password,$banco);

/*Recebendo dados do form */
$funcionario = $_POST ['funcionario'];
$telefone = $_POST ['telefone'];
$endereco = $_POST ['endereco'];
$numero = $_POST ['numero'];
$bairro = $_POST ['bairro'];
$cidade = $_POST ['cidade'];
$estado = $_POST ['estado'];
$date = $_POST ['date'];
$cep = $_POST ['cep'];
$rg = $_POST ['rg'];
$cpf = $_POST ['cpf'];
$email = $_POST ['email'];

/*Comando para insert into*/
$sql = "INSERT INTO `funcionario` (`nm_funcinario`, `dt_nasc`, `nr_telefone`, `rg`, `cpf`, `nm_endereco`, `nr_endereco`, `nm_bairro`, `cep`, `nm_cidade`, `nm_estado`, `email`, `cnpj_empresa`) values ('$funcionario', '$date', '$telefone', '$rg', '$cpf', '$endereco', '$numero', '$bairro', '$cep', '$cidade', '$estado', '$email', '11.111.111/1111-11');";

        


/*Comando para enviar os dados o banco*/
$insert = mysqli_query($conexao, $sql);

if ($insert) {
    echo "Registro inserido com sucesso!";
} else {
    echo "Erro ao inserir registro: " . mysqli_error($conexao);
}

mysqli_close($conexao);

?>
