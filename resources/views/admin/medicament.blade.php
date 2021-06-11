@extends('admin.layouts.master')


@section('content')
<div class="content">
    <div class="card">
        <center>
            <h1>Ajouter médicament</h1>
        </center>


        @if (session('message_success'))
        <div class="alert alert-success" role="alert">
            {{ session('message_success') }}
        </div>
        @endif

        <div class="row">
            <div class="col-lg-8 ml-4">
                <form method="POST" action="/medicament">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label lab-form" for="nom">nom de médicament</label>
                        <div class="col-sm-7">
                            <input type="text" name="nom" class="form-control rec-inp {{$errors->first('nom') ? "is-invalid" : ""}}" id="Prenom" value={{old("nom")}}>
                            <small class="text-danger">{{ $errors->first('nom')}}</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label lab-form" for="designation">Designation</label>
                        <div class="col-sm-7">
                            <input type="text" name="designation" id="designation" class="form-control rec-inp {{$errors->first('designation') ? "is-invalid" : ""}}" value={{old("designation")}}>
                            <small class="text-danger">{{ $errors->first('designation')}}</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class=" col-sm-3 col-form-label lab-form" for="type">Type de médicament</label>
                        <div class="col-sm-7">
                            <select name="type" id="type" class="form-control rec-inp">
                                <option value="orales">orales</option>
                                <option value="injectables">injectables</option>
                                <option value="dermiques">dermiques</option>
                                <option value="inhalées">inhalées</option>
                                <option value="rectales">rectales</option>
                            </select>
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
            @isset($medicaments)
            @php
            $i = 1
            @endphp
            <table id="medicaments" class="display datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom de médicament</th>
                        <th>Designation</th>
                        <th>forme de médicament</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($medicaments as $medicament)
                    <tr>
                        <td>{{$i}}</td>
                        <td>{{$medicament->nom}}</td>
                        <td>{{$medicament->designation}}</td>
                        <td>{{$medicament->type}}</td>
                    </tr>
                    <?php $i++ ?>
                    @endforeach
                </tbody>
            </table>
            @endisset
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#medicaments').DataTable({
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
    } );
</script>

@endsection