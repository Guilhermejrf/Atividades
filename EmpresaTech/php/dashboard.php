<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco de Candidatos</title>
    <link rel="stylesheet" href="css/style.css">
    <script>

    </script>
</head>
<body>
<?php

include("conexao.php");
$sql = "SELECT * FROM Candidato";
$result = mysqli_query($conexao, $sql);
?>
    <div class="container1">
        <h2>Lista de Candidatos</h2>
        <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
            <td><?php echo $row['id_cand']; ?></td>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
        
            <a href="editar.php?id_cand=<?php echo $row['id_cand']; ?>"> 
            <button>Editar</button></a></td>

            <a href="deletar.php?id_cand=<?php echo $row['id_cand']; ?>"> 
            <button>Deletar</button></a></td>

            </tr>
        <?php } ?>
        </table>
        </div>
</body>
</html>
