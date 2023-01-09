<?php
session_start();
include_once('conn.php');

$chaveInput = $_POST['chavexml'] . ".xml";
$_SESSION['chaveInput'] = $_POST['chavexml'];
$xml=simplexml_load_file('./xml/'.$chaveInput) or die(header('Location: error_xml.php'));

$nf=$xml->NFe->infNFe->ide->nNF;
$emit=$xml->NFe->infNFe->emit->xNome;
$data=$xml->protNFe->infProt->dhRecbto;
$data=substr("$data",0, 10);
$vNF=$xml->NFe->infNFe->total->ICMSTot->vNF;
$vICMS=$xml->NFe->infNFe->total->ICMSTot->vICMS;
$chNFe=$xml->protNFe->infProt->chNFe;
$infAdic = $xml->NFe->infNFe->infAdic->children()[0];

$testeChave = mysqli_query($conn, "SELECT * FROM entrada_icms WHERE chNFe = '$chNFe'");
if (mysqli_num_rows($testeChave) < 1) {
    $sql = "INSERT INTO entrada_icms VALUES ('$nf','$emit','$data','$vNF','$vICMS','$chNFe','$infAdic')";
    $result = mysqli_query($conn, $sql);

    # caso o arquivo xml for localizado, deletar o registro na tabela xml_n_localizado
    $testeChave = mysqli_query($conn, "SELECT * FROM xml_n_localizado WHERE xmlN = '$chNFe'");
    if (mysqli_num_rows($testeChave) > 0) {
        $sql = mysqli_query($conn, "DELETE FROM xml_n_localizado WHERE xmlN=$chNFe");
    }

    unset($_SESSION['chaveInput']);
}

?>
