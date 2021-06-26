@extends('user.layouts.master')

@section('content')
<div class="user_consultation_calendar">

    <div class="user_calendar">
        <div class="top_calendar">
            <h5><i class="fas fa-calendar-plus fa-1x"></i> Nouveaux consultation</h5>
            <form action="/rendez_vous/{{session('patient')}}" method="POST" class="form_calendar">
                @csrf
                <input type="text" id="calendar-date" name="calendar_date" data-large-mode="true" data-lang="fr" data-min-year="2021">
                <input type="submit" name="new-consultation" id="btn-consultation" value="Valider">
            </form>
        </div>
        <div class="left_calendar">
            <h5 class="text-center"><i class="fas fa-history fa-1x"></i> Historique de Consultation</h5>
            <div class="table_consultation">
                <table class="table_calendar">

                    @foreach($rendezvous as $rendez)
                    <tr>
                        <td>Consultation Le {{$rendez->date_rendezvous}}</td>
                    </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
    <div class="calendrier" id="calendrier">

    </div>
</div>
<script src="{{asset('js/dycalendar.js')}}"></script>
<script>
    $("#calendar-date").dateDropper({
        animate: 'true',
        lang: 'fr',
        minYear: 2020,
        theme: 'leaf'
    });

    dycalendar.draw({
        target: '#calendrier',
        type: 'month',
        dayformat: 'full',
        mouthformat: 'full',
        highlighttargetdate: true,
        prevnextbutton: 'show',


    });

    $('.form_calendar').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {

            },
            success: function(data) {
                //$('.form_calendar')[0].reset();
                if (data => status == 1) {
                    Swal.fire(
                        'Rendez vous a été créé avec succès!',
                        'On va vous appeler on quelque minute',
                        'success'
                    )
                } else {
                    Swal.fire(
                        'Le rendez vous n a pas été créé!',
                        'ressayer plus tard!',
                        'error'
                    )

                }


            },


        });
    });
</script>
@endsection