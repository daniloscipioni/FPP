<html lang="pt-BR"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>SCHOTT - FPP</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="description" content="Redmine">
<meta name="keywords" content="issue,bug,tracker">
<meta name="csrf-param" content="authenticity_token">
<meta name="csrf-token" content="BWtd3OPvQzwhjTPErwLxHzeDH8SyM9PvSmXTNhVdaKAYygJ3VdE7EnOraA45QqU5qsDZHAWcSnu1W2QKz1+CQw==">
<link rel="shortcut icon" href="../Images/fpp.png">
<link rel="stylesheet" media="all" href="../css/stylesheets/jquery/jquery-ui-1.11.0.css?<?php echo time();?>">
<link rel="stylesheet" media="all" href="../css/themes/schott/stylesheets/application.css?<?php echo time();?>">
<link rel="stylesheet" media="all" href="../css/stylesheets/responsive.css?<?php echo time();?>">
<script src="../js/javascripts/jquery-1.11.1-ui-1.11.0-ujs-3.1.4.js?<?php echo time();?>"></script>
<script src="../js/javascripts/application.js?<?php echo time();?>"></script>
<script src="../js/javascripts/responsive.js?<?php echo time();?>"></script>
<script src="../js/javascripts/theme.js?<?php echo time();?>"></script>
<script src="../js/plugin_assets/redmine_checklists/javascripts/checklists.js?<?php echo time();?>"></script>
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
  <div class="bgl">
  	<div class="bgr">
    Developed by <a href="http://www.schott.com/brazil/portuguese/">Schott Brasil</a> &copy; 2017-2017 Danilo Scipioni
  	</div>
  	<div class="bgr">
   	Versão 1.0
   </div>
  </div>
</div>
</div>
</div>


</body>

</html>
