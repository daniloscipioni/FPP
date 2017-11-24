<?php 
session_start();
set_time_limit(0);
header('Content-type: text/html; charset=UTF-8');

if (!isset($_SESSION['id_user'])) {
    header("Location: ./br.schott.com.auth/auth-login.php");
    die();
} 

if( $_SESSION['nm_setor'] == 'Quality management'){
    $tabName = "Liberação Qualidade";
}elseif ($_SESSION['nm_setor'] == 'Production planning')
{
    $tabName = "Impressão PCP";
}elseif ($_SESSION['nm_setor'] == 'Production overhead')
{
    $tabName = "Impressão ADM";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>FPP - SCHOTT</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="Redmine">
<meta name="keywords" content="issue,bug,tracker">
<meta name="csrf-param" content="authenticity_token">
<meta name="csrf-token" content="BWtd3OPvQzwhjTPErwLxHzeDH8SyM9PvSmXTNhVdaKAYygJ3VdE7EnOraA45QqU5qsDZHAWcSnu1W2QKz1+CQw==">
<link rel="shortcut icon" href="Images/fpp.png">
<link rel="stylesheet" media="all" href="../css/stylesheets/jquery/jquery-ui-1.11.0.css?1500229109">
<link rel="stylesheet" media="all" href="../css/themes/schott/stylesheets/application.css?1412685099">

<link rel="stylesheet" media="all" href="../css/stylesheets/responsive.css?1500229109">

<script src="../js/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js?1500229109"></script>
<script src="../js/javascripts/application.js?1500229109"></script>
<script src="../js/javascripts/responsive.js?1500229109"></script>
<script src="../js/javascripts/theme.js?1351450256"></script>
<script src="../js/plugin_assets/redmine_checklists/javascripts/checklists.js?1500665867"></script>
</head>
<body class="theme-Schott controller-welcome action-index">

<div id="wrapper">


<!-- <div id="wrapper2"> -->
<!-- <div id="wrapper3"> -->
<div id="top-menu">
    <div id="account">
				<ul>
				    <?php if ($_SERVER['SERVER_NAME'] == 'localhost'){
				    $servidor = "Teste";
				    } else {$servidor = "Produção";}?>
				    <li><b> Servidor:  <?php echo $servidor?></b>&nbsp;&nbsp;</li>
					
					<li><b> Cracha:  <?php echo $_SESSION['cd_user']?></b>&nbsp;&nbsp;</li>
					<li><b> Nome:   <?php echo $_SESSION['nm_user']?></b>&nbsp;&nbsp;</li>
					 <li><b> Setor:   <?php echo $_SESSION['nm_setor']?></b>&nbsp;&nbsp;</li>
					<li><span class="glyphicon glyphicon-lock"></span>&nbsp;<b><?php echo $_SESSION['fpp_desc_permission']?></b>&nbsp;&nbsp;</li>
					<li><a class="register" href="../br.schott.com.auth/auth-logout.php"> Sair <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
				</ul>
			</div>
    
    		</div>

<div id="header">

    <a href="#" class="mobile-toggle-button js-flyout-menu-toggle-button"></a>


    <h1><span class="current-project">Ficha de Produto em Processo</span></h1>

    <div id="main-menu" class="tabs">
        

    <ul>

	<li><a class="overview selected" href="#"><?php echo $tabName?></a></li>
	<li><a class="issues" href="viewStatusPallet.php">Status</a></li>
	<?php if($_SESSION['nm_setor']  != "Quality management"){?>
	<li><a class="issues" href="viewCancelOrder.php">Cancelamento de Palete</a></li>
    <?php }?>
	</ul>
</div>
</div>


<div id="main" class="nosidebar">
    <div id="sidebar">
        

        
    </div>

    <div id="content">
        
<h2>Ficha de Produto em Processo</h2>


<!-- <div class="splitcontentleft">-->
<div id="search-order"> 
            <div id="login-form"> 
               <form  id="formSearch" method="post" target="_blank">
                  <label for="order">Ordem de Produção</label>
                  <input type="text" name="txt_search_order" id="txt_search_order" tabindex="1" autofocus="autofocus" maxlength="10">
                  <input class="btnstyle" type="submit" name="btn_search_order" value="Buscar &#187;" onclick="SearchPido();" tabindex="1" id="btn_search_order">
               </form>
         	</div> 
</div> 
  
<!-- </div>

<div class="splitcontentright"> -->
    <div id="return_result" align="center" valign="center">

    </div>
<!-- </div> -->




        <link rel="stylesheet" media="all" href="/redmine/plugin_assets/sidebar_hide/stylesheets/sidebar_hide.css?1500665373">
<script src="/redmine/plugin_assets/sidebar_hide/javascripts/sidebar_hide.js?1500665373"></script>


        <div style="clear:both;"></div>
    </div>
</div>
</div>


<div id="footer">
  <div class="bgl">
      <div class="bgr">
        Developed by <a href="http://www.schott.com/brazil/portuguese/">Schott Brasil</a> &copy; 2017-2017 Danilo Scipioni
      </div>
      <div class="bgr">
       	Versão 1.0
      </div>
  </div>
</div>
<!-- </div> -->
<!-- </div> -->



</body>

</html>

<script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../js/SearchPido.js" type="text/javascript"></script>