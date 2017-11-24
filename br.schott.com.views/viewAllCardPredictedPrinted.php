<?php
/* NÃO REMOVER LINHAS VAZIAS PARA DEIXAR PADRONIZADAS COM AS OUTRAS PÁGINAS DE IMPRESSÃO */
//session_start();
header('Content-type: text/html; charset=ISO-8859-1; <link rel="shortcut icon" href="../Images/fpp.png"/>');
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

require '../br.schott.com.config/configBarcode.php';

extract($_POST);

$arrNumPalete = explode(';', $nmnumPalete);
$arrQtdeCx = explode(';', $nmqtdeCx);
$arrQtdeCmd = explode(';', $nmqtdeCmd);
$arrQtdePcs = explode(';', $nmqtdePecas);

$arrcodItem = explode(';', $nmcoditem);
$arrdescItem = explode(';', $nmdescitem);
$arrqtyItem = explode(';', $nmqtyitem);
$arrunityItem = explode(';', $nmunityitem);


$op = $_GET['op'];
$leftover = $nmrest;
$Customer = $nmcustomer;
$Material = $nmmaterial;
$Machine = $nmmachine;
$MaterialDesc = $nmmaterialdesc;
$DeliveryDate = $nmdeliverydate;
$PredictedQuantity = $nmquantity;

$boxPerLayer = $nmcxpercmd;
$pcsPerBox = $nmpcsperbox;

$quantityMaterial = $nmqtdematerial;

$pdf = new PDF_Code39('P','mm',array(210,297)); // P = Portrait, em milimetros, e A4 (210x297)
$pdf->SetMargins(7, 6, 10); 
$pdf->SetTitle('FPP - Print');


for($j=1;$j< $PredictedQuantity+1;$j++){

    $pdf->AddPage();
    
    $pdf->Image('../images/logo.png',8,7,35);
    
    $pdf->SetFont('Arial','',7.7);
    
    $pdf->AddFont('Calibri','','Calibri.php');
    $height = 6;
    $space = 3;
       
    $pdf->SetFont('Calibri','',11);
    $pdf->Cell(191.5,$height*2,'Emitido em: '. date("d/m/Y").' - '.date("H:i"),0,1,'R',0);
    $pdf->SetLineWidth(0.35);
    
    $pdf->SetFont('Arial','B', 16);
    $pdf->Cell(191.5,$height,'Ficha de Produto em Processo',1,1,'C',0);
    $pdf->SetFont('Arial','B', 10);
    
    $pdf->Cell(32,$height,'Cliente',1,0,'L',0);
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(159.5,$height,$Customer,1,1,'L',0);
    
    $pdf->SetLineWidth(0.35);

    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(32,$height,'Máquina',1,0,'L',0);
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(159.5,$height,$Machine,1,1,'L',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(32,$height,'Produto',1,0,'L',0);
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(159.5,$height,$Material,1,1,'L',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(32,$height,'Produto Desc',1,0,'L',0);
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(159.5,$height,$MaterialDesc,1,1,'L',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(32,$height,'Data de Entrega',1,0,'L',0);
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(159.5,$height,$DeliveryDate,1,1,'L',0);
    $pdf->SetFont('Arial','', 14);
    
    $pdf->ln($space);
    
    $pdf->Cell(191.5,$height,'Ordem de Produção',1,1,'C',0);
    $pdf->SetFont('Arial','', 18);
    $pdf->Cell(95.75,13,$op,1,0,'C',0);
    $pdf->Cell(95.75,13,$pdf->Code39(125, 53 + $height * 2 ,trim($op),true,false,0.2545,$height*1.58,true),1,0,'L',0);

    $pdf->ln($space+13);
   
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(47.875,$height,'Cx / Camada',1,0,'L',0);
    $pdf->SetFont('Arial','B', 14);
    
    $pdf->Cell(47.875,$height,$boxPerLayer,1,0,'C',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(47.875,$height,'Qtde Caixas',1,0,'C',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(47.875,$height,$arrQtdeCx[$j-1],1,1,'C',0);

    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(47.875,$height,'Qtde Camadas',1,0,'L',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(47.875,$height,$arrQtdeCmd[$j-1],1,0,'C',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(47.875,$height,'Pçs Caixa',1,0,'C',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(47.875,$height,$pcsPerBox,1,0,'C',0);
    
    $pdf->ln($space);
    
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(31.9,$height,'',0,0,'C',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(31.9,$height,'',0,1,'C',0);
    $pdf->Cell(63.9,13,'Qtde Peças',1,0,'C',0);
    $pdf->Cell(63.8,13,$arrQtdePcs[$j-1],1,0,'C',0);
    $pdf->Cell(63.8,13,$pdf->Code39(151, 84 + $height * 2,trim($arrQtdePcs[$j-1]),true,false,0.2545,$height*1.58,true),1,1,'C',0);
       
    $pdf->ln($space);
    
    $pdf->SetFont('Arial','', 14);
    $pdf->Cell(95.75,$height * 2,'Número do Palete',1,0,'C',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(95.75,$height * 2, $j ." / ".$PredictedQuantity,1,1,'C',0);
    
    $pdf->SetFont('Arial','', 18);
    $pdf->Cell(95.75,13,$arrNumPalete[$j-1],1,0,'C',0);
    $pdf->Cell(95.75,13,$pdf->Code39(115, 106 + $height * 3 ,trim($arrNumPalete[$j-1]),true,false,0.2545,$height*1.58,true),1,0,'L',0);
  
    $pdf->ln($space+13);
    
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(191.5,$height,'Materiais de Embalagem',1,1,'C',0);
 
    $pdf->SetFont('Calibri','',12);

     for($i=0; $i< $quantityMaterial ;$i++){
        if(isset($arrcodItem[$i])){
            $pdf->Cell(191.5,$height,$arrcodItem[$i].' - '.utf8_decode($arrdescItem[$i]),1,1,'L',0);
        }else{$pdf->Cell(191.5,$height,'',1,1,'L',0); }
        
    } 
   
   // Se houver uma caixa com menos peças do que uma caixa cheia será mostrada na última ficha que será impressa 

    $restInformation = "";
    
    if($j == $PredictedQuantity){$restInformation = "Sobra 1 caixa com " . $leftover . " peças";}
    /* Foi pedido para não informar a quantidade de sobras, para informar a quantidade de sobras na última folha de palete basta comentar a 
     * linha abaixo que está atribuindo vazio na variavel que guarda o valor do resto da quantidade*/
    $restInformation = "";
    
    $pdf->ln($space);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(191.5,$height,'Observações',1,1,'C',0);
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(191.5,$height,$restInformation,1,1,'L',0);
    $pdf->Cell(191.5,$height,'',1,1,'L',0);
    if($quantityMaterial<6){
    $pdf->Cell(191.5,$height,'',1,1,'L',0);
    $pdf->Cell(191.5,$height,'',1,1,'L',0);
    //$pdf->Cell(191.5,$height,'',1,1,'L',0);
    }  
    
    $pdf->ln($space);
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    $pdf->Cell(191.5,8,'ETIQUETA DE IDENTIFICAÇÃO',0,0,'C',0);
    $pdf->SetXY($x, $y);

    $pdf->Cell(191.5,48,'',1,1,'C',0);
    
    $pdf->ln($space);
    
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(59,$height,'Liberado CGQ(Nome / Crachá)',1,0,'C',0);
    $pdf->SetFont('Calibri','',12);
    $pdf->Cell(59,$height,'                      /',1,0,'C',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(44.5,$height,'Assinatura:',1,0,'C',0);
    $pdf->SetFont('Arial','', 11);
    $pdf->Cell(29,$height,'',1,1,'C',0);
   
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(59,$height,'Conferido EXP(Nome / Crachá)',1,0,'C',0);
    $pdf->SetFont('Calibri','',12);
    $pdf->Cell(59,$height,'                      /',1,0,'C',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(44.5,$height,'Assinatura:',1,0,'C',0);
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(29,$height,'',1,1,'C',0);
    
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(59,$height,'Embalado EXP(Nome / Crachá)',1,0,'C',0);
    $pdf->SetFont('Calibri','',12);
    $pdf->Cell(59,$height,'                      /',1,0,'C',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(44.5,$height,'Assinatura:',1,0,'C',0);
    $pdf->SetFont('Arial','', 11);
    $pdf->Cell(29,$height,'',1,1,'C',0);
    
}

$pdf->Output();

?>

