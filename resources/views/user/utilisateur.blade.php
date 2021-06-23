@extends('user.layouts.master')

@section('content')
<div class="utilisateur">

    <div class=" user_profile">

        <div class="user_p">
            <div class="user_profile_top">
                <div class="user_image">
                    <img id="profile-image" src="images/userimages/{{$patientInfo['image']}}" alt="" width="60" height="70">
                </div>
                <div class="user_image_data">
                    <p>{{$patientInfo['nom']}}</p>
                    <p>{{$patientInfo['cin']}}</p>
                </div>
            </div>

            <div class="user_profile_bottom">
                <p>Age: {{$patientInfo['age']}}ans</p>
                <p>Sexe: {{$patientInfo['sexe']}}</p>
                <p><i style=" color:#0466c8;" class="far fa-envelope"></i> Email: {{$patientInfo['email']}}</p>
                <p><i style=" color:#0466c8;" class="fas fa-phone-square-alt"></i> Telephone: {{$patientInfo['tel']}}</p>
            </div>
        </div>

    </div>
    <div class="user_info">
        @if (session('message_error'))
        <div class="alert alert-danger" role="alert">
            {!! session('message_error') !!}
        </div>
        @endif
        <div class="user_info_top">
            <div class="user_document">
                <div class="document_medical">
                    <h5><i class="fas fa-file-medical"></i> Document Medicale</h5>
                </div>
                <table class="table-files" id="table-files">
                    @foreach ($ordonnances as $ordonnance)
                    <tr>
                        <td>
                            <i class="far fa-file-alt fa-1x"></i> {{explode('-',$ordonnance->description)[0]}}.pdf
                        </td>
                        <td>{{$ordonnance->updated_at->format('d/m/y h:i')}}</td>
                        <td>
                            <a id="telecharger_fichier" href="pdf/{{$ordonnance->description}}" title="Telecharger ficher"><i class="fas fa-cloud-download-alt"></i></a>
                            <a id="afficher_fichier" href="view/{{$ordonnance->description}}" title="afficher document"><i class="far fa-file-pdf"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</div>
<script>
    $("#date").dateDropper({
        animate: 'true',
        lang: 'fr',
        minYear: 2020,
        theme: 'leaf'
    });
</script>
@endsection