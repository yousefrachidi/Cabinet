@extends('layouts.master')
@section('content')
<div class="user_parametre">

    <form action="" method="POST" class="form_modify_info" enctype="multipart/form-data">
        <h5 style="margin-bottom: 2rem;">Creer un compte:</h5>

        <div class="form-group  user_input">
            <input type="text" id="nom" name="nom" placeholder="Votre nom" autocomplete="off">
            <i class="far fa-user" id="user-icon"></i>
        </div>
        <div class="form-group user_input">
            <input type="text" id="age" name="age" placeholder="Votre age" autocomplete="off">
            <i class="far fa-user" id="age-icon"></i>
        </div>
        <div class="form-group user_input">
            <input type="text" id="email" name="email" placeholder="Email" autocomplete="off">
            <i class="far fa-envelope" id="email-icon"></i>
        </div>
        <div class="form-group user_input">
            <input type="text" id="tel" name="tel" placeholder="Téléphone" autocomplete="off">
            <i class="fas fa-phone-alt" id="tel-icon"></i>
        </div>
        <div class="user_password">
            <div class="form-group user_input">
                <input type="password" id="password-one" name="password-one" placeholder="mot de passe" autocomplete="off">
                <i class="fas fa-lock" id="password-icon"></i>
            </div>
            <div class="form-group user_input">
                <input type="password" id="password-two" name="password-two" placeholder="mot de passe" autocomplete="off">
                <i class="fas fa-lock" id="password-icon"></i>
            </div>
        </div>

        <div class="form-group user_input">
            <input type="text" id="cine" name="cine" placeholder="Votre CINE" autocomplete="off">
            <i class="fas fa-address-card" id="cine-icon"></i>
        </div>
        <div class="user_modify_btn">

            <button class="btn_inscription" id="modify-account-btn" type="submit" name="createaccount"><i class="fas fa-plus"></i> Inscrire</button>

        </div>
    </form>
</div>
@endsection