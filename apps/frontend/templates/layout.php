<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>TaxiTrack Pro</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" href="/css/style.css">
  <link rel='stylesheet' type='text/css' href='/css/fullcalendar.css' />
  <link rel='stylesheet' type='text/css' href='/css/fullcalendar.print.css' media='print' />
  <link rel='stylesheet' type='text/css' href='/css/black-tie/jquery-ui-1.8.16.custom.css' />
  <?php include_stylesheets() ?>
  <!-- end CSS-->

  <script src="/js/libs/modernizr-2.0.6.min.js"></script>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="/js/libs/jquery-1.6.2.min.js"><\/script>')</script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>

  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="/js/plugins.js"></script>
  <script defer src="/js/script.js"></script>
  <?php include_javascripts() ?>
  <!-- end scripts-->

  <!--[if lt IE 7 ]>
    <script src="http://ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
</head>

<body>

  <div id="container">
    <header>
    <div class="topbar-wrapper" style="z-index: 5;"> 
    <div class="topbar"> 
      <div class="fill"> 
        <div class="container"> 
          <h3><a href="/">TaxiTrack Pro</a></h3> 
          <ul> 
            <li><a href="/">Home</a></li>
            <li><a href="<?php echo url_for('stats'); ?>">Stats</a></li> 
            <li><a href="<?php echo url_for('settings'); ?>">Settings</a></li>
          </ul> 
          <ul class="nav secondary-nav"> 
            <?php if (sfContext::getInstance()->getUser()->isAuthenticated()) { ?>
              <li><a href="<?php echo url_for('sfGuardAuth/signout'); ?>">Logout</a></li>
            <?php } ?>
            <li><img src="/images/icon_small.png" style="margin-top:4px;"/></li> 
          </ul> 
        </div> 
      </div><!-- /fill --> 
    </div><!-- /topbar --> 
  </div><!-- /topbar-wrapper --> 
    </header>
    <div id="main" role="main">
      <?php echo $sf_content ?>
    </div>
    <footer>

    </footer>
  </div> <!--! end of #container -->
</body>
</html>


