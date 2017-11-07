<html lang="pt-BR"><head>
<!-- <meta charset="utf-8"> -->
<!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
<!-- <title>SCHOTT - FPP</title> -->
<!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> -->
<!-- <meta name="description" content="Redmine"> -->
<!-- <meta name="keywords" content="issue,bug,tracker"> -->
<!-- <meta name="csrf-param" content="authenticity_token"> -->
<!-- <meta name="csrf-token" content="BWtd3OPvQzwhjTPErwLxHzeDH8SyM9PvSmXTNhVdaKAYygJ3VdE7EnOraA45QqU5qsDZHAWcSnu1W2QKz1+CQw=="> -->
<!-- <link rel="shortcut icon" href="../Images/fpp.png"> -->
<!-- <link rel="stylesheet" media="all" href="../css/stylesheets/jquery/jquery-ui-1.11.0.css?1500229109"> -->
<!-- <link rel="stylesheet" media="all" href="../css/themes/schott/stylesheets/application.css?1412685099"> -->

<!-- <link rel="stylesheet" media="all" href="../css/stylesheets/responsive.css?1500229109"> -->

<!-- <script src="../js/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js?1500229109"></script> -->
<!-- <script src="../js/javascripts/application.js?1500229109"></script> -->
<!-- <script src="../js/javascripts/responsive.js?1500229109"></script> -->
<!-- <script src="../css/themes/schott/javascripts/theme.js?1351450256"></script> -->
<!-- <!-- page specific tags --> 

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SCHOTT - FPP</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="Redmine">
<meta name="keywords" content="issue,bug,tracker">
<meta name="csrf-param" content="authenticity_token">
<meta name="csrf-token" content="BWtd3OPvQzwhjTPErwLxHzeDH8SyM9PvSmXTNhVdaKAYygJ3VdE7EnOraA45QqU5qsDZHAWcSnu1W2QKz1+CQw==">
<link rel="shortcut icon" href="../Images/fpp.png">
<link rel="stylesheet" media="all" href="../css/stylesheets/jquery/jquery-ui-1.11.0.css?1500229109">
<link rel="stylesheet" media="all" href="../css/themes/schott/stylesheets/application.css?1412685099">

<link rel="stylesheet" media="all" href="../css/stylesheets/responsive.css?1500229109">

<script src="../js/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js?1500229109"></script>
<script src="../js/javascripts/application.js?1500229109"></script>
<script src="../js/javascripts/responsive.js?1500229109"></script>
<script src="../js/javascripts/theme.js?1351450256"></script>
<script src="../js/plugin_assets/redmine_checklists/javascripts/checklists.js?1500665867"></script>
</head>
<body class="theme-Schott controller-account action-login">

<div id="wrapper">

<div class="flyout-menu js-flyout-menu">


    <h3>Geral</h3>
    <span class="js-general-menu"></span>

    <span class="js-sidebar flyout-menu__sidebar"></span>

    <h3>Perfil</h3>
    
</div>

<div id="wrapper2">
<div id="wrapper3">
<div id="top-menu">
    <div id="account">
            </div>
    
    </div>

<div id="header">

    <a href="#" class="mobile-toggle-button js-flyout-menu-toggle-button"></a>


    <h1>Ficha de produto em processo</h1>

</div>

<div id="main" class="nosidebar">
    <div id="sidebar">
        
        
    </div>

    <div id="content">
        
      <?php if(isset($_GET['erro'])){?>
        <div class="flash error" id="flash_error">Funcionário não existe</div>
      <?php }?>  

<div id="login-form">
        
        
  <form  action="auth-id_validation.php" accept-charset="UTF-8" method="POST">
      
      <label for="cracha">Crachá</label>
      <input type="text" name="cracha" id="cracha" tabindex="1" autofocus="autofocus">
      
    <!--   <label for="password">
        Senha
        <a class="lost_password" href="/redmine/account/lost_password">Perdi minha senha</a>
      </label>
      <input type="password" name="password" id="password" tabindex="2"> -->
      
      
      
      <input type="submit" name="login" value="Entrar" tabindex="5" id="login-submit">
  </form>
</div>

        <link rel="stylesheet" media="all" href="../css/plugin_assets/sidebar_hide/stylesheets/sidebar_hide.css?1500665373">
<script src="../js/javascripts/sidebar_hide.js?1500665373"></script>


        <div style="clear:both;"></div>
    </div>
</div>
</div>

<div id="ajax-indicator" style="display:none;"><span>Carregando...</span></div>
<div id="ajax-modal" style="display:none;"></div>

<div id="footer">
  <div class="bgl"><div class="bgr">
    Developed by <a href="http://www.schott.com/brazil/portuguese/">Schott Brasil</a> &copy; 2017-2017 Danilo Scipioni
  </div></div>
</div>
</div>
</div>



</body></html>
<!-- 
<!DOCTYPE html>
//<?//php header('Content-type: text/html; charset=ISO-8859-1');?>
<html lang="en">
<head>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Redmine</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="Redmine">
<meta name="keywords" content="issue,bug,tracker">
<meta name="csrf-param" content="authenticity_token">
<meta name="csrf-token" content="BWtd3OPvQzwhjTPErwLxHzeDH8SyM9PvSmXTNhVdaKAYygJ3VdE7EnOraA45QqU5qsDZHAWcSnu1W2QKz1+CQw==">
<link rel="shortcut icon" href="/redmine/favicon.ico?1500229109">
<link rel="stylesheet" media="all" href="/redmine/stylesheets/jquery/jquery-ui-1.11.0.css?1500229109">
<link rel="stylesheet" media="all" href="../css/themes/schott/stylesheets/application.css?1412685099">
<link rel="stylesheet" media="all" href="../css/themes/schott/stylesheets/responsive.css?1500229109">

<script src="/redmine/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js?1500229109"></script>
<script src="/redmine/javascripts/application.js?1500229109"></script>
<script src="/redmine/javascripts/responsive.js?1500229109"></script>
<script>
//<![CDATA[
$(window).load(function(){ warnLeavingUnsaved('A página atual contém texto que não foi salvo e será perdido se você sair desta página.'); });
//]]>
</script>
<script src="/redmine/themes/schott/javascripts/theme.js?1351450256"></script>
<script src="/redmine/plugin_assets/redmine_checklists/javascripts/checklists.js?1500665867"></script><link rel="stylesheet" media="screen" href="/redmine/plugin_assets/redmine_checklists/stylesheets/checklists.css?1500665867">
<!-- page specific tags
</head>
</head>
<body class="theme-Schott controller-account action-login">
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
		<div id="top-menu">
			<div id="account">
				<ul>
					<li><a class="register" href="#"></a></li>
				</ul>
			</div>

		</div>

		<div id="header">

			<div class="mobile-toggle-button"></div>
			<h1>Login</h1>
		</div>
		<div id="main" class="nosidebar">

      &nbsp;      
      <//?php// if(isset(_GET['erro'])){?>
        <div id='return-information' class='alert alert-warning'>Funcionario
				nao existe!</div>
      <//?php// }?>
      
<div id="content">       -->
<!-- <div id="login-form"> -->
<!-- 				<form id="login-form" action="auth-id_validation.php" -->
<!-- 					method="POST"> -->
<!-- 					<table border="0" align="center"> -->
<!-- 						<tr> -->
<!-- 							<td style="text-align: right;"><label for="order">Cracha:</label>
<!-- 							</td> -->
<!-- 							<td style="text-align: center;"><input type="text" name="txt_id"
<!-- 								id="txt_id" tabindex="1" autofocus="" required="" -->
<!-- 								autocomplete="off" /></td> -->
<!-- 							<td style="text-align: center;"><input type="submit"
<!-- 								name="btn_login" id="btn_login" tabindex="2" -->
<!-- 								value="Entrar &#187;" /></td> -->
<!-- 						</tr> -->

<!-- 					</table> -->
<!-- 				</form> -->
<!-- 			</div> -->
<!-- </div> 

<div id="main" class="nosidebar">
    <div id="sidebar"></div>

    <div id="content">

			<div id="login-form">
				  <form onsubmit="return keepAnchorOnSignIn(this);" action="/redmine/login" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="BWtd3OPvQzwhjTPErwLxHzeDH8SyM9PvSmXTNhVdaKAYygJ3VdE7EnOraA45QqU5qsDZHAWcSnu1W2QKz1+CQw==">
				  <input type="hidden" name="back_url" value="http://sbrsaos0010:85/redmine/">
				  
				  <label for="username">Usuário</label>
				  <input type="text" name="username" id="username" tabindex="1">
				  
				  <label for="password">
					Senha
					<a class="lost_password" href="/redmine/account/lost_password">Perdi minha senha</a>
				  </label>
				  <input type="password" name="password" id="password" tabindex="2">
				  
				  
				  
				  <input type="submit" name="login" value="Entrar" tabindex="5" id="login-submit">
				</form>
			</div>
			<script>
			//<![CDATA[
			$('#username').focus();
			//]]>
			</script>

        <link rel="stylesheet" media="all" href="/redmine/plugin_assets/sidebar_hide/stylesheets/sidebar_hide.css?1500665373">
<script src="/redmine/plugin_assets/sidebar_hide/javascripts/sidebar_hide.js?1500665373"></script>


        <div style="clear:both;"></div>
    </div>
</div>




			<br>
			<div id="return_result"></div>


		</div>
	</div>
</body>
<div id="footer">
	<div class="bgl">
		<div class="bgr">
			Developed by <a href="http://www.schott.com/brazil/portuguese/">Schott
				Brasil</a> &copy; 2017-2017 Danilo Scipioni
		</div>
		<div class="bgr"> Version 1.2 </div>
	</div>
</div>
</html>
<script src="js/MachineSetup.js" type="text/javascript"></script>
<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>

<!--////////////////////////////////////////////////////////////// -->