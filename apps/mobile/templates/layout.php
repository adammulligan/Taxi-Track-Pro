<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<?php include_title() ?>
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
</head> 
<body> 
<div data-role="page" id="jqm-home" class="type-home"> 
	<div data-role="content"> 
    <div class="content-secondary"> 
      <div class="topbar-wrapper"> 
        <div class="topbar"> 
          <div class="fill"> 
			      <div id="jqm-homeheader" class="container"> 
    			  	<h1>TaxiTrack Pro</h1> 
            </div><!--/container-->		
          </div><!--/fill-->
        </div><!--topbar-->
      </div><!--topbar-wrapper-->
    </div><!--content-sec-->
    <div class="content-primary">
      <?php echo $sf_content ?>
    </div>
	</div> 
	<div data-role="footer" class="footer-docs" data-theme="c" style="text-align:center"> 
			<a href="http://taxi.cyanoryx.com/">View full site</a>
	</div>	
</div> 
</body> 
</html> 
