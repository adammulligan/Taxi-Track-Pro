<?php if (isset($trip)) { ?>
<script type="text/javascript">
$(document).ready(function(){
  $('#confirm_delete_trip').dialog({
    resizable: false,
    width:400,
    autoResize:true,
    modal: true,
    autoOpen:false,
    buttons: {
      'It must be done.': function() {
          $(this).dialog('close');

          window.location='<?php echo url_for('trip/delete'); ?>?id=<?php echo $trip->getId(); ?>';
        },
      'No, save the innocent trip!': function() {
        $(this).dialog('close');
      }
    }
  });

  $('#delete_trip').click(function(){
    $('#confirm_delete_trip').dialog('open');
  });
});
</script>
<style type="text/css">
th {
  margin:0 !important;padding:0 !important;
}
</style>
		<ul style="list-style-type:none;"> 
      <li>
        <?php echo date("d/m/Y H:i",strtotime($trip->getStartTime())); ?> - <?php echo date("d/m/Y H:i",strtotime($trip->getEndTime())); ?>
      </li>
      <li>
        <h3>Earnings</h3>
        <p><?php echo sprintf("£%01.2f",$trip->getEarnings()); ?></p>
      <li> 
        <table style="width:280px">
        <tr>
          <th><h3>End Miles</h3></th>
          <th><h3>Start Miles</h3></th>
          <th><h3>Total</h3></th>
        </tr>
        <tr>
          <td><?php echo sprintf("%01.2f mi", $trip->getEndMiles()); ?></td>
          <td><?php echo sprintf("%01.2f mi", $trip->getStartMiles()); ?></td>
          <td><?php echo sprintf("%01.2f mi", $trip->getEndMiles()-$trip->getStartMiles()); ?></td>
        </tr>
        </table>
			</li> 
      <li> 
        <table style="width:400px">
        <tr>
          <th><h3>Fuel Paid For</h3></th>
          <th><h3>/</h3></th>
          <th><h3>Fuel Cost</h3></th>
          <th><h3>=</h3></th>
          <th><h3>Litres Bought</h3></th>
        </tr>
        <tr>
          <td><?php echo sprintf("£%01.2f", $trip->getFuelPaidFor()); ?></td>
          <td>/</td>
          <td><?php echo sprintf("%01.2f p/L", $trip->getFuelCost()); ?></td>
          <td>=</td>
          <td><?php echo sprintf("%01.2f L",$trip->getFuelPaidFor()/($trip->getFuelCost()/100)); ?></td>
        </tr>
        </table>
      </li> 
      <li> 
        <h3>Journey Count</h3> 
        <p><?php echo $trip->getJourneyCount(); ?></p>
			</li> 
			<li> 
				<h3>Comments</h3> 
        <p><?php echo $trip->getComments(); ?></p> 
			</li> 
      <li>
        <h3 style="color:#CC0000">Danger Zone</h3>
        <button type="submit" id="delete_trip" class="btn danger">Delete</button> <button type="submit" onClick="window.location='http://mob.<?php echo $_SERVER['HTTP_HOST']."/complete?id=".$trip->getId(); ?>'" id="edit_trip" class="btn">Edit</button>
      </li>
    </ul> 
<div id="confirm_delete_trip">
  Are you sure you wish to delete this trip?
</div>
<?php
} else {
?>
<h1>Trip not complete</h1>

Visit the <a href="http://mob.<?php echo $_SERVER["HTTP_HOST"]; ?>">mobile site</a> to complete the trip, or delete it.
<?php
}
?>
