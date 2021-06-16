@extends('user.layouts.master')

@section('content')
<section class="formlogin mx-5">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-5">
                <img src="{{asset('images/this.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7 px-5 pt-5">
                <img src="{{asset('images/second.png')}}" width="320" class="py-2">
                <h4>Connecter vous:</h4>
                <form action="{{route('check')}}" method="post">
                    @csrf
                    @if(Session::get('erreur'))
                    <div class="alert alert-danger col-lg-7">
                        {{Session::get('erreur')}}
                    </div>
                    @endif
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="email" placeholder="Email" class="form-control my-3 p-4" name="email" value="{{old('email')}}">
                        </div>
                    </div>
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <input type="password" placeholder="Mot de passe" name="password" class="form-control my-3 p-4">
                        </div>
                    </div>
                    <span class="text-danger">@error('password'){{$message}}@enderror</span>
                    <div class="form-row">
                        <div class="col-lg-7">
                            <button type="submit" class="btn1 mt-3 mb-5">Login</button>
                        </div>
                    </div>
                    <a href="#">Mot de passe oublier?</a> <!-- add the link -->
                    <p>Créer un <a href="{{route('register')}}">compte</a></p> <!-- add the link -->
                </form>
            </div>
        </div>
    </div>
</section>

@endsection