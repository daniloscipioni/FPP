<?php
//session_start();
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
//resolve problema de $_SESSION
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');

require '../br.schott.com.connection/access.php';

$connPallet = new Access_ReleasedPallets();

$connPallet->SearchReleased();

?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<title>Emiss�o de FPP - Schott</title>

<link rel="stylesheet" media="all"
	href="../css/stylesheets/jquery/jquery-ui-1.11.0.css" />
<link rel="stylesheet" media="all"
	href="../css/themes/schott/stylesheets/application.css" />
<link href="css/stylesheets/responsive.css" rel="stylesheet"
	type="text/css" />
<link rel="stylesheet" media="screen"
	href="../css/plugin_assets/redmine_agile/stylesheets/redmine_agile.css" />
<link rel="stylesheet" type="text/css" media="print" href="../css/pageprint/print.css">


<script src="../js/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js" charset="utf-8"></script>
<script src="../js/javascripts/application.js" charset="utf-8"></script>
<script src="../js/javascripts/responsive.js"></script>
<script src="../css/themes/schott/javascripts/theme.js"></script>


</head>
	<body>
<!-- N�o aparece na tela, s� na impress�o -->	
	<div class="print1" id="printTable" >
	<table border="1" style="width: 100%" align="center" class="list issue-report-auto">
			<tr>
			    <td colspan="6">Paletes liberados</td>
			</tr>
			<tr>
				<td width="10%">N�mero Palete</td>
				<td width="5%">Quantidade</td>
				<td width="5%">C�d Produto</td>
				<td width="50%">Descri��o</td>
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
        
		&nbsp;
		<table border="1" width="70%" align="center" class="list issue-report-auto">
			<thead>
			<?php if($_SESSION['nm_setor']  == "Inbound & int. log."){?>
			<th colspan="10">Paletes liberados</th>
			<?php }else{ ?>
			    <th colspan="9">Paletes liberados</th>
			<?php }?>
			</thead>
			<thead>
				<th style="width: 5%">Data</th>
				<th style="width: 5%">Hora</th>
				<th style="width: 5%">M�quina</th>
				<th style="width: 15%">N�mero Palete</th>
				<th style="width: 5%">Quantidade</th>
				<th style="width: 10%">C�d Produto</th>
				<th style="width: 30%">Descri��o</th>
				<th style="width: 5%">Liberado por</th>
				<th style="width: 10%">Tempo de Espera</th>
				<?php if($_SESSION['nm_setor']  == "Inbound & int. log."){?>
				<th style="width: 5">#</th>
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
					
				
				<td bgcolor=<?php echo $cor?> style="width: 5%" align="center"><?php echo date("d/m/Y", strtotime($connPallet->getEmission_date()[$i]))."<br>"; ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 5%" align="center"><?php echo date("H:m:s", strtotime($connPallet->getEmission_date()[$i])); ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 5%" align="center"><?php echo $connPallet->getMachine()[$i] ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 15%" align="center"><?php echo $connPallet->getPallet_no()[$i]; ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 5%" align="center"><?php echo str_replace(',','.',number_format($connPallet->getPaleteQty()[$i])); ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 10%" align="center"><?php echo $connPallet->getProd_sap()[$i]; ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 30%" align="center"><?php echo $connPallet->getDesc_prod_sap()[$i]; ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 5%" align="center"><?php echo $connPallet->getReleasedResp()[$i]; ?></td>
				<td bgcolor=<?php echo $cor?> style="width: 10%" align="center"><?php echo $connPallet->getTimesleep()[$i]; ?></td>
				<?php if($_SESSION['nm_setor']  == "Inbound & int. log."){?>
				<td bgcolor=<?php echo $cor?> width="10%" align="center"><button style="cursor:pointer;" onclick="MarkPallet('<?php echo $connPallet->getPallet_no()[$i]?>');">Baixar</button></td>
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
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="js/SearchPido.js" type="text/javascript"></script>