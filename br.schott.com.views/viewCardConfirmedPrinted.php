<?php
/* NÃO REMOVER LINHAS VAZIAS PARA DEIXAR PADRONIZADAS COM AS OUTRAS PÁGINAS DE IMPRESSÃO */

header('Content-type: text/html; charset=ISO-8859-1');
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');

require '../br.schott.com.config/configBarcode.php';


$op = $_GET['op'];
$Customer = $_POST['nmcustomer'];
$Material = $_POST['nmmaterial'];
$Machine = $_POST['nmmachine'];
$MaterialDesc = $_POST['nmmaterialdesc'];
$DeliveryDate = $_POST['nmdeliverydate'];
$boxPerLayer = $_POST['nmboxperlayer'];
$boxQuantity = $_POST['nmboxqty'];
$layerQuantity = $_POST['nmlayerqty'];
$pcsPerBox = $_POST['nmpcsperbox'];
$pcsQuantity = $_POST['nmpcsqty'];
$palletQuantity = $_POST['nmpalletquantity'];

extract($_POST);
$arrcodItem = explode(';', $nmcoditem);
$arrdescItem = explode(';', $nmdescitem);
$arrqtyItem = explode(';', $nmqtyitem);
$arrunityItem = explode(';', $nmunityitem);

$quantityMaterial = $_POST['nmqtdematerial'];

$pdf = new PDF_Code39('P','mm',array(210,297)); // P = Portrait, em milimetros, e A4 (210x297)
$pdf->SetMargins(7, 6, 10); 
$pdf->SetTitle('FPP - Print');
   


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
    $pdf->Cell(159.5,$height,$Customer,1,0,'L',0);

    $pdf->SetLineWidth(0.35);    
    $pdf->ln($height);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(32,$height,'Máquina',1,0,'L',0);
    $pdf->SetFont('Arial','', 12);
    $pdf->Cell(159.5,$height, $Machine,1,1,'L',0);
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
    $pdf->Cell(95.75,13,$pdf->Code39(125, 53 + $height * 2,trim($op),true,false,0.2545,$height*1.58,true),1,0,'L',0);

    $pdf->ln($space+13);
   
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(47.875,$height,'Cx / Camada',1,0,'L',0);
    $pdf->SetFont('Arial','B', 14);
    
    $pdf->Cell(47.875,$height,$boxPerLayer,1,0,'C',0);
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(47.875,$height,'Qtde Caixas',1,0,'C',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(47.875,$height,$boxQuantity,1,1,'C',0);
    
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(47.875,$height,'Qtde Camadas',1,0,'L',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(47.875,$height,$layerQuantity,1,0,'C',0);
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
    $pdf->Cell(63.8,13,trim(str_replace(',', '.', number_format($pcsQuantity))),1,0,'C',0);
    $pdf->Cell(63.8,13,$pdf->Code39(151, 84 + $height * 2,trim(str_replace(',', '.', number_format($pcsQuantity))),true,false,0.2545,$height*1.58,true),1,1,'C',0);
    
    $pdf->ln($space);
    
    $pdf->SetFont('Arial','', 14);
    $pdf->Cell(95.75,$height * 2,'Número do Palete',1,0,'C',0);
    $pdf->SetFont('Arial','B', 14);
    $pdf->Cell(95.75,$height * 2, $_GET['unity']." / ".$palletQuantity,1,1,'C',0);
    
    $pdf->SetFont('Arial','', 18);
    $pdf->Cell(95.75,13,$_GET['pallet_no'],1,0,'C',0);
    $pdf->Cell(95.75,13,$pdf->Code39(115, 106 + $height * 3,trim($_GET['pallet_no']),true,false,0.2545,$height*1.58,true),1,0,'L',0);
  
    $pdf->ln($space+13);
    
    $pdf->SetFont('Arial','B', 10);
    $pdf->Cell(191.5,$height,'Materiais de Embalagem',1,1,'C',0);
        
    $pdf->SetFont('Calibri','',12);

    for($i=0; $i<$quantityMaterial;$i++){
        if(isset($arrcodItem[$i])){
            $pdf->Cell(191.5,$height,$arrcodItem[$i].' - '.utf8_decode($arrdescItem[$i]),1,1,'L',0);
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
    

    
$pdf->Output();

?>

