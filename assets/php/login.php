<?php
session_start();

/* Criando conexão com o banco de dados */
$servidor = 'rafael.mysql.database.azure.com';
$user = 'rafael';
$password = 'Felippe@4';
$banco = 'programa';

$conexao = new mysqli($servidor, $user, $password, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Recupere as informações do formulário
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// Verifique se o nome de usuário e a senha não estão vazios
if (empty($usuario) || empty($senha)) {
    echo json_encode(["success" => false, "message" => "Usuário e senha são obrigatórios"]);
    exit();
}

// Consulta SQL para verificar o login
$sql = "SELECT nm_empresa, senha FROM empresa WHERE nm_empresa = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    $senha_armazenada = $row['senha'];

    if ($senha === $senha_armazenada) {
        // Login bem-sucedido
        $_SESSION['nm_empresa'] = $row['nm_empresa'];
        echo json_encode(["success" => true]);
        exit();
    } else {
        // Senha incorreta
        echo json_encode(["success" => false, "message" => "Senha incorreta"]);
    }
} else {
    // Nome de empresa não encontrado
    echo json_encode(["success" => false, "message" => "Usuário não encontrado"]);
}

$stmt->close();
$conexao->close();
?>
