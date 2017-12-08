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
<script src="../js/sorttable.js"></script>
</head>
<body>
	<div>
  

<h3 align="left"> Paletes Transferidos </h3>         
		&nbsp;
		<table border="1" width="70%" align="center" class="list issue-report-auto sortable">

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