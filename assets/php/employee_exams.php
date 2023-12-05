<?php
/*Criando conexão com o banco de dados */
$servidor = 'rafael.mysql.database.azure.com';
$user = 'rafael';
$password = 'Felippe@4';
$banco = 'programa';

$conexao = mysqli_connect($servidor,$user,$password,$banco);

/*Recebendo dados do form */
$exames = $_POST['exames'];

/*Comando para insert into*/
$sql = "INSERT INTO exames (nm_exame) values ('$exames')";

/*Comando para enviar os dados o banco*/
$insert = mysqli_query($conexao, $sql);

if ($insert) {
	echo "Registro inserido com sucesso!";
	echo '<script>window.close();</script>';
} else {
    echo "Erro ao inserir registro: " . mysqli_error($conexao);
}

mysqli_close($conexao);

?>
