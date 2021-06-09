
var start_ = null;
var end_ = null;
var cin_ = null;
var type_ = null;
var calendar = null;
$(document).ready(function () {



    calendar = $('#calendar').fullCalendar({
        header: {
            right: 'prev,next today',
            left: 'title',
            center: 'agendaDay,agendaWeek,month'
        },
        fixedWeekCount: false,
        views: {
            // format title 
            week: {
                titleFormat: 'MMM YYYY ',
                columnFormat: "ddd D",
            },
            month: {
                titleFormat: 'MMM YYYY '
            },
            day: {
                titleFormat: 'MMM YYYY ',
                columnFormat: "dddd  D",
            },

        },
        buttonText: {
            today: 'aujourd\'hui',
            day: 'jour',
            week: 'semaine',
            month: 'mois'
        },
        hiddenDays: [0],   //hiden Sunday 
        showNonCurrentDates: false,  // 
        slotDuration: '00:15:00',
        slotLabelFormat: "HH:mm",
        defaultView: 'agendaWeek',
        allDaySlot: false,
        minTime: "08:00:00",
        maxTime: "17:00:00",
        events: '../controller/rendezvous-controller.php?action=load',
        selectable: true,
        selectHelper: true,
        monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avr.', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
        dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
        dayNamesShort: ['Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam'],
        select: function (start, end, allDay) {
            $('#modal-sections').addClass('uk-open').show();
            start_ = start;
            end_ = end;



        },
        editable: true,
        eventResize: function (event) {

            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
       
            var id = event.id;
            $.ajax({
                url: "../controller/rendezvous-controller.php?action=update",
                type: "POST",
                data: {
                    ID_RENDEZ: id ,   
                    start_event: start,
                    end_event: end
                },
                success: function () {
                    calendar.fullCalendar('refetchEvents');
                     
                    UIkit.notification({ message: 'Event Updated', status: 'success', timeout: 1000 });
                }
            })
        },

        eventDrop: function (event) {
            
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
             
            var id = event.id;
            $.ajax({
                url: "../controller/rendezvous-controller.php?action=update",
                type: "POST",
                data: {
                    ID_RENDEZ: id ,   
                    start_event: start,
                    end_event: end
                    
                },
                success: function (data) {
                    console.log(data);
                    calendar.fullCalendar('refetchEvents');
                     
                    UIkit.notification({ message: 'Event Updated', status: 'success', timeout: 1000 });
                }
            });
        },
        

        eventClick: function (event) {

            UIkit.modal.confirm('Are you sure you want to remove '+event.title +" ?").then(()=>{
                //click ok
                 var id = event.id;
                 
                $.ajax({
                    url: "../controller/rendezvous-controller.php?action=delete",
                    type: "POST",
                    data: {
                        ID_RENDEZ: id
                    },
                    success: function (data) {
                        console.log(data);
                        calendar.fullCalendar('refetchEvents');

                        UIkit.notification({ message: 'Event Removed...', status: 'danger', timeout: 1000 });
                    }
                });

            },
            function(){
                // click cancel
                

            }
            
            ) ;
                 
               
              
               
                 
 
        },

    });

    


    $('.uk-close').on('click', function () {

        $('#modal-sections').removeClass('uk-open').hide();
    });

    $('.uk-save').on('click', function () {
        
        $('#modal-sections').removeClass('uk-open').hide();

        cin_ = $('#cin').val();
        type_ = $('.uk-form-controls input[type="radio"]:checked').val();
        ajouteRen(type_, cin_);

    });

    //romove scroll 
    $('tbody .fc-scroller').css({'color':'red','height':  "1000vh"});


});


function ajouteRen(type, cin) {

    if (cin.trim().length) {

        var start = $.fullCalendar.formatDate(start_, "Y-MM-DD HH:mm:ss");
        var end = $.fullCalendar.formatDate(end_, "Y-MM-DD HH:mm:ss");
        $.ajax({
            url: "../controller/rendezvous-controller.php?action=insert",
            type: "POST",
            data: {
                CIN: cin,
                ID_RECEPTION: 1,
                ID_RENDEZ: null,
                start_event: start,
                end_event: end,
                TYPE: type
            },
            success: function (data) {

                if (data != "Erreur") {
                    calendar.fullCalendar('refetchEvents');
                    UIkit.notification({ message: 'Added Successfully...', status: 'success', timeout: 1000 });
                }
                else {
                    UIkit.notification({ message: 'Cin introvable ', status: 'warning', timeout: 1000 });

                }

            }
        })
    }


}