<?php
include("conexao.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "UPDATE Candidato SET nome='$nome', email='$email' WHERE id_cand=$id";

if (mysqli_query($conexao, $sql)) {
    header("Location: dashboard.php");
} else {
    echo "Erro ao atualizar: " . mysqli_error($conexao);
}
?>
