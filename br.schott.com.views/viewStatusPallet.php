<?php 
session_start();
header('Content-type: text/html; charset=ISO-8859-1');

if (!isset($_SESSION['id_user'])) {
    header("Location: ./br.schott.com.auth/auth-login.php");
    die();
} 

?>
<html lang="pt-BR"><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>FPP - SCHOTT</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="Redmine">
<meta name="keywords" content="issue,bug,tracker">
<meta name="csrf-param" content="authenticity_token">
<meta name="csrf-token" content="Znbi4LxpAcfm5mHalpquSwXp1agUX8MSeIsef1UjOPFjCLQ0DCWRwlZJhIi0JztUXPrPmQGJg8/JmxSwgNOMng==">
<link rel="shortcut icon" href="../Images/fpp.png?1500229109">
<link rel="stylesheet" media="all" href="../css/stylesheets/jquery/jquery-ui-1.11.0.css?1500229109">
<link rel="stylesheet" media="all" href="../css/themes/schott/stylesheets/application.css?1412685099">
<link rel="stylesheet" media="all" href="../css/stylesheets/responsive.css?1500229109">
<script src="../js/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js?1500229109"></script>
<script src="../js/javascripts/application.js?1500229109"></script>
<script src="../js/javascripts/responsive.js?1500229109"></script>
</head>
<body class="theme-Schott controller-welcome action-index">

<div id="wrapper">

<div class="flyout-menu js-flyout-menu">


        <div class="flyout-menu__search">
                   </div>

        <div class="flyout-menu__avatar ">
                <a href="/redmine/users/178"><img alt="" title="" class="gravatar" srcset="//www.gravatar.com/avatar/101d6848b38d6ed6f619e9c1914f4cbb?rating=PG&amp;size=160&amp;default=mm 2x" src="//www.gravatar.com/avatar/101d6848b38d6ed6f619e9c1914f4cbb?rating=PG&amp;size=80&amp;default=mm"></a>
            <a class="user active" href="/redmine/users/178">daniloscipioni</a>
        </div>

        <h3>Projeto</h3>
        <span class="js-project-menu"></span>

    <h3>Geral</h3>
    <span class="js-general-menu"></span>

    <span class="js-sidebar flyout-menu__sidebar"></span>

    <h3>Perfil</h3>
    <span class="js-profile-menu"></span>

</div>

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

	<li><a class="fpp" href="viewSearchOrder.php">Ficha de Produto em Processo</a></li>
	<li><a class="overview selected" href="#">Status</a></li>
	</ul>
</div>
</div>


<div id="main" class="nosidebar">
    <div id="sidebar">
        

        
    </div>

    <div id="content">
        
<h2>Status dos Paletes</h2>


<script>
$(document).ready(function() {
SearchReleasedPallets();
$("#liberados").focus();
})
</script> 



    <div align="center">
        <div class="btn-group" role="group" aria-label="..."> 
        <button onclick="SearchReleasedPallets();" type="button" id="liberados"   class="btn btn-default">Liberados</button>
        <button onclick="SearchTransferredPallets();"type="button" class="btn btn-default">Transferidos</button>
        <button onclick="SearchNotReleasedPallets();"type="button" class="btn btn-default">Não liberados</button>
        </div> 
    </div> 



<!--  INICIO Exibicao do resultado da consulta --> 

				<div id="return_result" align="center"></div>
 <!-- FIM --> 



        <link rel="stylesheet" media="all" href="/redmine/plugin_assets/sidebar_hide/stylesheets/sidebar_hide.css?1500665373">
<script src="/redmine/plugin_assets/sidebar_hide/javascripts/sidebar_hide.js?1500665373"></script>


        <div style="clear:both;"></div>
    </div>
</div>
</div>


<div id="footer">
  <div class="bgl"><div class="bgr">
    Developed by <a href="http://www.schott.com/brazil/portuguese/">Schott Brasil</a> &copy; 2017-2017 Danilo Scipioni
  </div>
</div>
<!-- </div> -->
<!-- </div> -->



</body>

</html>

<script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="../js/SearchPido.js" type="text/javascript"></script>