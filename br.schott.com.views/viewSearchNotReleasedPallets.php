<?php
use Connection\connection;
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
require '../br.schott.com.connection/access.php';
session_start();

//resolve problema de $_SESSION
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');

//$conn = new connection();
//$conn->searchOP(6104497300);
$connPallet = new Access_ReleasedPallets();
$connPallet->SearchNotReleased();



?>
<html lang="en">
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<link href="bootstrap/bootstrap-3.3.7-dist/css/bootstrap.min.css"
	rel="stylesheet" type="text/css" />
<title>Emissão de FPP - Schott</title>

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
			<th colspan="5">Paletes Não liberados</th>
			</thead>
			<thead>
				<th>Máquina</th>
				<th>Número Palete</th>
				<th>Cód Produto</th>
				<th>Descrição</th>
				<th>%</th>
			</thead>


<?php  for($i=0; $i<= $connPallet->getNotReleasedQuantity()-1; $i++){	?>	

			<tr>
				<td width="20%" align="center"><?php echo $connPallet->getAuxiliarNotReleasedMachine()[$i];?></td>
				<td width="20%" align="center"><?php echo $connPallet->getAuxiliarNotReleasedPalletNo()[$i];?></td>
				<td width="10%" align="center"><?php echo $connPallet->getAuxiliarNotReleasedCodMaterial()[$i];?></td>
				<td width="50%" align="center"><?php echo $connPallet->getAuxiliarnotReleasedDescMaterial()[$i];?></td>
				<td width="10%" align="center"><?php echo $connPallet->getAuxiliarNotReleasedReady()[$i] . " %";?></td>
			</tr>
		<?php }?>
		</table>
		&nbsp;
		    	   
    </body>
</html>


<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="js/SearchPido.js" type="text/javascript"></script>