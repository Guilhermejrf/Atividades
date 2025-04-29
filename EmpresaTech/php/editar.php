<?php
include("conexao.php");

$id = $_GET['id_cand'];
$sql = "SELECT * FROM Candidato WHERE id_cand = $id";
$result = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_assoc($result);
?>

<h2>Editar Usuário</h2>
<form action="atualizar.php" method="POST">
<!-- O hidden vai esconder o ID do usuário para que não
 seja atualizado pelo usuário na troca de atualização -->
  <input type="hidden" name="id" value="<?php echo $dados['id_cand']; ?>">
  Nome Novo: <input type="text" name="nome" value="<?php echo $dados['nome']; ?>"><br>
  Email Novo: <input type="text" name="email" value="<?php echo $dados['email']; ?>"><br>
  <button type="submit">Atualizar</button>
</form>