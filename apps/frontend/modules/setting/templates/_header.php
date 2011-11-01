<?php 
  $tabs = array();
  $tabs[$sf_context->getActionName()] = " class=\"active\"";
?>

<ul class="tabs">
<li<?php if (isset($tabs['user'])) echo $tabs['user']; ?>><a href="<?php echo url_for('settings'); ?>">User</a></li>
  <li<?php if (isset($tabs['security'])) echo $tabs['security']; ?>><a href="<?php echo url_for('setting/security'); ?>">Password</a></li>
  <li<?php if (isset($tabs['trips'])) echo $tabs['trips']; ?>><a href="<?php echo url_for('setting/trips'); ?>">Trips</a></li>
</ul>
