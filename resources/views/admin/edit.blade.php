@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit admin</div>
                    <div class="card-body">

                        <form action="{{url('/profile/1')}}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')
                            <div class="row mt-4 admin-form">
                
                                <div class="col-lg-3">
                                    <div id="uploaded_image" class="img-admin mx-auto mt-2"></div>
                                    <input type="file" name="image_file" id="image_file">
                                </div>
                
                                <div class="col-lg-9">
                                    <div class="form-group row  mt-2">
                                        <label class="col-md-2 lab-form col-form-label" for="nom"> Nom </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" value="{{$admin->nom ?? old('name')}}" name="nom" id="nom">
                                        </div>
                                    </div>
                 
                                    <div class="form-group row">
                                        <label class="col-md-2 lab-form col-form-label" for="prenom"> Prénom </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" value="{{$admin->prenom ?? old('prenom')}}" name="prenom" id="prenom">
                                        </div>
                                    </div>
                
                                    <div class="form-group row">
                                        <label class="col-md-2 lab-form col-form-label" for="email"> E-mail </label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="email" value="{{$admin->email ?? old('email')}}" name="email" id="email">
                                        </div>
                                    </div>
                
                                    <div class="form-group row">
                                        <label id="mdd" class="col-9 lab-form col-form-label"> changer le mot de pass </label>
                                        <label id="mdd" class="col-9 lab-form col-form-label passwd"> Entrer le nouveau mot de pass </label>
                                        <p id="showpasswd" class="col-3 btn btn-link">Éditer</p>
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
                
                                <input class="btn btn-primary mb-2 mx-auto"  type="submit" value="Enregistrer"  name="send">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script>
        var imageAdmin = "<img src='{{url('/images/boss.jpg')}}' id='thisimg' class='img-fluid mx-auto img-admin' alt='Admin image'>";

        $(document).ready(function() {

            $('#image_file').hide();
            $('.passwd').hide();
            $('#uploaded_image').html(imageAdmin);

            $('#uploaded_image').on('click', function() {
                $('#image_file').click();
            });
 
            $('#showpasswd').on('click', function() {
                $('#mdd, .passwd').toggle();
                if ($("#showpasswd").text() == "Éditer") {
                    $("#showpasswd").text("Fermer");
                } else {
                    $("#pass").val("");
                    $("#confirmed").val("");
                    $("#showpasswd").text("Éditer");
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
                var file_data = $("#image_file").prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);
                $.ajax({
                    url: "/profile/1",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    method: "PUT",
                    beforeSend: function() {
                        $('#uploaded_image').html("<label class='text-success'> Image Uploading...</label>");
                    },
                    success: function(data) {
                        $('#uploaded_image').html(data);
                    }
                });
            }); */
        });
    </script>
@endsection