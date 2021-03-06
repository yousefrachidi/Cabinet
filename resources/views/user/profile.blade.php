@extends('user.layouts.master')

@section('content')
<div class="user_parametre mb-5">

    <form action="/modifier/{{$patient['id']}}" method="POST" class="form_modify_info" enctype="multipart/form-data">
        <h5>Modifier votre compte:</h5>
        @csrf
        @if(Session::get('erreur'))
        <p class="alert alert-danger">{{Session::get('erreur')}}</p>
        @endif
        @if(Session::get('success'))
        <p class="alert alert-success">{{Session::get('success')}}</p>
        @endif
        <div class="u_image">
            <img src="images/userimages/{{$patient['image']}}" width="60" height="70" alt="user image" id="user-old-image" style="border-radius: 50%;">
            <input type="file" class="u_icons" disabled id="userimage" name="userimage" accept="image/*">
            <label id="labelimage" for="userimage"><i class="fas fa-edit fa-1x"></i></label>
        </div>
        <div class="form-group  user_input">
            <input type="text" disabled class="u_icons" id="nom" name="nom" placeholder="Votre nom" autocomplete="off" value="{{$patient['nom']}}">
            <i class="far fa-user" id="user-icon"></i>
        </div>
        <div class="form-group user_input">
            <input type="text" disabled class="u_icons" id="email" name="email" placeholder="Email" autocomplete="off" value="{{$patient['email']}}">
            <i class="far fa-envelope" id="email-icon"></i>
        </div>
        <div class="form-group user_input">
            <input type="text" disabled class="u_icons" id="tel" name="tel" placeholder="Téléphone" autocomplete="off" value="{{$patient['tel']}}">
            <i class="fas fa-phone-alt" id="tel-icon"></i>
        </div>

        <div class="user_password">
            <div class="form-group user_input">
                <input type="password" disabled class="u_icons" id="password-one" name="password_one" placeholder="Password" autocomplete="off">

                <i class="fas fa-lock" id="password-icon"></i>
            </div>
            <div class="form-group user_input">
                <input type="password" disabled class="u_icons" id="password-two" name="password_two" placeholder="Password" autocomplete="off">
                <i class="fas fa-lock" id="password-icon"></i>
            </div>
        </div>

        <div class="form-group user_input">
            <input type="text" disabled class="u_icons" id="age" name="age" placeholder="Votre age" autocomplete="off" value="{{$patient['age']}}">
            <i class="far fa-user" id="age-icon"></i>
        </div>
        <div class="form-group user_input">
            <input type="text" disabled class="u_icons" id="cine" name="cin" placeholder="Votre CINE" autocomplete="off" value="{{$patient['cin']}}">
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