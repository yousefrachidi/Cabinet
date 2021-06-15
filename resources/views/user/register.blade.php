@extends('user.layouts.master')
@section('content')
<div class="user_parametre">

    <form action="{{route('save')}}" method="POST" class="form_modify_info">

        <h4 style="margin-bottom: 2rem;">Inscription:</h4>
        @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::get('erreur'))
        <div class="alert alert-danger">
            {{Session::get('erreur')}}
        </div>
        @endif
        @csrf
        <span class="text-danger">
            @error('sexe'){{$message}}
            @enderror
        </span>
        <div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexe" id="sexe1" value="Homme">
                <label class="form-check-label" for="inlineRadio1">Homme</label>
            </div>
            <div class="form-check form-check-inline pb-2">
                <input class="form-check-input" type="radio" name="sexe" id="sexe2" value="Femme">
                <label class="form-check-label" for="inlineRadio2">Femme</label>
            </div>
        </div>
        <span class="text-danger">
            @error('nom'){{$message}}
            @enderror
        </span>
        <div class="form-group  user_input">
            <input type="text" id="nom" name="nom" placeholder="Votre nom" autocomplete="off" value="{{old('nom')}}">
            <i class="far fa-user" id="user-icon"></i>
        </div>

        <span class="text-danger">
            @error('age'){{$message}}
            @enderror
        </span>
        <div class="form-group user_input">
            <input type="text" id="age" name="age" placeholder="Votre age" autocomplete="off" value="{{old('age')}}">
            <i class="far fa-user" id="age-icon"></i>
        </div>

        <span class="text-danger">
            @error('email'){{$message}}
            @enderror
        </span>
        <div class="form-group user_input">
            <input type="text" id="email" name="email" placeholder="Email" autocomplete="off" value="{{old('email')}}">
            <i class="far fa-envelope" id="email-icon"></i>
        </div>

        <span class="text-danger">
            @error('tel'){{$message}}
            @enderror
        </span>
        <div class="form-group user_input">
            <input type="text" id="tel" name="tel" placeholder="Téléphone" autocomplete="off" value="{{old('tel')}}">
            <i class="fas fa-phone-alt" id="tel-icon"></i>
        </div>

        <span class="text-danger">
            @error('password_one'){{$message}}
            @enderror
        </span>
        <div class="user_password">
            <div class="form-group user_input">
                <input type="password" id="password-one" name="password_one" placeholder="mot de passe" autocomplete="off">
                <i class="fas fa-lock" id="password-icon"></i>
            </div>
            <div class="form-group user_input">
                <input type="password" id="password-two" name="password_two" placeholder="mot de passe" autocomplete="off">
                <i class="fas fa-lock" id="password-icon"></i>
            </div>
        </div>

        <span class="text-danger">
            @error('cine'){{$message}}
            @enderror
        </span>
        <div class="form-group user_input">
            <input type="text" id="cine" name="cin" placeholder="Votre CINE" autocomplete="off" value="{{old('cin')}}">
            <i class="fas fa-address-card" id="cine-icon"></i>
        </div>


        <div class="user_modify_btn">
            <button class="btn_inscription" id="modify-account-btn" type="submit" name="createaccount"><i class="fas fa-plus"></i> Inscrire</button>
        </div>
        <p class="pt-4 text-center">Déja inscrit ? <a href="{{route('login')}}">S'identifier</a></p> <!-- add the link -->
    </form>
</div>
@endsection