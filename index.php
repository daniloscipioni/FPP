<?php 
session_start();
//header('Content-type: text/html; charset=ISO-8859-1');

//if (!isset($_SESSION['id_user'])) {
    header("Location: ./br.schott.com.auth/auth-login.php");
  //  die();
//} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SCHOTT - FPP</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="Redmine">
<meta name="keywords" content="issue,bug,tracker">
<meta name="csrf-param" content="authenticity_token">
<meta name="csrf-token" content="BWtd3OPvQzwhjTPErwLxHzeDH8SyM9PvSmXTNhVdaKAYygJ3VdE7EnOraA45QqU5qsDZHAWcSnu1W2QKz1+CQw==">
<link rel="shortcut icon" href="Images/fpp.png">
<link rel="stylesheet" media="all" href="css/stylesheets/jquery/jquery-ui-1.11.0.css?1500229109">
<link rel="stylesheet" media="all" href="css/themes/schott/stylesheets/application.css?1412685099">

<link rel="stylesheet" media="all" href="css/stylesheets/responsive.css?1500229109">

<script src="js/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js?1500229109"></script>
<script src="js/javascripts/application.js?1500229109"></script>
<script src="js/javascripts/responsive.js?1500229109"></script>
<script src="js/javascripts/theme.js?1351450256"></script>
<script src="js/plugin_assets/redmine_checklists/javascripts/checklists.js?1500665867"></script>
</head>
<body class="theme-Schott controller-welcome action-index">

<div id="wrapper">
		<div class="flyout-menu js-flyout-menu">


			<div class="flyout-menu__search">
				<form action="/redmine/search" accept-charset="UTF-8" method="get">
					<input name="utf8" type="hidden" value="&#x2713;" /> <label
						class="search-magnifier search-magnifier--flyout"
						for="flyout-search">&#9906;</label> <input type="text" name="q"
						id="flyout-search" class="small js-search-input"
						placeholder="Busca" />
				</form>
			</div>

			<div class="flyout-menu__avatar flyout-menu__avatar--no-avatar">
				<a class="user active" href="#"></a>
			</div>


			<h3></h3>
			<span class="js-general-menu"></span> <span
				class="js-sidebar flyout-menu__sidebar"></span>

			<h3></h3>
			<span class="js-profile-menu"></span>

		</div>

<!-- <div id="wrapper2">
<div id="wrapper3"> -->
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
					<li><a class="register" href="br.schott.com.auth/auth-logout.php"> Sair <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
				</ul>
			</div>
		</div>

<div id="header">

    <a href="#" class="mobile-toggle-button js-flyout-menu-toggle-button"></a>


    <h1>Ficha de produto em processo</h1>
<div id="main-menu" class="tabs">
<ul>
    <li><a class="overview selected" href="#">Ficha de Produto em Processo</a></li>
    <li><a class="activity" href="br.schott.com.views/viewStatusPallet.php">Status</a></li>
</ul>
</div>
</div>



<div id="main" class="nosidebar">
    <div id="sidebar">
        
        
    </div>

     
     <div id="content">
        
        <h2>Buscar Ordem de Produção</h2>

<div class="splitcontentleft">
  <div class="wiki">
    <div id="login-form">
        
        
  <form  id="formSearch" method="post" target="_blank">
      
      <label for="order">Ordem de Produção</label>
      <input type="text" name="txt_search_order" id="txt_search_order" tabindex="1" autofocus="autofocus" maxlength="10">
    <!--   <label for="password">
        Senha
        <a class="lost_password" href="/redmine/account/lost_password">Perdi minha senha</a>
      </label>
      <input type="password" name="password" id="password" tabindex="2"> -->
      
      
     
      <input type="submit" name="btn_search_order" value="Buscar &#187;" onclick="SearchPido();" tabindex="1" id="btn_search_order">
  </form>
</div>
  </div>
  
</div>

<div class="splitcontentright">
  <div id="return_result" align="center"></div>
</div>


<link rel="stylesheet" media="all" href="css/sidebar_hide/stylesheets/sidebar_hide.css?1500665373">
<script src="css/sidebar_hide/javascripts/sidebar_hide.js?1500665373"></script>

        <div style="clear:both;"></div>
    </div>
<!-- </div>
</div> -->

<div id="ajax-indicator" style="display:none;"><span>Carregando...</span></div>
<div id="ajax-modal" style="display:none;"></div>

<div id="footer">
  <div class="bgl"><div class="bgr">
    Developed by <a href="http://www.schott.com/brazil/portuguese/">Schott Brasil</a> &copy; 2017-2017 Danilo Scipioni
  </div></div>
</div>
</div>
</div>



</body>


<!-- <body class="theme-Schott controller-account action-login"> -->
<!-- 	<div id="wrapper"> -->

<!-- 		<div class="flyout-menu js-flyout-menu"> -->


<!-- 			<div class="flyout-menu__search"> -->
<!-- 				<form action="/redmine/search" accept-charset="UTF-8" method="get"> -->
<!-- 					<input name="utf8" type="hidden" value="&#x2713;" /> <label -->
<!-- 						class="search-magnifier search-magnifier--flyout" -->
<!-- 						for="flyout-search">&#9906;</label> <input type="text" name="q" -->
<!-- 						id="flyout-search" class="small js-search-input" -->
<!-- 						placeholder="Busca" /> -->
<!-- 				</form> -->
<!-- 			</div> -->

<!-- 			<div class="flyout-menu__avatar flyout-menu__avatar--no-avatar"> -->
<!-- 				<a class="user active" href="#"></a> -->
<!-- 			</div> -->


<!-- 			<h3></h3> -->
<!-- 			<span class="js-general-menu"></span> <span -->
<!-- 				class="js-sidebar flyout-menu__sidebar"></span> -->

<!-- 			<h3></h3> -->
<!-- 			<span class="js-profile-menu"></span> -->

<!-- 		</div> -->
<!-- 		<div id="top-menu"> -->
		
		
<!-- 		<a href="index.php"> -->
<!-- 			<div class="glyphicon glyphicon-home"></div> -->
<!-- 		</a> -->
		
<!-- 			<div id="account"> -->
<!-- 				<ul> -->
				    <?//php if ($_SERVER['SERVER_NAME'] == 'localhost'){
// 				    $servidor = "Teste";
// 				    } else {$servidor = "Produção";}?>
<!-- 				    <li><b> Servidor:  <?//php echo $servidor?></b>&nbsp;&nbsp;</li>
					
					<li><b> Cracha:  </?//php echo $_SESSION['cd_user']?></b>&nbsp;&nbsp;</li>
					<li><b> Nome:   </?php echo $_SESSION['nm_user']?></b>&nbsp;&nbsp;</li>
					<li><b> Setor:   </?php echo $_SESSION['nm_setor']?></b>&nbsp;&nbsp;</li>
					<li><span class="glyphicon glyphicon-lock"></span>&nbsp;<b><?//php echo $_SESSION['fpp_desc_permission']?></b>&nbsp;&nbsp;</li>
<!-- 					<li><a class="register" href="br.schott.com.auth/auth-logout.php"> Sair <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li> -->
<!-- 				</ul> -->
<!-- 			</div> -->
		
<!-- 		</div> -->

<!-- 		<div id="header"> -->
		
<!-- 			<div class="mobile-toggle-button"></div> -->
<!-- 			<a href="auth/auth-logout.php"></a> -->
			
<!-- 			<h1>Ficha de Produto em Processo</h1> -->
			
<!-- 		</div> -->
<!-- 		<div id="main" class="nosidebar"> -->

 <!-- <//?php 

// if((trim($_SESSION['nm_setor'])  <> "Inbound & int. log.") && (trim($_SESSION['nm_setor'])  <> "Quality management")){ ?>

<!-- <div id="login-form"> -->
<!-- <form  id="formSearch" method="post" target="_blank">  -->
<!-- 				<table border="0" align="center" width="70%"> -->
<!-- 					<tr> -->
<!--						<td style="text-align: right;" width="39%">
<!-- 						<label for="order"><b>Ordem de Produ&ccedil;&atilde;o:</b></label> -->
<!-- 						</td> -->
						
<!--						<td style="text-align: left;" width="21%">
<!-- 						<input type="text" name="txt_search_order" id="txt_search_order" tabindex="1" autofocus="" maxlength="10" /> -->
<!-- 						</td> -->

<!--						<td style="text-align: left;" width="39%">
<!--						<input type="submit" name="btn_search_order" id="btn_search_order" value="Buscar &#187;" onclick="SearchPido();" tabindex="2" />
<!-- 						</td> -->
<!-- 					</tr> -->
<!-- 				</table> -->
<!--  </form>				  -->
<!-- 			</div> -->


<!-- <br> -->
<!-- <hr> -->
<!-- </?php }else{?>
<!-- <script> -->
<!-- $(document).ready(function() {
<!-- 	SearchReleasedPallets();
<!-- 	$("#liberados").focus();
<!-- })
<!-- </script> -->
<!-- <div id="login-form"> -->
<!--     <div id="main" class="nosidebar"> -->
<!--         <div align="center"> -->
<!--             <div class="btn-group" role="group" aria-label="..."> -->
<!--             <button onclick="SearchReleasedPallets();" type="button" id="liberados"   class="btn btn-default">Liberados</button>
<!--              <button onclick="SearchTransferredPallets();"type="button" class="btn btn-default">Transferidos</button>
<!--              <button onclick="SearchNotReleasedPallets();"type="button" class="btn btn-default">Não liberados</button>
<!--             </div> -->
<!--         </div> -->
<!--     </div> -->
<!-- </div> -->
<!-- </?php }?>
<!-- <!--  INICIO Exibicao do resultado da consulta --> 

<!-- 				<div id="return_result" align="center"></div>  -->
<!-- <!-- FIM --> 


			
<!-- 		</div> -->
<!-- 	</div> -->
<!-- </body> -->




<!-- <div id="footer"> -->
<!-- 	<div class="bgl"> -->
<!-- 		<div class="bgr"> -->
<!-- 			Developed by <a href="http://www.schott.com/brazil/portuguese/">Schott	Brasil</a> &copy; 2017-2017 Danilo Scipioni -->
<!-- 		</div> -->
<!-- 		<div class="bgr"> Version 1.1 </div> -->
<!-- 	</div> -->
<!-- </div> -->
</html>
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="js/SearchPido.js" type="text/javascript"></script>
