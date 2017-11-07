<script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
<?php
session_start();
require '../br.schott.com.connection/access.php';

$validation = new Access_users();


// @param  $_POST['txt_id']: recebe a chapa do funcionários no qual serve de validação
// obs. A validação é feita somente pela chapa

$validation->Login($_POST['cracha']);

if($validation->num_rows == 1)
{
    
     $_SESSION['id_user']              =  $validation->id_user[1];
     $_SESSION['cd_user']              =  $validation->cd_user[1];
     $_SESSION['nm_user']              =  $validation->nm_user[1];
     $_SESSION['nm_setor']             =  trim($validation->nm_setor[1]);
     $_SESSION['fpp_permission']       =  $validation->fpp_permission[1];
     $_SESSION['fpp_desc_permission']  =  $validation->fpp_desc_permission[1];
    
    
    header("Location: ../br.schott.com.views/viewSearchOrder.php");
    die();

}else{
?>
<script>
    $("#return-information").html("<div id='return-information' class='alert alert-warning'>Funcionário não existe!</div>");
</script>

<?php header("Location: auth-login.php?erro");
 }


