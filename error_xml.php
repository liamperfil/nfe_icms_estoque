<?php
# página erro caso o xml não seja localizado no diretório
session_start();

include_once('index.php');
include_once('conn.php');

if ( isset($_POST['submit']) && !empty($_POST['chavexml']) ) {
    include_once('config.php');
}

echo "<br>O arquivo .xml solicitado não foi localizado no diretório.";
echo "<br>Adicione o arquivo no diretório e tente novamente.";
echo "<br>$_SESSION[chaveInput]";

# adiciona a chave do arquivo xml não localizado na tabela xml_n_localizado
$testeChave = mysqli_query($conn, "SELECT * FROM xml_n_localizado WHERE xmlN='$_SESSION[chaveInput]'");
if (mysqli_num_rows($testeChave) < 1) {
    $sql = mysqli_query($conn, "INSERT INTO xml_n_localizado VALUES ($_SESSION[chaveInput])");
}

?>
