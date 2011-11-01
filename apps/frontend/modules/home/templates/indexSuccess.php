<script type="text/javascript">
	$(document).ready(function() {
		$('#calendar').fullCalendar({
      header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
      selectable: true,
			selectHelper: true,
			editable: false,
      events: "<?php echo url_for('/trips'); ?>",
      eventClick: function(calEvent, jsEvent, view) {
        window.location="<?php echo url_for('/trip')."?id=";?>"+calEvent.id;
      },
      eventDrop: function(event, delta) {
				alert(event.title + ' was moved ' + delta + ' days\n' +
					'(should probably update your database)');
			},
      viewDisplay: function(view) {
        var start = new Date(view.start);
        var end   = new Date(view.end);

        var full_start = (start.getMonth()+1)+"/"+start.getDate()+"/"+start.getFullYear();
        var full_end   = (end.getMonth()+1)+"/"+end.getDate()+"/"+end.getFullYear();
        $.ajax({
          url:'/stats/earnings',
          data: {
            start: full_start,
            end: full_end
          },
          success: function(m) {
            $('#earnings').text(m.earnings.toFixed(2));
          }
        });

        $.ajax({
          url:'/stats/mileage',
          data: {
            start: full_start,
            end: full_end
          },
          success: function(m) {
            $('#mileage').text(m.mileage.toFixed(2));
          }
        });

        if (view.name=='month') {
          $('#period').text((view.start.getMonth()+1)+"/"+view.start.getFullYear());
        } else if (view.name=='agendaWeek') {
          $('#period').text(start.getDate()+"/"+(start.getMonth()+1)+" - "+(end.getDate()-1)+"/"+(end.getMonth()+1));
        } else if (view.name=='agendaDay') {
          $('#period').text(start.getDate()+"/"+(start.getMonth()+1));
        }
      }
		});
	});
</script>

<style type='text/css'>

	#calendar {
		margin: 0 auto;
		}

</style>


<div id="stats">
<h3><span id="period">August</span> earnings: £<span id="earnings"></span>; mileage: <span id="mileage"></span> mi</h3>
</div>
<div id="calendar"></div>
