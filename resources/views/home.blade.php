@extends('user.layouts.master')

@section('content')
<div class="top">
    <div class="info">
        <div class="about">
            <h1>Bienvenue!<h1>
                    <h2>Réservez un rendez-vous médicale en ligne</h2>
                    <p>Notre plateforme de prise de rendez-vous en ligne est disponibles gratuitement 24h/24 et 7j/7</p>
        </div>
        <div class="form">
            <form action="{{route('rendezvous')}}" method="POST" class="form-consultation text-center">
                @csrf

                <div class="form-group ">
                    <input type="text" id="nom" name="nom" placeholder="Votre nom" autocomplete="off">
                    <i class="far fa-user" id="user-icon"></i>
                </div>
                <span class="text-danger">@error('nom'){{$message}}@enderror</span>
                <div class="form-group">
                    <input type="text" id="email" name="email" placeholder="Email" autocomplete="off">
                    <i class="far fa-envelope" id="email-icon"></i>
                </div>
                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                <div class="form-group">
                    <input type="text" id="tel" name="tel" placeholder="Téléphone" autocomplete="off">
                    <i class="fas fa-phone-alt" id="tel-icon"></i>
                </div>
                <span class="text-danger">@error('tel'){{$message}}@enderror</span>
                <div class="form-group">
                    <input type="text" id="calendar" name="calendar" value="" data-large-mode="true" data-lang="fr" data-min-year="2021">
                    <i class="far fa-calendar-alt" id="calendar-icon"></i>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-envoyer">Prendre un RDV <i id="btn-icon" class="fal fa-long-arrow-right"></i></button>
                </div>
                <p>Ou créer un <a href="">compte</a></p>
            </form>
        </div>
    </div>
    <div class="top-image align-items-center">
        <img id="main-image" src="{{asset('images/doctor.png')}}">
    </div>
</div>

<div class="services  text-center">
    <div class="services_container text-center">
        <div class="service ">
            <i class="fas fa-headset fa-2x"></i>
            <p>On se charge de vous rappeler votre RDV. </p>
        </div>
        <div class="service">
            <i class="fas fa-calendar-alt fa-2x"></i>
            <p>Echangez et conservez vos documents en un clic.</p>
        </div>

        <div class="service">
            <i class="fas fa-clock fa-2x"></i>
            <p>Prenez un rendez-vous gratuitement 24h/24 et 7j/7.</p>
        </div>

    </div>
</div>
<div class=" more-info" id="more-info">
    <div class=" row about-us">
        <div class="col-md-3 consultation cards">
            <div class="consult-image">
                <img src="{{asset('images/consulting.jpg')}}" alt="Consulting">
            </div>
            <div class="consult-info">
                <h3>Des horaires de consultation étendus</h3>
                <p>Nos médecins se relaient 6 jours sur 7, y compris les jours fériés.
                    Les rendez-vous avant 8h, après 20h et les jours fériés sont en priorité destinés aux problèmes aigus.</p>
            </div>
        </div>
        <div class="col-md-3 prise cards">
            <div class="consult-image">
                <img src="{{asset('images/datat.jpg')}}" alt="Consulting">
            </div>
            <div class="consult-info">
                <h3>Une prise de rendez-vous en ligne</h3>
                <p>Vous pouvez prendre rendez-vous avec votre médecin ou avec un autre praticien.
                    Votre dossier médical lui sera toujours accessible.</p>
            </div>
        </div>
        <div class="col-md-3 access cards">
            <div class="consult-image">
                <img src="{{asset('images/online.jpg')}}" alt="Consulting">
            </div>
            <div class="consult-info">
                <h3>Un accès sécurisé à votre dossier médical </h3>
                <p>Nous travaillons à vous donner un accès en ligne à votre dossier médical.
                    Au travers d'un portail web sécurisé, vous pourrez accéder aux informations vous concernant.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="why_us">
    <div class="why_image">
        <img src="{{asset('images/waiting.jpg')}}" alt="waiting image">
    </div>
    <div class="why_info">
        <h3>Évitez la salle d'attente! Réservez plutôt un rendez-vous à la Cabinet virtuelle.</h3>
        <p>Notre Plateforme offre des rendez-vous médicaux en ligne avec Un médecins de famille, de spécialistes, de naturopathes, d'ophtalmologistes, de physiothérapeutes et plus encore.</p>
    </div>
</div>
<section class="contact" id="contact">
    <h4><i class="fal fa-comment-alt-lines fa-1x"></i> Contacter Nous!</h4>
    <p>Pour plus d'information, n'hésitez pas à nous contacter.</p>
    <div class="form-contact">
        <div class="contact-info">
            <div class="information">
                <div class="c-info">
                    <h5>Contact Information:</h5>
                    <i class="fas fa-map-marker-alt"></i> Rue Hay Essalam,Rabat.<br>
                    <i class="fas fa-phone-alt"></i> 0537565656<br>
                    <i class="fas fa-envelope"></i> contact@medicale.ma
                </div>
            </div>
            <form class="msg_form" action="{{route('contactus')}}" method="POST">
                <h5>Envoyer un message</h5>
                @csrf
                @if(Session::get('message_sent'))
                <div class="alert alert-success" role="alert">{{Session::get('message_sent')}}</div>
                @endif
                <div class="form-g">
                    <input type="text" id="nom-contact" placeholder="Votre Nom" autocomplete="off" name="nom">
                    <i class="fas fa-user-alt icon-c" id="iconuser"></i>
                </div>
                <span class="text-danger erreur-text nom_erreur"></span>

                <div class="form-g">
                    <input type="tel" id="tel-contact" placeholder="Votre telephone" autocomplete="off" name="tel">
                    <i class="fas fa-phone-alt icon-c" id="icontel"></i>
                </div>
                <span class="text-danger erreur-text tel_erreur"></span>

                <div class="form-g">
                    <textarea name="message" id="msg-contact" cols="30" rows="7" placeholder="Votre message"></textarea>
                </div>
                <span class="text-danger erreur-text message_erreur"></span>

                <button type="submit" id="send-message">Envoyer</button>
            </form>
        </div>
    </div>


</section>

<script src="{{asset('js/main.js')}}"></script>

<script>
    $("#calendar").dateDropper({
        animate: 'true',
        format: 'DD/MM/YYYY',
        minYear: 2020,
        expandable: true,
        theme: 'leaf',
        large: true
    });
</script>

@endsection