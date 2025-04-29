<?php
include ("conexao.php");

$id_cand = $_GET['id_cand'];
$sql = "DELETE FROM Candidato WHERE id_cand = $id_cand";
$result = mysqli_query($conexao, $sql);
if($result){
    header("Location: dashboard.php");
    exit();
}
else{
    echo "Exclusão falhou " . mysqli_error($conexao);
}
?>