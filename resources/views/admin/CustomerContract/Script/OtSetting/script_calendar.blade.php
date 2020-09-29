<script>
$(document).ready(function(){
    !function($) {
        "use strict";
        var CalendarApp = function() {
            this.$body = $("body")
            this.$calendar = $('#calendar'),
            this.$event = ('#calendar-events div.calendar-events'),
            this.$categoryForm = $('#add-new-event form'),
            this.$extEvents = $('#calendar-events'),
            this.$modal = $('#my-event'),
            this.$saveCategoryBtn = $('.save-category'),
            this.$calendarObj = null
          };

        CalendarApp.prototype.enableDrag = function() {
            //init events
            $(this.$event).each(function () {
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
        }

        /* Initializing */
        CalendarApp.prototype.init = function() {
            this.enableDrag();
            /*  Initialize the calendar  */
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            var form = '';
            var defaultEvents =  [
                @foreach($holiday_calendars as $val)
                {
                  title: "{{$val['title']}}",
                  start: "{{$val['start']}}",
                  className: "bg-danger",
                  uid: "{{$val['id']}}"
                },
                @endforeach
            ];
            var $this = this;
            $this.$calendarObj = $this.$calendar.fullCalendar({
                slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
                minTime: '08:00:00',
                maxTime: '19:00:00',
                defaultView: 'month',
                defaultDate: '{{$holiday_date}}',
                handleWindowResize: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                },
                events: defaultEvents,
                eventClick: function(calEvent, jsEvent, view) {
                    var id = calEvent.uid;
                    $('#show_timesheet_holiday_calendar_year').text('');
                    $('#show_timesheet_holiday_calendar_date').text('');
                    $('#show_timesheet_holiday_calendar_name').text('');
                    $('#show_timesheet_holiday_calendar_details').text('');
                    $('#show_timesheet_holiday_calendar_status').text('');
                    $.ajax({
                        method: "GET",
                        url: url_gb+"/admin/TimesheetHolidayCalendar/"+id,
                    }).done(function(res) {
                        var data = res.content;
                        $('#show_timesheet_holiday_calendar_year').text(data.timesheet_holiday_calendar_year);
                        $('#show_timesheet_holiday_calendar_date').text(data.format_imesheet_holiday_calendar_date);
                        $('#show_timesheet_holiday_calendar_name').text(data.timesheet_holiday_calendar_name);
                        $('#show_timesheet_holiday_calendar_details').text(data.timesheet_holiday_calendar_details);
                        if(data.timesheet_holiday_calendar_status == 1){
                            status = 'Active';
                        }else{
                            status = 'No Active';
                        }
                        $('#show_timesheet_holiday_calendar_status').text(status);
                        $('#ModalViewHoliday').modal('show');
                    }).fail(function(res) {
                        swal("โอ๊ะโอ! เกิดข้อผิดพลาด", res.content, 'error');
                    });
                }
            });
        },
        //init CalendarApp
        $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp
    }
    (window.jQuery),

    //initializing CalendarApp
    function($) {
        "use strict";
        $.CalendarApp.init()
    }
    (window.jQuery);
});
</script>
