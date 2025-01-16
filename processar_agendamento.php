<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servico = $_POST["servico"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "nossagrafica");
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Inserir o agendamento no banco
    $sql = "INSERT INTO agendamentos (servico, data, hora, nome, email, telefone) 
            VALUES ('$servico', '$data', '$hora', '$nome', '$email', '$telefone')";
    if ($conn->query($sql) === TRUE) {
        echo "Agendamento realizado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
}
?>
