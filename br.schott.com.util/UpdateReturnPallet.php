<?php

require '../br.schott.com.connection/access.php';

extract($_POST);

$releasedPallets = new Access_ReleasedPallets();


$releasedPallets->UpdateTranferredPalletDB($pallet);

?>