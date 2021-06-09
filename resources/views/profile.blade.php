@extends('layouts.master')

@section('content')
<div class="user_parametre">
    <div class="user_links">
        <a class="user-link" href="/user"><i class="fas fa-chart-pie"></i></a>
        <a class="user-link" href="/consultation"><i class="fas fa-calendar-alt"></i></a>
        <a class="user-link" href="/profile"><i class="fas fa-user-cog"></i></a>
        <a class="user-link" href=""><i class="fas fa-sign-out-alt"></i></a>
    </div>
    <form action="" method="POST" class="form_modify_info" enctype="multipart/form-data">
        <h5>Modifier votre compte:</h5>
        <div class="u_image">
            <img src="{{asset('images/user.png')}}" width="70" alt="user image" id="user-old-image">
            <input type="file" class="u_icons" disabled id="userimage" name="userimage" accept="image/*">
            <label id="labelimage" for="userimage"><i class="fas fa-edit fa-1x"></i></label>
        </div>
        <div class="form-group  user_input">
            <input type="text" disabled class="u_icons" id="nom" name="nom" placeholder="Votre nom" autocomplete="off">
            <i class="far fa-user" id="user-icon"></i>
        </div>
        <div class="form-group user_input">
            <input type="text" disabled class="u_icons" id="email" name="email" placeholder="Email" autocomplete="off">
            <i class="far fa-envelope" id="email-icon"></i>
        </div>
        <div class="form-group user_input">
            <input type="text" disabled class="u_icons" id="tel" name="tel" placeholder="Téléphone" autocomplete="off">
            <i class="fas fa-lock" id="tel-icon"></i>
        </div>
        <div class="user_password">
            <div class="form-group user_input">
                <input type="password" disabled class="u_icons" id="password-one" name="password-one" placeholder="Password" autocomplete="off">

                <i class="fas fa-lock" id="password-icon"></i>
            </div>
            <div class="form-group user_input">
                <input type="password" disabled class="u_icons" id="password-two" name="password-two" placeholder="Password" autocomplete="off">
                <i class="fas fa-lock" id="password-icon"></i>
            </div>
        </div>
        <div class="form-group user_input">
            <input type="text" disabled class="u_icons" id="age" name="age" placeholder="Votre age" autocomplete="off">
            <i class="far fa-user" id="age-icon"></i>
        </div>
        <div class="form-group user_input">
            <input type="text" disabled class="u_icons" id="cine" name="cine" placeholder="Votre CINE" autocomplete="off">
            <i class="far fa-address-card" id="cine-icon"></i>
        </div>
        <div class="user_modify_btn">
            <button type="button" id="modifier-account"><i class="far fa-edit"></i> Modifier</button>
            <button id="modify-account-btn" type="submit" name="modifyaccount"><i class="far fa-save"></i> Enregistrer</button>

        </div>
    </form>
</div>
<script>
    const btn = document.querySelector('#modifier-account');
    const inputs = document.querySelectorAll('.u_icons');
    btn.addEventListener('click', function() {
        var totals = inputs.length;

        for (var i = 0; i < totals; i++) {
            if (inputs[i].disabled == false) {
                inputs[i].disabled = true;
            } else {
                inputs[i].disabled = false;
            }
        }
    });
</script>
@endsection