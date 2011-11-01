<link rel="stylesheet" href="/css/jquery.ui.datepicker.mobile.css" />
<script src="/js/jQuery.ui.datepicker.js"></script> 
	<script src="/js/jquery.ui.datepicker.mobile.js"></script> 
<script type="text/javascript">
  $(document).ready(function() {
    $("form").bind("keypress", function(e) {
      if (e.keyCode == 13) {
        return false;
      }
    });
  }); 
</script>
<div data-role="controlgroup">
<form method="post">
  <input type="hidden" name="trip_id" id="trip_id" value="<?php echo $trip->getId(); ?>" />
  <div data-role="fieldcontain">
    <label for="date">End Date:</label>
    <input type="text" name="end_date" id="end_date" value="<?php echo date("Y-m-d"); ?>" />
  </div>
  <div data-role="fieldcontain">
    <label for="name">End Time:</label>
    <input type="text" name="end_time" id="end_time" value="<?php echo date("G:i"); ?>"  />
  </div>
  <div data-role="fieldcontain">
    <label for="name">Start Mileage:</label>
    <input type="text" name="start_miles" id="start_miles" value="<?php echo $trip->getStartMiles(); ?>"  />
  </div>
  <div data-role="fieldcontain">
    <label for="name">End Mileage:</label>
    <input type="text" name="end_miles" id="end_miles" value=""  />
  </div>
  <div data-role="fieldcontain">
    <label for="name">Fuel - Cost per litre (pence):</label>
    <input type="text" name="fuel_cost" id="fuel_cost" value=""  />
  </div>
  <div data-role="fieldcontain">
    <label for="name">Fuel - Amount spent (£)</label>
    <input type="text" name="fuel_paid_for" id="fuel_paid_for" value=""  />
  </div>
  <div data-role="fieldcontain">
    <label for="name">Number of Journeys:</label>
    <input type="text" name="journey_count" id="journey_count" value=""  />
  </div>
  <div data-role="fieldcontain">
    <label for="name">Earnings (£):</label>
    <input type="text" name="earnings" id="earnings" value=""  />
  </div>
  <div data-role="fieldcontain">
    <label for="name">Comments:</label>
    <textarea name="comments" id="comments"></textarea>
  </div>
  <div data-role="fieldcontain">
    <button type="reset" onClick="javascrip:window.location='/';">Cancel</button>
    <button type="submit">Submit</button>
  </div>
</form>
</div>
