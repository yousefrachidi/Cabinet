@extends('layouts.master')

@section('content')
<div class="user_consultation_calendar">
    <div class="user_links">
        <a class="user-link" href="/user"><i class="fas fa-chart-pie"></i></a>
        <a class="user-link" href="/consultation"><i class="fas fa-calendar-alt"></i></a>
        <a class="user-link" href="/profile"><i class="fas fa-user-cog"></i></a>
        <a class="user-link" href=""><i class="fas fa-sign-out-alt"></i></a>
    </div>
    <div class="user_calendar">
        <div class="top_calendar">
            <h5><i class="fas fa-calendar-plus fa-1x"></i> Nouveaux consultation</h5>
            <form action="" method="POST" class="form_calendar">
                <input type="text" id="calendar-date" name="calendar-date">
                <input type="submit" name="new-consultation" id="btn-consultation" value="Valider">
            </form>
        </div>
        <div class="left_calendar">
            <h5><i class="fad fa-history fa-1x"></i> Historique de Consultation</h5>
            <div class="table_consultation">
                <table class="table_calendar">
                    <tr>
                        <td>Consultation Le 05/10/2020</td>
                    </tr>
                    <tr>
                        <td>Consultation Le 05/10/2020</td>
                    </tr>
                    <tr>
                        <td>Consultation Le 05/10/2020</td>
                    </tr>
                    <tr>
                        <td>Consultation Le 05/10/2020</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="calendrier" id="calendrier">

    </div>
</div>
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
</script>
@endsection