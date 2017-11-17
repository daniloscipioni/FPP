<?php
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
//resolve problema de $_SESSION
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
use Connection\Connection;
use Util\Util;
//use Util\Util;
require '../br.schott.com.connection/access.php';
$connPallet = new Access_ReleasedPallets();
require '../br.schott.com.util/Util.php';

 $util = new Util();
 $util->setOp($_POST['op']);

 $conn = new connection();
 //$conn->searchOP($util->getOp());
 $conn->searchOP($_POST['op']);
 
// $conn->searchMaterials($util->getOp());
 $conn->searchMaterials($_POST['op']);
 
 //$conn->searchPallets($util->getOp());
 
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
    <div class='painel' align='center' id='confirmGeneratedPalletInfo'>Os paletes desta ordem já foram confirmados</div>
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
				<td colspan="8" align="left"><?php echo (int)$conn->getCodeCustomer()." - ".$conn->getCustomer()?></td>
			</tr>
			<tr>
				<td colspan="2" align="left"><b>Material </b></td>
				<td colspan="8" align="left"><?php echo $conn->getMaterialNumber()." - ".$conn->getMaterialDescription()?></td>
			</tr>
			
		</table>
		&nbsp;
		<table border="1" width="70%" align="center" class="list issue-report">
			
			<tr>
				<td colspan="5" align="center"><b>Detalhes da OP </b></td>
			</tr>
			<tr>

				<td width="20%"><b>Máquina / Status: </b></td>
				<td width="20%" align="left"><?php echo $conn->getMachine() ." - ".utf8_decode($conn->getDescStatus())?></td>
				<td width="20%" colspan="2"><b>Quantidade da OP </b></td>
				<td width="20%" align="left"><?php echo str_replace(',', '.', number_format($conn->getOpQuantity())) ?></td>
			</tr>
			<tr>
				<td width="20%"><b>Data de Início: </b></td>
				<td width="10%" align="left"><?php echo $conn->getStartDate() ?></td>
				<td width="20%" colspan="2"><b>Quantidade Produzida</b></td>
				<td width="20%" align="left"><?php echo $conn->getProducedPieces() ?></td>

			</tr>
			<tr>
				<td width="20%"><b>Data de Entrega: </b></td>
				<td width="10%" align="left"><?php echo $conn->getDeliveryDate() ?></td>
				<td width="20%" colspan="2"><b>Quantidade a Produzir</b></td>
				<td width="20%" align="left"><?php echo $conn->getQuantityToProduce() ?></td>
			</tr>
			
		</table>
		&nbsp;
		<table border="1" width="70%" align="center" class="list issue-report">
			
			<tr>
				<td colspan="6" align="center"><b>Especificação de Embalagem </b></td>
			</tr>
			<tr>
				<td align="center"><b>Cx / Camada:</b></td>
				<td align="center"><?php echo $conn->getBoxPerLayer() ?></td>
				<td align="center"><b>Cxs / Palete:</b></td>
				<td align="center"><?php echo $conn->getBoxPerPallet() ?></td>
				<td rowspan="2" align="center"><b>Peças / Palete:</b></td>
				<td rowspan="2" align="center"><?php echo $conn->getPiecesPerPallet() ?></td>
			</tr>
			<tr>
				<td align="center"><b>Qtde Camadas:</b></td>
				<td align="center"><?php echo $conn->getQuantityOfLayers() ?></td>
				<td align="center"><b>Peças / Caixa:</b></td>
				<td align="center"><?php echo $conn->getPiecesPerBox() ?></td>
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
        
for ($i = 0; $i <= $conn->getQuantityMaterial() - 1; $i ++) {
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
				<td align="center"><?php echo str_replace(',','.',number_format($conn->getBoxPredictedQuantity()))?></td>
				<td align="center"><?php echo $conn->getPalletPredictedQuantity()?></td>
				<td align="center"><?php echo $conn->getLayerPredictedQuantity()?></td>
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
        
        $leftover = $conn->getBoxPredictedQuantity();
        $total_op = $conn->getOpQuantity();
        $rest = false;
               
        for ($i = 1; $i <= $conn->getPalletPredictedQuantity(); $i ++) {
            $conn->setOpQuantity($total_op);
            $piecesLeftover = $total_op;
            
            ?>     
                   
                   
                    <tr>
				<!--Nº do Palete -->
				<td align="center">
                        	<?php
            
echo $conn->getOrderNo() . str_pad($i, 6, "0", STR_PAD_LEFT);
            
            $predicatedInformation[$i]['num_palete'] = $conn->getOrderNo() . str_pad($i, 6, "0", STR_PAD_LEFT);
            $numPalete .=  $conn->getOrderNo() . str_pad($i, 6, "0", STR_PAD_LEFT).";";
            
            ?>
                        </td>
				<!-- -- -->

				<!--Qtde CX-->
				<td align="center">
                            <?php
            
            // Compara se a sobra da quantidade de caixas é maior que a quantidade total de caixas por palete, caso seja verdadeiro. faz a redução da quantidade total de caixas pela quantidade de caixas por palete.
            if ($leftover > $conn->getBoxPerPallet()) {
                $predicatedBoxQuantity = $util->calcPredicatedBox($conn->getlayerPredictedQuantity(), $conn->getBoxPerLayer(), $conn->getPiecesPerBox()) / $conn->getPiecesPerBox();
                // Exibe a quantidade de caixas previstas
                $predicatedBoxQuantityLeftover = $predicatedBoxQuantity - floor($predicatedBoxQuantity);
                echo $predicatedBoxQuantity;
                $qtdeCaixa .= $predicatedBoxQuantity.";";
                $predicatedInformation[$i]['qtde_caixa'] = $predicatedBoxQuantity;
                
            } else {
                $predicatedBoxQuantity = $conn->getOpQuantity() / $conn->getPiecesPerBox();
                echo floor($predicatedBoxQuantity);
                $qtdeCaixa .= floor($predicatedBoxQuantity).";";
                $predicatedInformation[$i]['qtde_caixa'] = floor($predicatedBoxQuantity);
                
                $predicatedBoxQuantityLeftover = $predicatedBoxQuantity - floor($predicatedBoxQuantity);
                if ($predicatedBoxQuantityLeftover > 0) {
                    $rest = true;
                }
            }
            // Recebe o valor da sobra de caixas deduzindo do total de caixas
            $leftover = $util->leftover($leftover, $conn->getBoxPerPallet());
            ?>
                        </td>
				<!-- -- -->

				<!--Qtde Camadas-->
				<td align="center">
                            <?php
                            echo $util->calcPredicatedLayers($predicatedBoxQuantity, $conn->getBoxPerLayer());
                            $predicatedInformation[$i]['qtde_camadas'] = $util->calcPredicatedLayers($predicatedBoxQuantity, $conn->getBoxPerLayer());
                            $qtdeCamadas .= $util->calcPredicatedLayers($predicatedBoxQuantity, $conn->getBoxPerLayer()).";";
                            ?>                
                 </td>
				<!-- -- -->

				<!--Qtde Peças-->
				<td align="center">
                            <?php
            
                            $predicatedBoxQuantityPieces = $util->calcPredicatedBox($conn->getlayerPredictedQuantity(), $conn->getBoxPerLayer(), $conn->getPiecesPerBox());
            
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
            $_SESSION['rest'] = round($predicatedBoxQuantityLeftover * $conn->getPiecesPerBox());
            $rest = round($predicatedBoxQuantityLeftover * $conn->getPiecesPerBox());
        } else {
            unset($_SESSION['rest']);
        }
        
        $_SESSION['predictedInfo'] = $predicatedInformation;
        
        ?>
                    <tr height="15">

					
				
			
					<td align="center"  colspan="4">
			 <form action="../br.schott.com.views/viewAllCardPredictedPrinted.php?op=<?php echo $conn->getOrderNo()?>" method="post" target="_blank" id="predictedPallets"> 
					
					<input type="hidden" id="idmachine" 	 name="nmmachine" value="<?php echo $conn->getMachine();?>">
					<input type="hidden" id="idop" 	 	name="nmop" value="<?php echo $conn->getOrderNo();?>">
					<input type="hidden" id="idnumPalete"    name="nmnumPalete" value="<?php echo $numPalete;?>">
					<input type="hidden" id="idcodmaterial"name="nmcodmaterial" value="<?php echo $conn->getMaterialNumber()?>">
					<input type="hidden" id="iddescdmaterial"name="nmdescmaterial" value="<?php echo $conn->getMaterialDescription();?>">
					<input type="hidden" id="idqtdePecas"    name="nmqtdePecas" value="<?php echo $qtdePecas;?>">
					
					
					<input type="hidden" id="idmaterial" 	 name="nmmaterial" value="<?php echo $conn->getMaterialNumber()." - ".$conn->getMaterialDescription();?>">
					<input type="hidden" id="idqtdeCx"       name="nmqtdeCx" value="<?php echo $qtdeCaixa;?>">
					<input type="hidden" id="idqtdeCmd"      name="nmqtdeCmd" value="<?php echo $qtdeCamadas;?>">
					<input type="hidden" id="idrest" 		 name="nmrest" value="<?php echo $rest;?>">	
					<input type="hidden" id="idcustomer"     name="nmcustomer" value="<?php echo (int)$conn->getCodeCustomer()." - ".$conn->getCustomer();?>">
					<input type="hidden" id="idmaterialdesc" name="nmmaterialdesc" value="<?php echo $conn->getMaterialDesc();?>">	
					<input type="hidden" id="iddeliverydate" name="nmdeliverydate" value="<?php echo $conn->getDeliveryDate();?>">
					<input type="hidden" id="idquantity" 	 name="nmquantity" value="<?php echo $conn->getPalletPredictedQuantity();?>">	
					<input type="hidden" id="idcxpercmd" 	 name="nmcxpercmd" value="<?php echo $conn->getBoxPerLayer();?>">	
					<input type="hidden" id="idpcsperbox" 	 name="nmpcsperbox" value="<?php echo $conn->getPiecesPerBox();?>">	
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
		<button onclick="SaveDataGeneratedPallet('<?php echo $conn->getOrderNo();?>','<?php echo $conn->getMachine();?>','<?php echo $conn->getMaterialNumber()?>','<?php echo $conn->getMaterialDescription();?>','<?php echo $qtdePecas;?>','<?php echo $numPalete;?>');" class="confirm"> Confirmar</button>
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
        for ($i = 0; $i <= $conn->getQuantityPallet() - 1; $i ++) { ?>                
             
            
			
              <tr>
				<td align="center"><?php echo $conn->getConfirmedNoPallet()[$i] ?></td>
				<td align="center"><?php echo $conn->getConfirmedBoxQuantity()[$i] ?></td>
				<td align="center"><?php echo $conn->getConfirmedLayerQuantity()[$i] ?></td>
				<td align="center"><?php echo str_replace(',','.',number_format($conn->getConfirmedApprovedQuantity()[$i])) ?></td>
				<td align="center">
			 
			   
			    <form method="get" action="../br.schott.com.views/viewCardConfirmedPrinted.php?op=<?php echo $conn->getOrderNo()?>&pallet_no=<?php echo $conn->getConfirmedNoPallet()[$i]?>&unity=<?php echo $conn->getLineNumber()[$i]?>" id="markedPallets" target="_blank">
                    <input type="hidden" id="idcustomer"     name="nmcustomer" value="<?php echo (int)$conn->getCodeCustomer()." - ".$conn->getCustomer();?>">
					<input type="hidden" id="idop" 	 name="nmop" value="<?php echo $conn->getOrderNo();?>">
					<input type="hidden" id="idmaterial" 	 name="nmmaterial" value="<?php echo $conn->getMaterialNumber()." - ".$conn->getMaterialDescription();?>">
					<input type="hidden" id="idmachine" 	 name="nmmachine" value="<?php echo $conn->getMachine();?>">	
					<input type="hidden" id="idmaterialdesc" name="nmmaterialdesc" value="<?php echo $conn->getMaterialDesc();?>">	
					<input type="hidden" id="iddeliverydate" name="nmdeliverydate" value="<?php echo $conn->getDeliveryDate();?>">
					<input type="hidden" id="idboxqty" name="nmboxqty" value="<?php echo $conn->getConfirmedBoxQuantity()[$i];?>">
					<input type="hidden" id="idlayerqty" name="nmlayerqty" value="<?php echo $conn->getConfirmedLayerQuantity()[$i];?>">	
					<input type="hidden" id="idpcsqty" name="nmpcsqty" value="<?php echo $conn->getConfirmedApprovedQuantity()[$i];?>">
					<input type="hidden" id="idpcsperbox" name="nmpcsperbox" value="<?php echo $conn->getPiecesPerBox();?>">
					<input type="hidden" id="idboxperlayer" name="nmboxperlayer" value="<?php echo $conn->getBoxPerLayer();?>">
					<input type="hidden" id="idpalletquantity" name="nmpalletquantity" value="<?php echo $conn->getQuantityPallet();?>">
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
			   <?php if($connPallet->SearchPalletsDB($conn->getConfirmedNoPallet()[$i])){echo "<button style='visibility: hidden;'>1</button><font color='green'><b>Liberado</b></font><button style='visibility: hidden;'>1</button>";}else{?>
				<div id="liberar<?php echo $i?>">
				    
					<button class="btnstyle" id="<?php echo "btn".$i?>" name="<?php echo "btn".$i?>" style="cursor:pointer;" target="_blank" onclick="UpdateDataReleaseadPallet('<?php echo $conn->getOrderNo()?>','<?php echo $conn->getMachine()?>','<?php echo $conn->getMaterialNumber()?>','<?php echo str_replace('"','',$conn->getMaterialDesc())?>','<?php echo $conn->getConfirmedApprovedQuantity()[$i]?>','<?php echo $conn->getConfirmedNoPallet()[$i]?>','<?php echo $i?>');"> 
					Liberar</button>
					
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