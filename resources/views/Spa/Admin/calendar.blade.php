@extends('Spa.Admin.admin')

@section('title')
   <title>ELUV - Calendar</title>
@endsection

@section('pageContents')

      <div class="header bg-primary pb-6">
         <div class="container-fluid">
            <div class="header-body">
               <div class="row align-items-center py-4">
                  <div class="col-lg-6 col-7">
                     <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                     <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                        <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Lịch</a></li>
                     </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- full calendar -->
      <div class="container-fluid">
         <div id='wrap' class="mb-4">
            <div id='calendar'></div>
            <div style='clear:both'></div>
         </div>
         <!-- Footer -->
         <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
               <div class="col-lg-6">
                  <div class="copyright text-center  text-lg-left  text-muted">
                  &copy; 2020 <a style="color: #ff3366;" href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">ELUV</a>
                  </div>
               </div>
               <div class="col-lg-6">
                  <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                  <li class="nav-item">
                     <a href="https://www.creative-tim.com" class="nav-link" target="_blank">ELUV</a>
                  </li>
                  <li class="nav-item">
                     <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                  </li>
                  <li class="nav-item">
                     <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                  </li>
                  <li class="nav-item">
                     <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                  </li>
                  </ul>
               </div>
            </div>
         </footer>  
      </div>
     
@endsection

@section('css')
<!-- Full Calendar CSS -->
<link href='/fullcalendar/assets/css/fullcalendar.css' rel='stylesheet' />
<link href='/fullcalendar/assets/css/fullcalendar.print.css' rel='stylesheet' media='print' />
<style>
   #wrap 
   {  
      
		width: 1100px;
		margin: 0 auto;
	}
   #external-events 
   {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
	}
   #external-events h4 
   {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
	}
   .external-event 
   { 
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
	}
   #external-events p
   {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}

   #external-events p input 
   {
		margin: 0;
		vertical-align: middle;
	}
   #calendar 
   {
      margin: 0 auto;
		width: 1100px;
		background-color: #FFFFFF;
		border-radius: 6px;
      box-shadow: 0 1px 2px #C3C3C3;
      color: black !important;
	}
</style>
@endsection

@section('script')
<!-- Full Calendar JS -->
<script src='/fullcalendar/assets/js/jquery-ui.custom.min.js' type="text/javascript"></script>
<script src='/fullcalendar/assets/js/fullcalendar.js' type="text/javascript"></script>
<script>
	$(document).ready(function() {
	   var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		/*  className colors

		className: default(transparent), important(red), chill(pink), success(green), info(blue)

		*/


		/* initialize the external events
		-----------------------------------------------------------------*/

		$('#external-events div.external-event').each(function() {

			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});


		/* initialize the calendar
		-----------------------------------------------------------------*/

		var calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'agendaDay,agendaWeek,month',
				right: 'prev,next today'
			},
			editable: true,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: true,
			defaultView: 'month',

			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,
			select: function(start, end, allDay) {
				var title = prompt('Event Title:');
				if (title) {
					calendar.fullCalendar('renderEvent',
						{
							title: title,
							start: start,
							end: end,
							allDay: allDay
						},
						true // make the event "stick"
					);
				}
				calendar.fullCalendar('unselect');
			},
			droppable: true, // this allows things to be dropped onto the calendar !!!
			drop: function(date, allDay) { // this function is called when something is dropped

				// retrieve the dropped element's stored Event Object
				var originalEventObject = $(this).data('eventObject');

				// we need to copy it, so that multiple events don't have a reference to the same object
				var copiedEventObject = $.extend({}, originalEventObject);

				// assign it the date that was reported
				copiedEventObject.start = date;
				copiedEventObject.allDay = allDay;

				// render the event on the calendar
				// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
				$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}

			},

			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false,
					className: 'info'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false,
					className: 'info'
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false,
					className: 'important'
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false,
					className: 'important'
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false,
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/',
					className: 'success'
				}
			],
		});


	});

</script>
@endsection