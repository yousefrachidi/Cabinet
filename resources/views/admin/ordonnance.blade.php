@extends('admin.layouts.more')
@section('title','Ordonnance ')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ajouter ordonnance</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8 info-per">
                            <div class="text-primary h4">Dr
                                <span class="text-uppercase">{{session('admin')->nom}}</span>
                                <span class="text-capitalize">{{session('admin')->prenom}}</span>
                            </div>
                            <div class="text-primary">Médcine génereal</div>
                            <div class="text-primary">mobile: 0566661222</div>
                            <div class="text-primary">{{session('admin')->email}}</div>
                        </div>
                        <div class="col-4 my-auto font-weight-bold text-right">le: {{date('d-m-Y')}}</div>
                    </div>
                    <hr>

                    <div class="row ml-4">
                        <div class="col-5 col-md-pull-5 h5">Nom: <span class="text-uppercase">{{$patient->nom}}</span></div>
                        <div class="col-4 col-md-push-7 h5">Age: {{$patient->age}}</div>
                    </div>

                    <h2 class="text-center m-5">ORDONNANCE</h2>

                    <div class="row">
                        <div class="col">
                            <form action="/ordonnance" method="post">
                                @csrf
                                <input type="hidden" name="cin_patient" value="{{$patient->cin}}">
                                <input type="hidden" name="age" value="{{$patient->age}}">
                                <input type="hidden" name="nom_patient" value="{{$patient->nom}}">
                                <textarea id="ordonnance-input" name="description"></textarea>

                                <div class="text-center m-2">
                                    <input class="btn btn-primary"  type="submit" value="Enregistrer">
                                    <a class="btn btn-danger" href="/patient"> Retour </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <h4 class="text-center m-5">Dr <span class="text-uppercase">eder</span> <span
                            class="text-capitalize">amin</span></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    tinymce.init({
      selector: '#ordonnance-input',
      menubar: false,
      plugins: "lists",
      toolbar2: "undo redo | cut copy paste | alignleft aligncenter alignright alignjustify | bold italic | searchreplace | bullist numlist | outdent indent blockquote | link unlink anchor image media code",
    });
</script>
@endsection