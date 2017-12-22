<?php
/*  $ordem = $_POST['ordem'];
$cliente = $_POST['cliente'];
$cod_cliente = $_POST['cod_cliente'];
$box_layer = $_POST['box_layer']; 


echo $ordem;
echo $cliente;
echo $cod_cliente;
echo $box_layer;

var_dump($_POST); */

extract($_POST);

echo"order : ".$order ."<br>";
echo" customer : ".$customer ."<br>";
echo" cod_customer : ".$cod_customer ."<br>";
echo" customer : ".$customer ."<br>";
echo" data_inicio : ".$data_inicio ."<br>";
echo" default_data_inicio : ".$default_data_inicio ."<br>";
echo" primeira_data_inicio : ".$primeira_data_inicio ."<br>";
echo" data_entrega : ".$data_entrega ."<br>";
echo" material_num : ".$material_num ."<br>";
echo" material_desc : ".$material_desc ."<br>";
echo" pcs_caixa : ".$pcs_caixa ."<br>";
echo" cxs_palete : ".$cxs_palete ."<br>";
echo" uvar3 : ".$uvar3 ."<br>";
echo" cxs_camada : ".$cxs_camada ."<br>";
echo" uvar5 : ".$uvar5 ."<br>";
echo" uvar6 : ".$uvar6 ."<br>";
echo" default_maquina : ".$default_maquina ."<br>";
echo" maquina : ".$maquina ."<br>";
echo" uvar11 : ".$uvar11 ."<br>";
echo" uvar21 : ".$uvar21 ."<br>";
echo" uvar51 : ".$uvar51 ."<br>";
echo" uvar61 : ".$uvar61 ."<br>";
echo" pcs_prod : ".$pcs_prod ."<br>";
echo" qtde_a_produzir : ".$qtde_a_produzir ."<br>";
echo" qtde_op : ".$qtde_op ."<br>";
echo" status : ".$status ."<br>";
echo" desc_status : ".$desc_status ."<br>";
echo" function6 : ".$function6 ."<br>";
echo" function7 : ".$function7 ."<br>";
echo" qtde_camadas : ".$qtde_camadas ."<br>";
echo" qtde_pallet_prev : ".$qtde_pallet_prev ."<br>";
echo" qtde_camadas_prev : ".$qtde_camadas_prev ."<br>";
echo" qtde_caixas_prev : ".$qtde_caixas_prev ."<br>";
echo" pcs_palete : ".$pcs_palete ."<br>";
echo" material_desc : ".$material_desc ."<br>";

    


?>