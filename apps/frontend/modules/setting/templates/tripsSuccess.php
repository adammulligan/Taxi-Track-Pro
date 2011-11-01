<?php include_partial("header"); ?>

<script type="text/javascript">
$(document).ready(function(){
  $('#delete_trips').click(function(){
    $('#confirm_delete_trips').dialog('open');
  });

  $("#confirm_delete_trips").dialog({
    resizable: false,
    width:400,
    autoResize:true,
    modal: true,
    autoOpen:false,
    buttons: {
      'Yes, this is the only option.': function() {
          $(this).dialog('close');

          $("#spinner_delete_trips").toggle();

          $.get("<?php echo url_for('trip/deleteAllByAjax'); ?>",function(msg){
            $("#spinner_delete_trips").toggle();
            $('#success_delete_trips').fadeIn(300).delay(800).fadeOut(400);
          });
      },
      'No, please save me!': function() {
        $(this).dialog('close');
      }
    }
  });  
});
</script>

<h3>Export</h3>

Not yet!

<h3 style="color:#CC0000">Danger Zone</h3>

<p>
  <button type="submit" id="delete_trips" class="btn danger">Delete all trips</button>
  <img src="/images/spinner.gif" id="spinner_delete_trips" style="display:none" /> <span id="success_delete_trips" style="display:none">Deleted!</span>
</p>

<div id="confirm_delete_trips">
  Are you sure you wish to remove all logged trips?
</div>
