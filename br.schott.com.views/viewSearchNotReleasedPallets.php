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
//$connPallet->SearchNotReleased();
$connPallet->SearchNotReleasedDB();

for($j=1; $j<= $connPallet->num_rows; $j++){
    
    $arrOrder[] .=  $connPallet->getOrder_no()[$j];
}

/* array_values refaz os indices do vetor / array_unique extrai somente os valores unicos do vetor */
$arrUni = array_values(array_unique($arrOrder));

for($k=0; $k<= count($arrUni)-1; $k++)
{
    $AuxString.=$arrUni[$k]."%00";
}


$url = "http://10.20.26.28/CronetJVX//pido/getData?p_pido=50000001040&ORDER_NO=".$AuxString."&p_crosscompany=1&p_format=JSON&p_querytimeout=30&p_userid=DSCI/DSCI@cronet_cpbritu1";



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,  $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);

$jsonStr = json_decode($output, true);
$records = $jsonStr['collection'];
//var_dump($output);

//var_dump($records);

//echo $records[0]["PALETTE_NO"];

$orderNo = $records[0]['ORDER_NO'];
//$orderNo = $records[0]['ORDER_NO'];
//$palletNo = $records[0]['PALETTE_NO'];
//$boxQuantity = $records[0]['BOX_QUANTITY'];




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
	href="css/stylesheets/jquery/jquery-ui-1.11.0.css<?php echo time();?>" />
<link rel="stylesheet" media="all"
	href="css/themes/schott/stylesheets/application.css<?php echo time();?>" />
<link href="css/stylesheets/responsive.css" rel="stylesheet"
	type="text/css" />
<link rel="stylesheet" media="screen"
	href="css/plugin_assets/redmine_agile/stylesheets/redmine_agile.css<?php echo time();?>" />
<link rel="stylesheet" media="screen"
	href="/redmine/plugin_assets/redmine_checklists/stylesheets/checklists.css<?php echo time();?>" />
<link
	href="css/plugin_assets/redmine_checklists/stylesheets/checklists.css<?php echo time();?>"
	rel="stylesheet" type="text/css" />
<script
	src="css/plugin_assets/redmine_checklists/javascripts/checklists.js<?php echo time();?>"
	type="text/javascript"></script>

<script src="js/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js<?php echo time();?>"
	charset="utf-8"></script>
<script src="js/javascripts/application.js<?php echo time();?>" charset="utf-8"></script>
<script src="js/javascripts/responsive.js<?php echo time();?>"></script>
<script src="css/themes/schott/javascripts/theme.js<?php echo time();?>"></script>


</head>
<body>
	<div>
  

        
		&nbsp;
		<table border="1" width="70%" align="center" class="list issue-report-auto">
		    <thead>
			<th colspan="6">Paletes Não liberados</th>
			</thead>
			<thead>
				<th>Máquina</th>
				<th>Número Palete</th>
				<th>Cód Produto</th>
				<th>Descrição</th>
				<th>Previstos</th>
				<th>Bipados</th> 
			</thead>


<?php 


for($i=1; $i<= $connPallet->num_rows; $i++){	
   /* Procura a chave do valor do palete no vetor  */
    $key = array_search($connPallet->getPallet_no()[$i], array_column($records, 'PALETTE_NO'));
    
    if(str_replace(',', '.', number_format($records[$key]['BOX_QUANTITY']))>=$connPallet->getPaleteQty()[$i]){
        			        $cor = "#FAEAA1";
        			    }else{
        			        $cor = "#FFFFFF";
        			    } 
    			
        			    if(($key)!=null){
        			    
                ?>
			
			<tr>
			  <!--  <td bgcolor=<//?php echo $cor?> width="20%" align="center"><//?php echo $connPallet->getAuxiliarNotReleasedMachine()[$i];?></td>
				<td bgcolor=<//?php echo $cor?> width="20%" align="center"><//?php echo $connPallet->getAuxiliarNotReleasedPalletNo()[$i];?></td>
				<td bgcolor=<//?php echo $cor?> width="10%" align="center"><//?php echo $connPallet->getAuxiliarNotReleasedCodMaterial()[$i];?></td>
				<td bgcolor=<//?php echo $cor?> width="50%" align="center"><//?php echo $connPallet->getAuxiliarnotReleasedDescMaterial()[$i];?></td>-->
				
				<!-- <td width="10%" align="center"><//?php echo $connPallet->getAuxiliarNotReleasedReady()[$i] . " %";?></td> -->
				
				<!--<td bgcolor=<//?php echo $cor?> width="10%" align="center"><//?php echo str_replace(',','.',number_format($connPallet->getAuxiliarNotReleasedMaxPieces()[$i])) ;?></td>
				<td bgcolor=<//?php echo $cor?> width="10%" align="center"><//?php echo str_replace(',','.',number_format($connPallet->getAuxiliarNotReleasedProdPieces()[$i]));?></td>-->
				<!-- // -->
			    <td bgcolor=<?php echo $cor?> width="20%" align="center"><?php echo $connPallet->getMachine()[$i];?></td>
				<td bgcolor=<?php echo $cor?> width="20%" align="center"><?php echo $connPallet->getPallet_no()[$i];?></td>
				<td bgcolor=<?php echo $cor?> width="10%" align="center"><?php echo $connPallet->getProd_sap()[$i];?></td>
				<td bgcolor=<?php echo $cor?> width="50%" align="center"><?php echo $connPallet->getDesc_prod_sap()[$i];?></td>
				<td bgcolor=<?php echo $cor?> width="10%" align="center"><?php echo $connPallet->getPaleteQty()[$i];?></td>
				<td bgcolor=<?php echo $cor?> ><?php echo str_replace(',', '.', number_format($records[$key]['BOX_QUANTITY']));?></td>

			</tr>
		<?php }
		
        			    }?>
		</table>
		&nbsp;
		    	   
    </body>
</html>


<script src="js/jquery-3.2.1.min.js<?php echo time();?>" type="text/javascript"></script>
<script src="js/SearchPido.js<?php echo time();?>" type="text/javascript"></script>


