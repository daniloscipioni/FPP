<?php
set_time_limit(0);
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
//resolve problema de $_SESSION
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
use Connection\Connection;
use Util\Util;
use Connection\connection_materials;
//use Util\Util;
require '../br.schott.com.connection/access.php';
$connPallet = new Access_ReleasedPallets();
$conn = new connection();
require '../br.schott.com.util/Util.php';

 $util = new Util();
 $util->setOp($_POST['op']);


// $conn->searchMaterials($util->getOp());

 
 //$conn->searchPallets($util->getOp());
  //$conn->searchOP($util->getOp());
 $conn->searchMaterials($_POST['op']);
// $conn->searchOP($_POST['op']);
 
/*ini  */
 // Relatório no PIDO - DSCI_PPDS_FPA
 $urlOp = 'http://10.20.26.28/CronetJVX//pido/getData?p_pido=50000000380&ORDER_NO=' .$_POST['op'] . '&p_crosscompany=0&p_format=JSON&p_querytimeout=30&p_userid=PIDO/PIDO@cronet_cpbritu1';
 
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL,  $urlOp);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 $output = curl_exec($ch);
 curl_close($ch);
 
 //echo "OUTPUT = " . var_dump($output)."<br>";
 $jsonStr = json_decode($output, true);
 $records = $jsonStr['collection'];
 
 $orderNo = $records[0]['ORDER_NO'];
 $codeCustomer = (int)$records[0]['COD_CLIENTE'];
 $customer = $records[0]['CLIENTE'];
 $materialNumber = $records[0]['MATERIAL_NUM'];
 $materialDescription = $records[0]['DESCRICAO'];
 $materialDesc = $records[0]['MATERIAL_DESC'];
  
 /* Condicional verificar se a máquina foi programada para uma máquina diferente da máquina padrão, caso não foi programada, a variavel armazena a máquina padrão do produto */
 if($records[0]['MAQUINA']!=null){
     $machine = $records[0]['MAQUINA'];
 }else{$machine = $records[0]['DEF_MAQUINA'];}
 
 $descStatus = $records[0]['DESC_STATUS'];
 $opQuantity = (int)$records[0]['QTDE_OP'];
 $startDate =$records[0]['EARLIEST_DATA_INICIO'];
 $producedPieces = $records[0]['PCS_PROD'];
 $deliveryDate = $records[0]['DATA_ENTREGA'];
 $quantityToProduce = $records[0]['QTDE_A_PROD'];
 $boxPerLayer = (int) $records[0]['CXS_CAMADA'];
 $boxPerPallet = (int) $records[0]['CXS_PALETE'];
 $piecesPerPallet = $records[0]['PCS_PALETE'];
 $quantityOfLayers = (int) $records[0]['QTDE_CAMADAS'];
 $piecesPerBox = (int)$records[0]['PCS_CAIXA'];
 $boxPredictedQuantity = $records[0]['QTDE_CAIXAS_PREV'];
 $layerPredictedQuantity = (int)$records[0]['QTDE_CAMADAS_PREV'];
 $palletPredictedQuantity = (int)$records[0]['QTDE_PALLET_PREV'];
 
/* fim  */ 
 
$verificationConfirmedPallet =  $connPallet->SearchPalletsConfirm($_POST['op']);

?>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SCHOTT - FPP</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="Redmine">
<meta name="keywords" content="issue,bug,tracker">
<meta name="csrf-param" content="authenticity_token">
<meta name="csrf-token" content="BWtd3OPvQzwhjTPErwLxHzeDH8SyM9PvSmXTNhVdaKAYygJ3VdE7EnOraA45QqU5qsDZHAWcSnu1W2QKz1+CQw==">
<link rel="shortcut icon" href="../Images/fpp.png">
<link rel="stylesheet" media="all" href="../css/stylesheets/jquery/jquery-ui-1.11.0.css?1500229109">
<link rel="stylesheet" media="all" href="../css/themes/schott/stylesheets/application.css?1412685099">
<link rel="stylesheet" media="all" href="../css/stylesheets/responsive.css?1500229109">
<script src="../js/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js?1500229109"></script>
<script src="../js/javascripts/application.js?1500229109"></script>
<script src="../js/javascripts/responsive.js?1500229109"></script>
<script src="../js/javascripts/theme.js?1351450256"></script>
<script src="../js/plugin_assets/redmine_checklists/javascripts/checklists.js?1500665867"></script>
</head>
<body>
<?php if(($_SESSION['nm_setor'] == 'Production planning') || ($_SESSION['nm_setor'] == 'Production overhead')){ ?>
    <?php if($verificationConfirmedPallet){?>
    <div class='flash notice' align='center' id='confirmGeneratedPalletInfo'>Os paletes desta ordem já foram confirmados</div>
    <?php }?>
<?php }?>
&nbsp;
	<div align="left">
		<button class="btnstyle" onclick="location.reload();">« Voltar</button>
	</div>


<br>
	<div>

    <?php if($conn->getErrorMessage()!=1){?>
    
        <table border="1" width="70%" align="center" class="list issue-report">
			<tr>
				<td colspan="2" align="left"><b>Cliente </b></td>
				<td colspan="8" align="left"><?php echo $codeCustomer." - ".$customer?></td>
			</tr>
			<tr>
				<td colspan="2" align="left"><b>Material </b></td>
				<td colspan="8" align="left"><?php echo $materialNumber." - ".$materialDesc ?></td>
			</tr>
			
		</table>
		&nbsp;
		<table border="1" width="70%" align="center" class="list issue-report">
			
			<tr>
				<td colspan="5" align="center"><b>Detalhes da OP </b></td>
			</tr>
			<tr>

				<td width="20%"><b>Máquina / Status </b></td>
				<td width="20%" align="left"><?php echo $machine ." - ". utf8_decode($descStatus)?></td>
				<td width="20%" colspan="2"><b>Quantidade da OP </b></td>
				<td width="20%" align="left"><?php echo str_replace(',', '.', number_format($opQuantity)) ?></td>
			</tr>
			<tr>
				<td width="20%"><b>Data de Início </b></td>
				<td width="10%" align="left"><?php echo  date('d/m/Y', strtotime($startDate)) ?></td>
				<td width="20%" colspan="2"><b>Quantidade Produzida</b></td>
				<td width="20%" align="left"><?php echo str_replace(',', '.', number_format($producedPieces)) ?></td>

			</tr>
			<tr>
				<td width="20%"><b>Data de Entrega </b></td>
				<td width="10%" align="left"><?php echo  date('d/m/Y', strtotime($deliveryDate)) ?></td>
				<td width="20%" colspan="2"><b>Quantidade a Produzir</b></td>
				<td width="20%" align="left"><?php echo str_replace(',', '.', number_format($quantityToProduce)) ?></td>
			</tr>
			
		</table>
		&nbsp;
		<table border="1" width="70%" align="center" class="list issue-report">
			
			<tr>
				<td colspan="6" align="center"><b>Especificação de Embalagem </b></td>
			</tr>
			<tr>
				<td align="center"><b>Cx / Camada:</b></td>
				<td align="center"><?php echo $boxPerLayer ?></td>
				<td align="center"><b>Cxs / Palete:</b></td>
				<td align="center"><?php echo $boxPerPallet ?></td>
				<td rowspan="2" align="center"><b>Peças / Palete:</b></td>
				<td rowspan="2" align="center"><?php echo str_replace(',', '.', number_format($piecesPerPallet)) ?></td>
			</tr>
			<tr>
				<td align="center"><b>Qtde Camadas:</b></td>
				<td align="center"><?php echo $quantityOfLayers ?></td>
				<td align="center"><b>Peças / Caixa:</b></td>
				<td align="center"><?php echo $piecesPerBox ?></td>
			</tr>
		
		</table>
		&nbsp;
		<table border="1" width="70%" align="center" class="list issue-report">
		
			<tr>
				<td width="5%" align="center" colspan="4"><b>Materiais da Embalagem
				</b></td>
			</tr>
			<tr>
				<td width="15%" align="center"><b>Código do Item</b></td>
				<td width="45%" align="center"><b>Descrição do Item</b></td>
				<td width="25%" align="center"><b>Quantidade do Item</b></td>
				<td width="10%" align="center"><b>Unidade</b></td>
			</tr>
          
        <?php
        
        for ($i = 0; $i <=  $conn->getQuantityMaterial()  - 1; $i ++) {
            if ($conn->getItemUnity()[$i] == 'KG') {
                $quantity = str_replace('.', ',', str_replace(',', '', $conn->getItemQuantity()[$i]));
            } else {
                $quantity = str_replace(',', '.', number_format(str_replace('.00', '', str_replace(',', '', $conn->getItemQuantity()[$i]))));
            }
           ?>
            <tr>
				<td align="center">
					<?php echo $conn->getCodeItem()[$i];
					$codItem .= $conn->getCodeItem()[$i].";"; ?>
				</td>
				<td align="center">
					<?php echo utf8_decode($conn->getItemDescription()[$i]);
					$descItem .= utf8_decode($conn->getItemDescription()[$i]).";";?>
				</td>
				<td align="center">
					<?php echo $quantity;
					$qtyItem .= $quantity.";";?>
				</td>
				<td align="center">
					<?php echo $conn->getItemUnity()[$i];
					$unityItem .= $conn->getItemUnity()[$i].";";?>
				</td>
			</tr>  
			
        <?php }?>    
            
        </table>
		&nbsp;
		<table border="1" width="70%" align="center" class="list issue-report">
			<tr>
				<td colspan="3" align="center"><b>Quantidades Previstas</b></td>
			</tr>
			<tr>
				<td align="center"><b>Qtde total de caixas</b></td>
				<td align="center"><b>Qtde de Paletes</b></td>
				<td align="center"><b>Quantidade de camadas por Palete</b></td>
			</tr>
			<tr>
				<td align="center"><?php echo $boxPredictedQuantity ?></td>
				<td align="center"><?php echo $palletPredictedQuantity?></td>
				<td align="center"><?php echo $layerPredictedQuantity?></td>
			</tr>


		</table>
		&nbsp;

		<!--inicio -->
	<?php if(($_SESSION['nm_setor'] == 'Production planning') || ($_SESSION['nm_setor'] == 'Production overhead')){ ?>
	
		<table border="1" width="70%" align="center" valign="top" class="list issue-report">
			<tr>
				<td colspan="4" align="center"><b>Paletes Previstos</b></td>
			</tr>
			<tr>
				<td align="center"><b>Nº Palete</b></td>
				<td align="center"><b>Qtde CX </b></td>
				<td align="center"><b>Qtde Camadas</b></td>
				<td align="center"><b>Qtde Peças</b></td>
			</tr>      
                    
                 <?php
        
        $leftover = $boxPredictedQuantity;
        $total_op = $opQuantity;
        $rest = false;
        
       
        
        for ($i = 1; $i <= $palletPredictedQuantity; $i ++) {
            $opQuantity = $total_op;
            //$conn->setOpQuantity($total_op);
            
            $piecesLeftover = $total_op;
           
            ?>     
                   
                   
                    <tr>
				<!--Nº do Palete -->
				<td align="center">
                        	<?php
            
echo $orderNo . str_pad($i, 6, "0", STR_PAD_LEFT);
            
            $predicatedInformation[$i]['num_palete'] = $orderNo . str_pad($i, 6, "0", STR_PAD_LEFT);
            $numPalete .=  $orderNo . str_pad($i, 6, "0", STR_PAD_LEFT).";";
            
            ?>
                        </td>
				<!-- -- -->

				<!--Qtde CX-->
				<td align="center">
                            <?php
            
            // Compara se a sobra da quantidade de caixas é maior que a quantidade total de caixas por palete, caso seja verdadeiro. faz a redução da quantidade total de caixas pela quantidade de caixas por palete.
            if ($leftover > $boxPerPallet) {
                
                $predicatedBoxQuantity = $util->calcPredicatedBox($layerPredictedQuantity, $boxPerLayer, $piecesPerBox) / $piecesPerBox;
                echo $predicatedBoxQuantity;
                // Exibe a quantidade de caixas previstas
                $predicatedBoxQuantityLeftover = $predicatedBoxQuantity - floor($predicatedBoxQuantity);
                
                $qtdeCaixa .= $predicatedBoxQuantity.";";
                $predicatedInformation[$i]['qtde_caixa'] = $predicatedBoxQuantity;
                
            } else {
                $predicatedBoxQuantity = $opQuantity / $piecesPerBox;
                echo floor($predicatedBoxQuantity);
                
                $qtdeCaixa .= floor($predicatedBoxQuantity).";";
                $predicatedInformation[$i]['qtde_caixa'] = floor($predicatedBoxQuantity);
                
                $predicatedBoxQuantityLeftover = $predicatedBoxQuantity - floor($predicatedBoxQuantity);
                if ($predicatedBoxQuantityLeftover > 0) {
                    $rest = true;
                }
            }
            // Recebe o valor da sobra de caixas deduzindo do total de caixas
            $leftover = $util->leftover($leftover, $boxPerPallet);
            ?>
                        </td>
				<!-- -- -->

				<!--Qtde Camadas-->
				<td align="center">
                            <?php
                            echo $util->calcPredicatedLayers($predicatedBoxQuantity, $boxPerLayer);
                            $predicatedInformation[$i]['qtde_camadas'] = $util->calcPredicatedLayers($predicatedBoxQuantity, $boxPerLayer);
                            $qtdeCamadas .= $util->calcPredicatedLayers($predicatedBoxQuantity, $boxPerLayer).";";
                            ?>                
                 </td>
				<!-- -- -->

				<!--Qtde Peças-->
				<td align="center">
                            <?php
            
                            $predicatedBoxQuantityPieces = $util->calcPredicatedBox($layerPredictedQuantity, $boxPerLayer, $piecesPerBox);
            
            if ($predicatedBoxQuantityPieces < $piecesLeftover) {
                $total_op = $piecesLeftover - $predicatedBoxQuantityPieces;
                // Retorna o total de peças previstas por caixa
                echo str_replace(',', '.', number_format($predicatedBoxQuantityPieces));
                $predicatedInformation[$i]['qtde_pecas'] = str_replace(',', '.', number_format($predicatedBoxQuantityPieces));
                $qtdePecas .= str_replace(',', '.', number_format($predicatedBoxQuantityPieces)).";";
            } else {
                // Retorna os resto das peças
                echo str_replace(',', '.', number_format($piecesLeftover));
                $predicatedInformation[$i]['qtde_pecas'] = str_replace(',', '.', number_format($piecesLeftover));
                $qtdePecas .= str_replace(',', '.', number_format($piecesLeftover)).";";
            }
            ?>
        				</td>
				<!-- -- -->
			</tr>  
                 <?php }?>
                    <?php if($rest == true) {?>
                    <tr>
				<!--<td align="center" colspan="4">
				  Sobra de 1 Caixa com: <?php //echo round($predicatedBoxQuantityLeftover*$conn->getPiecesPerBox());?> Peças
				</td>-->
			</tr> 
                    <?php
            $_SESSION['rest'] = round($predicatedBoxQuantityLeftover * $piecesPerBox);
            $rest = round($predicatedBoxQuantityLeftover * $piecesPerBox);
        } else {
            unset($_SESSION['rest']);
        }
        
        $_SESSION['predictedInfo'] = $predicatedInformation;
        
        ?>
                    <tr height="15">

					
				
			
					<td align="center"  colspan="4">
			 <form action="../br.schott.com.views/viewAllCardPredictedPrinted.php?op=<?php echo $orderNo?>" method="POST" target="_blank" id="predictedPallets"> 
					
					<input type="hidden" id="idmachine" 	 name="nmmachine" value="<?php echo $machine;?>">
					<input type="hidden" id="idop" 	 	     name="nmop" value="<?php echo $orderNo;?>">
					<input type="hidden" id="idnumPalete"    name="nmnumPalete" value="<?php echo $numPalete;?>">
					<input type="hidden" id="idcodmaterial"  name="nmcodmaterial" value="<?php echo $materialNumber?>">
					<input type="hidden" id="iddescdmaterial"name="nmdescmaterial" value="<?php echo $materialDescription;?>">
					<input type="hidden" id="idqtdePecas"    name="nmqtdePecas" value="<?php echo $qtdePecas;?>">
					<input type="hidden" id="idmaterial" 	 name="nmmaterial" value="<?php echo $materialNumber." - ".$materialDescription;?>">
					<input type="hidden" id="idqtdeCx"       name="nmqtdeCx" value="<?php echo $qtdeCaixa;?>">
					<input type="hidden" id="idqtdeCmd"      name="nmqtdeCmd" value="<?php echo $qtdeCamadas;?>">
					<input type="hidden" id="idrest" 		 name="nmrest" value="<?php echo $rest;?>">	
					<input type="hidden" id="idcustomer"     name="nmcustomer" value="<?php echo (int)$codeCustomer." - ".$customer;?>">
					<input type="hidden" id="idmaterialdesc" name="nmmaterialdesc" value="<?php echo $materialDesc?>">	
					<input type="hidden" id="iddeliverydate" name="nmdeliverydate" value="<?php echo date('d/m/Y', strtotime($deliveryDate));?>">
					<input type="hidden" id="idquantity" 	 name="nmquantity" value="<?php echo $palletPredictedQuantity;?>">	
					<input type="hidden" id="idcxpercmd" 	 name="nmcxpercmd" value="<?php echo $boxPerLayer;?>">	
					<input type="hidden" id="idpcsperbox" 	 name="nmpcsperbox" value="<?php echo $piecesPerBox;?>">	
					<input type="hidden" id="idqtdematerial" name="nmqtdematerial" value="<?php echo $conn->getQuantityMaterial();?>">
					<input type="hidden" id="nmcoditem" 	 name="nmcoditem" value="<?php echo $codItem;?>">	
					<input type="hidden" id="nmdescitem" 	 name="nmdescitem" value="<?php echo $descItem;?>">	
					<input type="hidden" id="nmqtyitem" 	 name="nmqtyitem" value="<?php echo $qtyItem;?>">	
					<input type="hidden" id="nmunityitem" 	 name="nmunityitem" value="<?php echo $unityItem;?>">
					
			   <a class="btnstyle" onClick="document.getElementById('predictedPallets').submit();" target="_blank">imprimir</a>
				<!-- Botão não visivel para que o botão caiba na linha da tabela -->
			   <button style="visibility: hidden">1</button>
			
			</form>			
	</td>		
			</tr>
		
		</table>
		   <?php if(($_SESSION['nm_setor'] == 'Production planning') || ($_SESSION['nm_setor'] == 'Production overhead')){ ?>
			    <?php if(!$verificationConfirmedPallet){?>
<div align="right" id="confirmGeneratedPallet">
		<button onclick="SaveDataGeneratedPallet('<?php echo $orderNo ?>','<?php echo $machine ?>','<?php echo $materialNumber ?>','<?php echo $materialDescription ?>','<?php echo $qtdePecas;?>','<?php echo $numPalete;?>','<?php echo $qtdeCaixa;?>','<?php echo $qtdeCamadas?>');" class="confirm"> Confirmar</button>
</div>		
                <?php }?>
		   <?php }?>
<?php }?>
<!--fim -->


		&nbsp;

<?php if(  trim($_SESSION['nm_setor']) == 'Quality management' || trim($_SESSION['nm_setor']) == 'Production overhead'){

    $conn->searchPallets($_POST['op']);
    ?>
				
		<table border="1" width="70%" align="center" class="list issue-report">

			<tr>
				<td colspan="6" align="center"><b>Paletes Bipados</b></td>
			</tr>

			<tr>
				<td align="center"><b>Nº Palete</b></td>
				<td align="center"><b>Qtde CX</b></td>
				<td align="center"><b>Qtde Camadas</b></td>
				<td align="center"><b>Qtde Peças</b></td>
				<td align="center"><b>#</b></td>
				<td align="center"><b>#</b></td>
			</tr>      
                        
            <?php
        /* echo  "Quantidade de paletes = ".$conn->getQuantityPallet(); */
        for ($i = 0; $i <= $conn->getQuantityPallet() - 1; $i ++) { 

            ?>                
             
            
			
              <tr>
				<td align="center"><?php echo $conn->getConfirmedNoPallet()[$i] ?></td>
				<td align="center"><?php echo $conn->getConfirmedBoxQuantity()[$i]  ?></td>
				<td align="center"><?php echo $conn->getConfirmedLayerQuantity()[$i] ?></td>
				<td align="center"><?php echo str_replace(',','.',number_format($conn->getConfirmedApprovedQuantity()[$i])) ?></td>
				<td align="center">
			 
			   
			    <form method="get" action="../br.schott.com.views/viewCardConfirmedPrinted.php?op=<?php echo $orderNo ?>&pallet_no=<?php echo $conn->getConfirmedNoPallet()[$i]?>&unity=<?php echo $conn->getLineNumber()[$i]?>" id="markedPallets" target="_blank">
                    <input type="hidden" id="idcustomer"     name="nmcustomer" value="<?php echo (int)$codeCustomer." - ".$customer?>">
					<input type="hidden" id="idCodeCustomer" name="nmcodecustomer" value="<?php echo (int)$codeCustomer ?>">
					<input type="hidden" id="idop" 	 name="nmop" value="<?php echo $orderNo?>">
					<input type="hidden" id="idmaterial" 	 name="nmmaterial" value="<?php echo $materialNumber." - ".$materialDescription;?>">
					<input type="hidden" id="idmachine" 	 name="nmmachine" value="<?php echo $machine;?>">	
					<input type="hidden" id="idmaterialdesc" name="nmmaterialdesc" value="<?php echo $materialDesc;?>">	
					<input type="hidden" id="iddeliverydate" name="nmdeliverydate" value="<?php echo date('d/m/Y', strtotime($deliveryDate))?>">
					<input type="hidden" id="idboxqty" name="nmboxqty" value="<?php echo $conn->getConfirmedBoxQuantity()[$i];?>">
					<input type="hidden" id="idlayerqty" name="nmlayerqty" value="<?php echo $conn->getConfirmedLayerQuantity()[$i];?>">	
					<input type="hidden" id="idpcsqty" name="nmpcsqty" value="<?php echo $conn->getConfirmedApprovedQuantity()[$i];?>">
					<input type="hidden" id="idpcsperbox" name="nmpcsperbox" value="<?php echo $piecesPerBox;?>">
					<input type="hidden" id="idboxperlayer" name="nmboxperlayer" value="<?php echo $boxPerLayer;?>">
					<input type="hidden" id="idpalletquantity" name="nmpalletquantity" value="<?php echo $palletPredictedQuantity?>">
					<input type="hidden" id="idqtdematerial" name="nmqtdematerial" value="<?php echo $conn->getQuantityMaterial();?>">
					<input type="hidden" id="idcoditem" 	 name="nmcoditem" value="<?php echo $codItem;?>">	
					<input type="hidden" id="iddescitem" 	 name="nmdescitem" value="<?php echo $descItem;?>">	
					<input type="hidden" id="idqtyitem" 	 name="nmqtyitem" value="<?php echo $qtyItem;?>">	
					<input type="hidden" id="idunityitem" 	 name="nmunityitem" value="<?php echo $unityItem;?>">
					<input type="hidden" id="idlineitem" 	 name="nmlineitem" value="<?php echo $conn->getLineNumber()[$i];?>">
					<input type="hidden" id="idpalletno" 	 name="nmpalletno" value="<?php echo $conn->getConfirmedNoPallet()[$i];?>">
			   <input class="btnstyle" type="submit" value="Imprimir">
			   </form>
			   
				</td> 
				
				<td align="center">
			  
			   <!-- Aplica a persistência caso o palete já esteja liberado 
			        Dois botões invisiveis para acertar o tamanho da linha da tabela-->
			   <?php if($connPallet->SearchPalletsDB($conn->getConfirmedNoPallet()[$i]))
			         {
			             echo "<button style='visibility: hidden;'>1</button><font color='green'><b>Liberado</b></font><button style='visibility: hidden;'>1</button>";
			         }else
			                {?>
				<div id="liberar<?php echo $i?>">
				   <!-- Condicionais referentes a comparação de quantidade do que foi previsto com o que foi bipado -->
				    <?php if(($conn->getConfirmedBoxQuantity()[$i] == $conn->getQtyboxpalete()[$i+1]) 
    				          || ($conn->getConfirmedLayerQuantity()[$i] == $conn->getQtytraybox()[$i+1]) 
				        || ($i == $palletPredictedQuantity)
				        )
    				          {
    				              if (
    				                     (substr($conn->getConfirmedNoPallet()[$i],-3,3)=='100')
    				                  || (substr($conn->getConfirmedNoPallet()[$i],-3,3)=='101')
    				                  || (substr($conn->getConfirmedNoPallet()[$i],-3,3)=='102')
    				                  || (substr($conn->getConfirmedNoPallet()[$i],-3,3)=='103')
    				                  )
    				          ?>
					<button class="btnstyle" id="<?php echo "btn".$i?>" name="<?php echo "btn".$i?>" style="cursor:pointer;" target="_blank" onclick="UpdateDataReleaseadPallet('<?php echo $conn->getOrderNo()?>','<?php echo $conn->getMachine()?>','<?php echo $conn->getMaterialNumber()?>','<?php echo str_replace('"','',$conn->getMaterialDesc())?>','<?php echo $conn->getConfirmedApprovedQuantity()[$i]?>','<?php echo $conn->getConfirmedNoPallet()[$i]?>','<?php echo $i?>');"> 
					Liberar</button>
					<?php }else{?>
					<div><span><img alt="exclamation" src="../Images/exclamation.png" height="18" width="18" title="Quantidade de caixas ou quantidade de camadas diferente da ficha impressa"></span></div>
					<?php }?>
				</div>
				<?php }?>
				</td>
			</tr>  
            <?php } ?>         
                        <tr>

			</tr>
			
		</table>
<?php }?>
	</div>
    <?php }else{echo "<div class='alert alert-warning'>Ordem de produção não encontrada!</div>";}?>  
    	   
    </body>
</html>
<div id="return_result_data"></div>
<?php 


?>


           
         


<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="js/SearchPido.js" type="text/javascript"></script>