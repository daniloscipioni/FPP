<?php
//session_start();
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
//resolve problema de $_SESSION
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');

require '../br.schott.com.connection/access.php';
$connPallet = new Access_ReleasedPallets();

//$connPallet->SearchTransferred();
$connPallet->SearchTransferredDB();


?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css?<?php echo time();?>"
	rel="stylesheet" type="text/css" />
<title>Emissão de FPP - Schott</title>

<link rel="stylesheet" media="all"
	href="css/stylesheets/jquery/jquery-ui-1.11.0.css?<?php echo time();?>" />
<link rel="stylesheet" media="all"
	href="css/themes/schott/stylesheets/application.css?<?php echo time();?>" />
<link href="css/stylesheets/responsive.css" rel="stylesheet"
	type="text/css" />
<link rel="stylesheet" media="screen"
	href="css/plugin_assets/redmine_agile/stylesheets/redmine_agile.css?<?php echo time();?>" />
<link rel="stylesheet" media="screen"
	href="/redmine/plugin_assets/redmine_checklists/stylesheets/checklists.css?<?php echo time();?>" />
<link
	href="css/plugin_assets/redmine_checklists/stylesheets/checklists.css?<?php echo time();?>"
	rel="stylesheet" type="text/css" />
<script
	src="css/plugin_assets/redmine_checklists/javascripts/checklists.js?<?php echo time();?>"
	type="text/javascript"></script>

<script src="js/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js"
	charset="utf-8"></script>
<script src="js/javascripts/application.js?<?php echo time();?>" charset="utf-8"></script>
<script src="js/javascripts/responsive.js?<?php echo time();?>"></script>
<script src="css/themes/schott/javascripts/theme.js?<?php echo time();?>"></script>


</head>
<body>
	<div>
  

        
		&nbsp;
		<table border="1" width="70%" align="center" class="list issue-report-auto">
			<thead>
			<th colspan="7">Paletes transferidos</th>
			</thead>
			
			<thead>
				<th>Data</th>
				<th>Hora</th>
				<th>Machine</th>
				<th>Número Palete</th>
				<th>Cód Produto</th>
				<th>Descrição</th>
				<th>Tranferido por</th>
			</thead>
		
			<?php for ($i=1; $i<=$connPallet->num_rows;$i++){?>
			<tr>
				<td width="10%" align="center"><?php echo date_format($connPallet->getEmission_date()[$i],'d/m/Y'); ?></td>
				<td width="10%" align="center"><?php echo date_format($connPallet->getEmission_date()[$i],'H:i:s'); ?></td>
				<td width="20%" align="center"><?php echo $connPallet->getMachine()[$i] ?></td>
				<td width="20%" align="center"><?php echo $connPallet->getPallet_no()[$i] ?></td>
				<td width="10%" align="center"><?php echo $connPallet->getProd_sap()[$i] ?></td>
				<td width="50%" align="center"><?php echo $connPallet->getDesc_prod_sap()[$i] ?></td>
				<td width="50%" align="center"><?php echo $connPallet->getTransfResp()[$i] ?></td>
			</tr>
			<?php }?>
		</table>
		&nbsp;
		    	   
    </body>
</html>


<script src="js/jquery-3.2.1.min.js?<?php echo time();?>/" type="text/javascript"></script>
<script src="js/SearchPido.js?<?php echo time();?>" type="text/javascript"></script>