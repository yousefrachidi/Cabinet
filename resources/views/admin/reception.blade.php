@extends('admin.layouts.master')


@section('content')
<div class="content">
    <div class="card">
        <center>
            <h1>Ajouter récéption</h1>
        </center>


        @if (session('message_success'))
        <div class="alert alert-success" role="alert">
            {{ session('message_success') }}
        </div>
        @endif

        <div class="row">
            <div class="col-lg-8 ml-4">
                <form method="POST" action="/reception">
                    @csrf
                    <div class="form-group row mt-4">
                        <label class="col-sm-3 col-form-label lab-form" for="Prenom">Prénom</label>
                        <div class="col-sm-7">
                            <input type="text" name="prenom" placeholder=" Prénom" class="form-control rec-inp"
                                id="Prenom">
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-sm-3 col-form-label lab-form" for="Nom">Nom</label>
                        <div class="col-sm-7">
                            <input type="text" name="nom" placeholder=" Nom" class="form-control rec-inp">
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class=" col-sm-3 col-form-label lab-form" for="email">Email</label>
                        <div class="col-sm-7">
                            <input type="email" name="email" placeholder="address mail" class="form-control rec-inp">
                        </div>
                    </div>

                    <div class="form-group row mt-4">
                        <label class="col-sm-3 col-form-label lab-form" for="password">Mot de passe</label>
                        <div class="col-sm-7">
                            <input type="password" name="password" placeholder="Mot de passe"
                                class="form-control rec-inp">
                        </div>
                    </div>

                    <div class="mb-4 text-center">
                        <input type="submit" name="valider" value="Valider" id="valider" class="btn btn-primary">
                        <input type="reset" name="reset" value="Réinitialiser" id="reset" class="btn btn-secondary">
                    </div>
                </form>
            </div>
        </div>

        <div class="table-responsive-sm mt-4">

            <?php $i = 1; ?>

            @isset($receptions)
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Mot de Passe</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receptions as $reception)
                    @php
                    $reception->status === 1 ? $btnColor = "btn-success" : $btnColor = "btn-danger";
                    $reception->status === 1 ? $btnText = "Activé" : $btnText = "Desactivé"
                    @endphp
                    <tr>
                        <th>{{$i}}</th>
                        <td>
                            {{$reception->nom}}
                        </td>
                        <td>{{$reception->prenom}}</td>
                        <td>{{$reception->email}}</td>
                        <td class="res-col-password">
                            <input type="password" id="pass-{{$i}}" value="{{$reception->mot_de_pass}}" readonly="true">
                            <i id="pass-id{{$i}}" onclick="switchs({{$i}})" class="fas fa-eye"></i>
                        </td>
                        <td>
                            <a class="btn {{$btnColor}} status-btn"
                                onclick="confirmStatus({{$reception->status}}, {{$reception->id_reception}})">{{$btnText}}</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            @endisset

            <div id="dialog-confirm">
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<script>
    function confirmStatus(status, id) {
        var statustext;
        status == 1 ? statustext = "desactiver" : statustext = "activer";
        status == 1 ? status = 0 : status = 1;

        $("#dialog-confirm").dialog({
            'title'     : "Voulez-vous vraiment "+ statustext +" cet utilisateur",
            resizable: false,
            height: "auto",
            width: 500,
            modal: true,
            buttons: {
                "Oui" : function() {
                    window.location = "reception/" + status + "/" + id;
                },
                "Non merçi": function() {
                    $(this).dialog("close");
                }
            }
        });
    };

    function switchs(i) {
        var x = $("#pass-" + i);
        var icon = $("#pass-id" + i);
        if (x.prop('type') === "password") {
            x.prop("type", "text");
            icon.addClass("fas fa-eye-slash");
        } else {
            x.prop("type", "password");
            icon.removeClass("fas fa-eye-slash");
            icon.addClass("fas fa-eye");
        }
    }
</script>

@endsection