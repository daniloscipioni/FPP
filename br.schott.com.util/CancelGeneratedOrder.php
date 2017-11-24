<?php

require '../br.schott.com.connection/access.php';
extract($_POST);

$releasedPallets = new Access_ReleasedPallets();

$releasedPallets->SearchOrderDB($order);


//$releasedPallets->InsertReleasedPallet($order,$machine,$material,$materialDesc,$quantity,$pallet);
if($releasedPallets->num_rows>0){
    try {
        $releasedPallets->CancelOrder($order);
        echo "<div class='flash notice'>As fichas da ordem ".$order." foram canceladas com sucesso!</div>";
    } catch (Exception $e) {
        echo "<div align='center'>Algo deu errado, tente novamente</div>";
    }
    
    
}else{
    echo "<div class='flash error'>Ordem de produção inexistente ou já cancelada ou paletes já liberados!</div>";
}
?>
