 <style>
.fc table {
	margin-top:0px !important;
	margin-bottom: 0 !important;
}
.fc thead {
    color: inherit !important;
}
.fc-event a, a:link, a:visited, a:active {
    color: #fff;
}
.fc-more a{
	color: #337ab7;
}
 </style>
<script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prevYear,nextYear prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},		
			eventLimit: true, // allow "more" link when too many events
			events: <?php echo $json; ?> 
		});
		
    		$("a.fc-event").attr("target", "_blank");
	});

</script>
<div class="container">
<div class="col-lg-12">
<div class="sources view">
<div class="row meeting-tittle">
<div class="col-lg-6 col-sm-6"><h3><?php echo __('My All Lead Actions'); ?></h3> </div>
</div>
</div>
<div class="col-lg-12">
<div id='calendar'></div>
</div>
</div>
</div>