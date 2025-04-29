<?php
    include("conexao.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO Candidato( nome, email) VALUES 
    ('$nome', '$email')";
    if (mysqli_query($conexao, $sql)) {
        header ("Location:painel.php");
    } else {
        echo "erro". mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);
?>