<!DOCTYPE html>
<?php
header('Content-type: text/html; charset=UTF-8');
//session_start();
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
//resolve problema de $_SESSION
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');

require '../br.schott.com.connection/access.php';

$connPallet = new Access_ReleasedPallets();

//$connPallet->SearchReleased();
$connPallet->SearchReleasedDB()

?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="UTF-8" />
<script src="../js/sorttable.js"></script>
<title>Emiss�o de FPP - Schott</title>


</head>
	<body>
<!-- Não aparece na tela, só na impress�o -->	
	<div class="print1" id="printTable" >
	
	
	<table border="1" style="width: 100%" align="center" class="list issue-report-auto">
			<tr>
			    <td colspan="6">Paletes liberados</td>
			</tr>
			
			<tr>
				<td width="10%">Número Palete</td>
				<td width="5%">Quantidade</td>
				<td width="5%">Cód Produto</td>
				<td width="50%">Descrição</td>
				<td width="10%">Liberado por</td>
				<td width="10%">#</td>
				
			</tr>
			<?php for ($i=1; $i<=$connPallet->num_rows;$i++){?>
			<tr>
				<td width="10%" align="center"><?php echo $connPallet->getPallet_no()[$i]; ?></td>
				<td width="5%" align="center"><?php echo str_replace(',','.',number_format($connPallet->getPaleteQty()[$i])); ?></td>
				<td width="5%" align="center"><?php echo $connPallet->getProd_sap()[$i]; ?></td>
				<td width="50%" align="center"><?php echo $connPallet->getDesc_prod_sap()[$i]; ?></td>
				<td width="10%" align="center"><?php echo $connPallet->getReleasedResp()[$i]; ?></td>
				<td width="10%" align="center"><input type="checkbox"/></td>
			</tr>
			<?php }?>
		</table>
	</div>
	
<!-- /////////// -->		
	  <div class="no-print">

	   <h3 align="left"> Paletes liberados </h3>         
		&nbsp;
		<div align="left">
			    Setor:
			    
			    	<select>
			    		<option value="AMP">Ampolas</option>
			    		<option value="CAR">Carpules</option>
			    		<option value="VIA">Frascos</option>
			    	</select>
				
			</div>
		
		<table border="1" width="70%" align="center" class="list issue-report-auto sortable">
			<!-- <thead> -->
			 <?php /* if($_SESSION['nm_setor']  == "Inbound & int. log."){ */ ?> 
			<!-- <th colspan="10">Paletes liberados</th> -->
			<?php /* }else{  */?>
			 <!--    <th colspan="9">Paletes liberados</th> -->
			<?php /* } */?>
			<!-- </thead> -->
			<thead>
				<th style="width: 6%">Data</th>
				<th style="width: 6%">Hora</th>
				<th style="width: 6%">Máquina</th>
				<th style="width: 8%" >Número Palete</th>
				<th style="width: 8%">Quantidade</th>
				<th style="width: 6%">Cód Produto</th>
				<th style="width: 14%">Descrição</th>
				<th style="width: 8%">Liberado por</th>
				<th style="width: 10%">Tempo de Espera</th>
				<?php if($_SESSION['nm_setor']  == "Inbound & int. log."){?>
				<th style="width: 8%">#</th>
				<th style="width: 8%">#</th>
				<?php } ?>
			</thead>
			<?php for ($i=1; $i<=$connPallet->num_rows;$i++){
			    if($connPallet->getDaysleep()[$i] >= 1||$connPallet->getHoursleep()[$i]>=1){
			        $cor = "#FB7F6F";
			    }else{
			        $cor = "#FFFFFF";
			    }
			    ?>
			<tr>
				
				<td bgcolor=<?php echo $cor?> style="width: 6%; text-align: center"><?php echo date_format($connPallet->getEmission_date()[$i],'d/m/Y')."<br>"; ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 6%" align="center"><?php echo date_format($connPallet->getEmission_date()[$i],'H:i:s') ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 6%" align="center"><?php echo $connPallet->getMachine()[$i] ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 8%; text-align: center"><?php echo $connPallet->getPallet_no()[$i]; ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 8%" align="center"><?php echo $connPallet->getPaleteQty()[$i]; ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 6%" align="center"><?php echo $connPallet->getProd_sap()[$i]; ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 14%" align="center"><?php echo $connPallet->getDesc_prod_sap()[$i]; ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 8%" align="center"><?php echo $connPallet->getReleasedResp()[$i]; ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 10%" align="center"><?php echo $connPallet->getTimesleep()[$i]; ?></td>
				<?php if($_SESSION['nm_setor']  == "Inbound & int. log."){?>
				<td bgcolor=<?php echo $cor?> style="width: 8%;text-align: center;"><button style="cursor:pointer;" onclick="MarkPallet('<?php echo $connPallet->getPallet_no()[$i]?>');">Baixar</button></td>
				<td bgcolor=<?php echo $cor?> style="width: 8%;text-align: center;"><button style="cursor:pointer;" onclick="ReturnPallet('<?php echo $connPallet->getPallet_no()[$i]?>');">Retornar</button></td>
				<?php }?>
			</tr>
			<?php }?>
		</table>
		&nbsp;
		</div> 	
		
<button onclick="printPage('viewPrintReleasedPallets.php');" class="no-print">Imprimir</button>   
   
   
    </body>
</html>

<script>

setTimeout(function(){ 
						if($("#liberados").is(":focus")){
							SearchReleasedPallets(); 
						}
				
					},300000// 900000
					);
</script>
<script src="js/jquery-3.2.1.min.js?<?php echo time();?>" type="text/javascript"></script>
<script src="js/SearchPido.js?<?php echo time();?>" type="text/javascript"></script>
