@extends('admin.layouts.master')


@section('content')
<div class="content">
    @if (session('message_success'))
    <div class="alert alert-success" role="alert">
        {!! session('message_success') !!}
    </div>
    @endif
    <div class="card">
        <center>
            <h1>list des patients</h1>
        </center>

        <div class="table-responsive-sm mt-4">
            @isset($patients)
            @php
            $i = 1
            @endphp
            <table id="patients" class="display datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>CIN</th>
                        <th>Nom</th>
                        <th>Age</th>
                        <th>Télephone</th>
                        <th>Sexe</th>
                        <th>Ajouter ordonnance</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($patients as $patient)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$patient->cin}}</td>
                        <td>{{$patient->nom}}</td>
                        <td>{{$patient->age}}</td>
                        <td>{{$patient->tel}}</td>
                        <td>{{$patient->sexe}}</td>
                        <td><a href="patient/{{$patient->cin}}">click here</a></td>
                    </tr>
                    @php
                    $i++
                    @endphp
                    @endforeach
                </tbody>
            </table>
            @endisset
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#patients').DataTable({
            language: {
                processing:     "Traitement en cours...",
                search:         "Rechercher&nbsp;:",
                lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix:    "",
                loadingRecords: "Chargement en cours...",
                zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable:     "Aucune donnée disponible dans le tableau",
                paginate: {
                    first:      "Premier",
                    previous:   "Pr&eacute;c&eacute;dent",
                    next:       "Suivant",
                    last:       "Dernier"
                },
                aria: {
                    sortAscending:  ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });     
        $("#patients").css("width","90%").css("margin","30px");
    } );
</script>

<!-- add class for element A -->
<script>
    $('#pat').addClass("activePg");
</script>

@endsection