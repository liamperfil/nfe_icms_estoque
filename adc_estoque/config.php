<?php
$conn = mysqli_connect('localhost', 'root', '', 'estoque') or die ("Erro na conexão com o banco de dados");
$xml = simplexml_load_file("$chave") or die("Error: Cannot create object");

$chNFe = $xml->protNFe->infProt->chNFe;
$sql = "SELECT * FROM estoque WHERE chNFe = '$chNFe'";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) < 1){
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
        $icms_total_item = $pICMS/100*$vProd;
        $emit_CNPJ = $xml->NFe->infNFe->emit->CNPJ;
        $emit_xNome = $xml->NFe->infNFe->emit->xNome;
        $dhEmi = $xml->NFe->infNFe->ide->dhEmi;
        $vNF = $xml->NFe->infNFe->total->children()[0]->vNF;
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
        
        $sql = "INSERT INTO estoque VALUES ('$cProd', '$xProd', '$NCM', '$orig', '$CFOP', '$uCom', '$qCom', '$vUnCom', '$vDesc', '$pICMS', '$pIPI', '$vFrete', '$vProd', '$icms_total_item', '$nNF', '$emit_CNPJ', '$emit_xNome', '$dhEmi', '$vNF', '$UF', '$cEAN', '$dest_CNPJ', '$chNFe', '$infAdic', DEFAULT, '', '', '', '')";
        $result = mysqli_query($conn, $sql);
        
        $i = $i + 1;
    }
} else {
    unset($chNFe);
    unset($qtdProd);
    header('Location: index.php');
}

