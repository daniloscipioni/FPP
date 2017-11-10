<?php 
require '../br.schott.com.connection/access.php';

$connPallet = new Access_ReleasedPallets();

$connPallet->SearchReleased();
?>

<!DOCTYPE link PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style type="text/css">

tabela{
table.list, .table-list { border: 1px solid #e4e4e4;  border-collapse: collapse; width: 100%; margin-bottom: 4px; }
table.query-columns {
  border-collapse: collapse;
  border: 0;
}
table-layout:auto;
tr.entry { border: 1px solid #f8f8f8; }
tr.entry td { white-space: nowrap; }
tr.issue { text-align: center; white-space: nowrap; }
tr.entry td.size { text-align: right; font-size: 90%; }
table td {padding:2px;}
}

</style>
<!-- <link rel="stylesheet" media="all" 	href="css/themes/schott/stylesheets/application.css" /> -->
<link rel="stylesheet" media="all" 	href="css/stylesheets/application.css" />
</head>

<body>
<table border="1" style="border-collapse: collapse;border: 0;width: 100%;table-layout:auto;border: 1px solid #f8f8f8;white-space: nowrap;text-align: center; font-size: 90%;padding:2px;" align="center" class="list issue-report-auto">
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
</body>

</html>

