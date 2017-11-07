<?php
//session_start();
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
//resolve problema de $_SESSION
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');

require '../br.schott.com.connection/access.php';
$connPallet = new Access_ReleasedPallets();

$connPallet->SearchTransferred();


?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css"
	rel="stylesheet" type="text/css" />
<title>Emiss�o de FPP - Schott</title>

<link rel="stylesheet" media="all"
	href="css/stylesheets/jquery/jquery-ui-1.11.0.css" />
<link rel="stylesheet" media="all"
	href="css/themes/schott/stylesheets/application.css" />
<link href="css/stylesheets/responsive.css" rel="stylesheet"
	type="text/css" />
<link rel="stylesheet" media="screen"
	href="css/plugin_assets/redmine_agile/stylesheets/redmine_agile.css" />
<link rel="stylesheet" media="screen"
	href="/redmine/plugin_assets/redmine_checklists/stylesheets/checklists.css" />
<link
	href="css/plugin_assets/redmine_checklists/stylesheets/checklists.css"
	rel="stylesheet" type="text/css" />
<script
	src="css/plugin_assets/redmine_checklists/javascripts/checklists.js"
	type="text/javascript"></script>

<script src="js/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js"
	charset="utf-8"></script>
<script src="js/javascripts/application.js" charset="utf-8"></script>
<script src="js/javascripts/responsive.js"></script>
<script src="css/themes/schott/javascripts/theme.js"></script>


</head>
<body>
	<div>
  

        
		&nbsp;
		<table border="1" width="70%" align="center" class="list issue-report">
			<thead>
			<th colspan="6">Paletes tranferidos</th>
			</thead>
			<thead>
				<th>Data</th>
				<th>Hora</th>
				<th>Machine</th>
				<th>N�mero Palete</th>
				<th>C�d Produto</th>
				<th>Descri��o</th>
			</thead>
		
			<?php for ($i=1; $i<=$connPallet->num_rows;$i++){?>
			<tr>
				<td width="10%" align="center"><?php echo date("d/m/Y", strtotime($connPallet->getEmission_date()[$i])); ?></td>
				<td width="10%" align="center"><?php echo date("H:m:s", strtotime($connPallet->getEmission_date()[$i])); ?></td>
				<td width="20%" align="center"><?php echo $connPallet->getMachine()[$i] ?></td>
				<td width="20%" align="center"><?php echo $connPallet->getPallet_no()[$i] ?></td>
				<td width="10%" align="center"><?php echo $connPallet->getProd_sap()[$i] ?></td>
				<td width="50%" align="center"><?php echo $connPallet->getDesc_prod_sap()[$i] ?></td>
				
			</tr>
			<?php }?>
		</table>
		&nbsp;
		    	   
    </body>
</html>


<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="js/SearchPido.js" type="text/javascript"></script>