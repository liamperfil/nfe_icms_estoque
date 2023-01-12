<?php
session_start();
include_once('conn.php');

$chaveInput = $_POST['chavexml'] . ".xml";
$_SESSION['chaveInput'] = $_POST['chavexml'];
$xml=simplexml_load_file('./xml/'.$chaveInput) or die(header('Location: error_xml.php'));

$chNFe=$xml->protNFe->infProt->chNFe;

$testeChave = mysqli_query($conn, "SELECT * FROM entrada_icms WHERE chNFe = '$chNFe'");
if (mysqli_num_rows($testeChave) < 1) {
    $nf=$xml->NFe->infNFe->ide->nNF;
    $emit=$xml->NFe->infNFe->emit->xNome;
    $data=$xml->protNFe->infProt->dhRecbto;
    $data=substr("$data",0, 10);
    $vNF=$xml->NFe->infNFe->total->ICMSTot->vNF;
    $vICMS=$xml->NFe->infNFe->total->ICMSTot->vICMS;
    $infAdic = $xml->NFe->infNFe->infAdic->children()[0];
        
    $sql = "INSERT INTO entrada_icms VALUES ('$nf','$emit','$data','$vNF','$vICMS','$chNFe','$infAdic')";
    $result = mysqli_query($conn, $sql);

    # caso o arquivo xml for localizado, deletar o registro na tabela xml_n_localizado
    $testeChave = mysqli_query($conn, "SELECT * FROM xml_n_localizado WHERE xmlN = '$chNFe'");
    if (mysqli_num_rows($testeChave) > 0) {
        $sql = mysqli_query($conn, "DELETE FROM xml_n_localizado WHERE xmlN=$chNFe");
    }

    unset($_SESSION['chaveInput']);
}

$testeChave = mysqli_query($conn, "SELECT * FROM estoque WHERE chNFe = '$chNFe'");
if (mysqli_num_rows($testeChave) < 1) {
    $i = 0;
    $qtdProd = $xml->NFe->infNFe->det->count();
    while ($i < $qtdProd) {
        $cProd = $xml->NFe->infNFe->det[$i]->prod->cProd;
        $xProd = $xml->NFe->infNFe->det[$i]->prod->xProd;
        $NCM = $xml->NFe->infNFe->det[$i]->prod->NCM;
        $orig = $xml->NFe->infNFe->det[$i]->imposto->ICMS->children()[0]->orig;
        $CFOP = $xml->NFe->infNFe->det[$i]->prod->CFOP;
        $uCom = $xml->NFe->infNFe->det[$i]->prod->uCom;
        $qCom = $xml->NFe->infNFe->det[$i]->prod->qCom;
        $vUnCom = $xml->NFe->infNFe->det[$i]->prod->vUnCom;
        $vProd = $xml->NFe->infNFe->det[$i]->prod->vProd;
        
        $vDesc = $xml->NFe->infNFe->det[$i]->prod->vDesc->count();
        if ($vDesc > 0) { 
            $vDesc = $xml->NFe->infNFe->det[$i]->prod->vDesc;
        }
        $pICMS = $xml->NFe->infNFe->det[$i]->imposto->ICMS->children()[0]->pICMS;
        
        $pIPI = $xml->NFe->infNFe->det[$i]->imposto->IPI->count();
        if ($pIPI > 0) {
            $pIPI = $xml->NFe->infNFe->det[$i]->imposto->IPI->children()[1]->pIPI;
        }
    
        $vFrete = $xml->NFe->infNFe->det[$i]->prod->vFrete->count();
        if ($vFrete > 0) {
            $vFrete = $xml->NFe->infNFe->det[$i]->prod->vFrete/$vProd*100;
        }
        
        $nNF = $xml->NFe->infNFe->ide->nNF;
        $emit_CNPJ = $xml->NFe->infNFe->emit->CNPJ;
        $emit_xNome = $xml->NFe->infNFe->emit->xNome;
        $dhEmi = $xml->protNFe->infProt->dhRecbto;
        $dhEmi = substr("$dhEmi",0, 10);
        $UF = $xml->NFe->infNFe->emit->enderEmit->UF;
        $cEAN = $xml->NFe->infNFe->det[$i]->prod->cEAN;
        $dest_CNPJ = $xml->NFe->infNFe->dest->CNPJ;
        $chNFe = $xml->protNFe->infProt->chNFe;
        $infAdic = $xml->NFe->infNFe->infAdic->children()[0];
        
        //$id = DAFAULT;
        //$familia = "";
        //$qtd_est = "";
        //$valor_total_est = "";
        //$dif = "";
        
        $sql = "INSERT INTO estoque VALUES ('$cProd', '$xProd', '$NCM', '$orig', '$CFOP', '$uCom', '$qCom', '$vUnCom', '$vDesc', '$pICMS', '$pIPI', '$vFrete', '$vProd', '$cEAN', '$nNF', '$emit_CNPJ', '$emit_xNome', '$dhEmi', '$UF', '$dest_CNPJ', '$chNFe', DEFAULT, '', '', '$qCom', '$vProd', '$infAdic')";
        $result = mysqli_query($conn, $sql);
        
        $i = $i + 1;
    }
} else {
    unset($chNFe);
    unset($qtdProd);
    header('Location: index.php');
}

?>
