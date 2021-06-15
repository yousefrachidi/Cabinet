<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ config('app.name', 'Medicale') }}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/DateDropper/datedropper.css')}}">
    <script src="{{asset('assets/DateDropper/datedropper.js')}}"></script>
</head>

<body>
    <header class="header d-flex flex-row justify-content-between align-items-center">
        <div id="header-logo" class="ml-4">
            <a href="/"><img src="{{asset('images/medicine.png')}}" width="50">Medicales</a>
        </div>
        <div class="header_toggle text-center align-items-center mr-4">
            <i class="fas fa-align-justify" id="header-toggle"></i>
        </div>
        <nav class="nav" id="nav">
            <i class="fas fa-times" id="close"></i>
            <div class="nav_content">
                <div class="logo">
                    <a href="/"><img id="logo_image" src="{{asset('images/medicine.png')}}" alt="image"></a>
                    <a href="/" id="menu-logo">Medicale</a>
                </div>
                <div class="nav_list">
                    <ul class="list">
                        <li><a class="lien active" href="/">Acceuil</a></li>
                        <li><a class="lien" href="#more-info">About</a></li>
                        <li><a class="lien" href="#contact">Contact</a></li>
                        @if(!session()->has('patient'))
                        <li class="menu">
                            <a class="lien account-lien" href="#"><i class="far fa-user-circle"></i> Account <i class="fas fa-caret-down" id="down-icon"></i></a>
                            <ul class="account_menu">
                                <li class="drop_item">
                                    <a class="lien drop_lien" href="/login"><i class="fas fa-sign-in-alt"></i> Connecter</a>
                                </li>
                                <li class="drop_item">
                                    <a class="lien drop_lien" href="/register"><i class="fas fa-plus-circle"></i> Inscription</a>
                                </li>
                            </ul>
                        </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @yield('aside')
    @yield('content')

    <div class="footer">
        <div class="footer_info">
            <div class="f_logo">
                <img src="{{asset('images/medicine.png')}}" alt="" width="50">
                <h5>Medicale</h5>
            </div>
            <div class="f_time">
                <div class="time">
                    <p>
                        <i class="fas fa-calendar-alt"></i> Lundi-Vendredi<br>
                        <i class="far fa-clock"></i> 08:00 <i class="fas fa-long-arrow-alt-right"></i> 18:00
                    </p>
                </div>
            </div>
            <div class="f_data">
                <h5>Contact Information:</h5>
                <div>
                    <i class="fas fa-map-marker-alt"></i> Rue Hay Essalam,Rabat.<br>
                    <i class="fas fa-phone-alt"></i> 0537565656<br>
                    <i class="fas fa-envelope"></i> contact@medicale.ma
                </div>
            </div>
        </div>
        <div class="f_lien">
            <h5>Liens utiles:</h5>
            <div class="url">
                <a href="">Acceuil</a>
                <a href="">Contact</a>
                <a href="">Inscription</a>
                <a href="">Connecter</a>
            </div>
        </div>
        <div class="social">
            <h5>Sites sociaux:</h5>
            <div>
                <a href=""><i class="fab fa-facebook fa-2x"></i></a>
                <a href=""><i class="fab fa-youtube fa-2x"></i></a>
                <a href=""><i class="fab fa-twitter fa-2x"></i></a>
            </div>
        </div>
        <a href="#" id="scroll-top">
            <i class="fas fa-angle-double-up fa-2x"></i>
        </a>
    </div>
</body>

</html>