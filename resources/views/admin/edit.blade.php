@extends('admin.layouts.more')
@section('title','Modifie')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('message_success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message_success') }}
                    </div> 
                @endif
                <div class="card">
                    <div class="card-header">Modifier mon profile</div>
                    <div class="card-body">
                        
                        <form action="/profile/{{session('admin')->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row mt-4 admin-form">
                
                                <div class="col-lg-4">
                                    <div id="uploaded_image" class="img-admin mx-auto mt-2">
                                        <img src='{{url('/images/boss.jpg')}}' id='thisimg' class='img-fluid mx-auto img-admin' alt='Admin image'>
                                    </div>
                                    <div id="change_image"></div>
                                    <div id = 'info'></div>
                                    <input type="file" name="image_file" id="image_file">
                                    <small class="text-danger">{{ $errors->first('image_file')}}</small>
                                </div>
                
                                <div class="col-lg-8">
                                    <div class="form-group row  mt-2">
                                        <label class="col-md-2 lab-form col-form-label" for="nom"> Nom </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" value="{{$admin->nom ?? old('name')}}" name="nom" id="nom">
                                            <small class="text-danger">{{ $errors->first('nom')}}</small>
                                        </div>
                                    </div>
                 
                                    <div class="form-group row">
                                        <label class="col-md-2 lab-form col-form-label" for="prenom"> Pr??nom </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" value="{{$admin->prenom ?? old('prenom')}}" name="prenom" id="prenom">
                                            <small class="text-danger">{{ $errors->first('prenom')}}</small>
                                        </div>
                                    </div>
                
                                    <div class="form-group row">
                                        <label class="col-md-2 lab-form col-form-label" for="email"> E-mail </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="email" value="{{$admin->email ?? old('email')}}" name="email" id="email">
                                            <small class="text-danger">{{ $errors->first('email')}}</small>
                                        </div>
                                    </div>
                
                                    <div class="form-group row">
                                        <label id="mdd" class="col-9 lab-form col-form-label"> changer le mot de pass </label>
                                        <label id="mdd" class="col-9 lab-form col-form-label passwd"> Entrer le nouveau mot de pass </label>
                                        <p id="showpasswd" class="col-3 btn btn-link">??diter</p>
                                    </div>
                
                                    <div class="form-group row passwd">
                                        <label class="col-md-2 lab-form-upd col-form-label" for="pass"> nouveau </label>
                                        <div class="col-md-5">
                                            <input class="form-control" type="password" name="pass" id="pass">
                                        </div>
                                    </div>
                
                                    <div class="form-group row passwd">
                                        <label class="col-md-2 lab-form-upd col-form-label" for="confirmed"> re-taper</label>
                                        <div class="col-md-5">
                                            <input class="form-control" type="password" name="confirmed" id="confirmed">
                                        </div>
                                        <div id="errConfirm"></div>
                                    </div>
                                </div>
                
                                <div class="mx-auto m-2">
                                    <input class="btn btn-primary"  type="submit" value="Enregistrer">
                                    <a class="btn btn-danger" href="/dashboard"> Retour </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#image_file').hide();
            $('.passwd').hide();

            $('#uploaded_image').on('click', function() {
                $('#image_file').click();
            });
 
            $('#showpasswd').on('click', function() {
                $('#mdd, .passwd').toggle();
                if ($("#showpasswd").text() == "??diter") {
                    $("#showpasswd").text("Fermer");
                } else {
                    $("#pass").val("");
                    $("#confirmed").val("");
                    $("#showpasswd").text("??diter");
                    $('#confirmed').removeClass("is-invalid" );
                    $('#confirmed').removeClass("is-valid" );
                }
            });

            $('#confirmed').keyup(function() {
                var first = $('#pass').val();
                var second = $('#confirmed').val();
                if (second != first) {
                    $('#confirmed').addClass( "is-invalid" );
                    $('#confirmed').removeClass("is-valid" );
                    $(":submit").prop('disabled', true);
                } else {
                    $('#confirmed').removeClass("is-invalid" );
                    $('#confirmed').addClass( "is-valid" );
                    $(":submit").prop('disabled', false);
                }
            });

            $('#image_file').on('change', function() {
                $("#change_image").html('<div class="p-3 m-2 bg-info text-white rounded">l\'image sera chang?? apr??s l\'enregistrement des donn??es</div>');
            });
        });
    </script>
@endsection