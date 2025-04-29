<?php
$servidor = "localhost";
$usuario = "root";
$senha = "123456";
$dbname = "Site";
$conexao = mysqli_connect($servidor, $usuario, $senha, $dbname);    
if (!$conexao) {
    die("erro". mysqli_connect_error());
}
?>