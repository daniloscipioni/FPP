<?php
/* NÃO REMOVER LINHAS VAZIAS PARA DEIXAR PADRONIZADAS COM AS OUTRAS PÁGINAS DE IMPRESSÃO */

header('Content-type: text/html; charset=ISO-8859-1');
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

use Connection\Connection;
use Util\Util;
//
require '../br.schott.com.config/configBarcode.php';
require '../br.schott.com.connection/connection.php';
require '../br.schott.com.util/Util.php';

$util = new  Util();
$util->setOp($_GET['op']);



$conn = new Connection();
$conn->searchOP($util->getOp());
$conn->searchMaterials($util->getOp());
$conn->searchPallets($util->getOp());


$pdf = new PDF_Code39('P','mm',array(210,297)); // P = Portrait, em milimetros, e A4 (210x297)
$pdf->SetMargins(7, 6, 10); 
$pdf->SetTitle('FPP - Print');

for($j=0;$j<$conn->getQuantityPallet();$j++){
    
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
    $pdf->Cell(159.5,$height,(int)$conn->getCodeCustomer().' - '.strtoupper($conn->getCustomer()),1,1,'L',0);

    $pdf->SetLineWidth(0.35);

    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(32,$height,'Máquina',1,0,'L',0);
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(159.5,$height,$conn->getMachine(),1,1,'L',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(32,$height,'Produto',1,0,'L',0);
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(159.5,$height,$conn->getMaterialNumber().' - '.$conn->getMaterialDescription(),1,1,'L',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(32,$height,'Produto Desc',1,0,'L',0);
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(159.5,$height,$conn->getMaterialDesc(),1,1,'L',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(32,$height,'Data de Entrega',1,0,'L',0);
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(159.5,$height,$conn->getDeliveryDate(),1,1,'L',0);
    $pdf->SetFont('Arial','', 14);
    
    $pdf->ln($space);
    
    $pdf->Cell(191.5,$height,'Ordem de Produção',1,1,'C',0);
    $pdf->SetFont('Arial','', 18);
    $pdf->Cell(95.75,13,$conn->getOrderNo(),1,0,'C',0);
    $pdf->Cell(95.75,13,$pdf->Code39(125, 53 + $height * 2,trim($conn->getOrderNo()),true,false,0.2545,$height*1.58,true),1,0,'L',0);

    $pdf->ln($space+13);
   
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(47.875,$height,'Cx / Camada',1,0,'L',0);
    $pdf->SetFont('Arial','B', 14);
    
    $pdf->Cell(47.875,$height,(int)$conn->getConfirmedBoxPerLayer()[$j],1,0,'C',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(47.875,$height,'Qtde Caixas',1,0,'C',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(47.875,$height,(int)$conn->getConfirmedBoxQuantity()[$j],1,1,'C',0);
       
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(47.875,$height,'Qtde Camadas',1,0,'L',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(47.875,$height,$conn->getConfirmedLayerQuantity()[$j],1,0,'C',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(47.875,$height,'Pçs Caixa',1,0,'C',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(47.875,$height,$conn->getPiecesPerBox(),1,0,'C',0);
    
    $pdf->ln($space);
    
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(31.9,$height,'',0,0,'C',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(31.9,$height,'',0,1,'C',0);
    $pdf->Cell(63.9,13,'Qtde Peças',1,0,'C',0);
    $pdf->Cell(63.8,13,str_replace(',', '.', number_format($conn->getConfirmedApprovedQuantity()[$j])),1,0,'C',0);
    $pdf->Cell(63.8,13,$pdf->Code39(151, 84 + $height * 2,trim(str_replace(',', '.', number_format($conn->getConfirmedApprovedQuantity()[$j]))),true,false,0.2545,$height*1.58,true),1,1,'C',0);
    
    $pdf->ln($space);
    
    $pdf->SetFont('Arial','', 14);
    $pdf->Cell(95.75,$height * 2,'Número do Palete',1,0,'C',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(95.75,$height * 2, $j+1 ." / ".$conn->getQuantityPallet(),1,1,'C',0);
    
    $pdf->SetFont('Arial','', 18);
    $pdf->Cell(95.75,13,$conn->getConfirmedNoPallet()[$j],1,0,'C',0);
    $pdf->Cell(95.75,13,$pdf->Code39(115, 106 + $height * 3,trim($conn->getConfirmedNoPallet()[$j]),true,false,0.2545,$height*1.58,true),1,1,'L',0);
  
    $pdf->ln($space);
    
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(191.5,$height,'Materiais de Embalagem',1,1,'C',0);
    
    $pdf->SetFont('Calibri','',12);

    for($i=0; $i<$conn->getQuantityMaterial();$i++){
        if(isset($conn->getCodeItem()[$i])){
            $pdf->Cell(191.5,$height,$conn->getCodeItem()[$i].' - '.utf8_decode($conn->getItemDescription()[$i]),1,1,'L',0);
        }else{$pdf->Cell(191.5,$height,'',1,1,'L',0); }
        
    }
   
 
    
    
    
    
    
    

    $pdf->ln($space);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(191.5,$height,'Observações',1,1,'C',0);
    $pdf->SetFont('Arial','', 10);
    $pdf->Cell(191.5,$height,'',1,1,'L',0);
    $pdf->Cell(191.5,$height,'',1,1,'L',0);
    $pdf->Cell(191.5,$height,'',1,1,'L',0);
    $pdf->Cell(191.5,$height,'',1,1,'L',0);
    //$pdf->Cell(191.5,$height,'',1,1,'L',0);
    
    
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

