<?php
/*Criando conexão com o banco de dados */
$servidor = 'rafael.mysql.database.azure.com';
$user = 'rafael';
$password = 'Felippe@4';
$banco = 'programa';

$conexao = mysqli_connect($servidor,$user,$password,$banco);

/*Recebendo dados do form */
$funcao = $_POST['funcao'];
$setor = $_POST['setor'];
$apto = $_POST['aptidao'];


/*Comando para insert into*/
 $sql = "INSERT INTO ficha (nm_funcao, nm_setor_funcao, aptidao) values ('$funcao', '$setor', '$apto')";

/*Comando para enviar os dados o banco*/
$insert = mysqli_query($conexao, $sql);

if ($insert) {
	echo "<script>alert('Registro inserido com sucesso!');";
} else {
    echo "Erro ao inserir registro: " . mysqli_error($conexao);
}

mysqli_close($conexao);

?>
