<div data-role="controlgroup">
  <?php if (!$running) { ?>
    <a href="<?php echo url_for('/start'); ?>" data-role="button">Start Trip</a>
  <?php } else { ?>
    <p style="font-size:1.3em">
      You have 1 trip running.
    </p>
    <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?><?php echo url_for('/complete'); ?>?id=<?php echo $details['id']; ?>" data-role="button">Complete Trip</a>
    <a href="<?php echo url_for('/stop'); ?>?id=<?php echo $details['id']; ?>" data-role="button">Stop and Restart</a>
  <?php } ?>
</div>
