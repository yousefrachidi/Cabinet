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
                        <div class="col-8 col-sm-9 info-per">
                            <h2 class="text-primary">Dr 
                                <span class="text-uppercase">{{session('admin')->nom}}</span> 
                                <span class="text-capitalize">{{session('admin')->prenom}}</span>
                            </h2>
                            <p class="text-primary">Médcine génereal</p>
                            <p class="text-primary">mobile: 0566661222</p>
                            <p class="text-primary">{{session('admin')->email}}</p>
                        </div>
                        <div class="col-4 col-sm-3 mt-auto font-weight-bold">le: {{date('d-m-Y')}}</div>
                    </div>
                    <hr>
                    
                    <div class="row">
                        <div class="col-5 col-md-pull-5">Nom: {{$patient->nom}}</div>
                        <div class="col-4 col-md-push-7">Age: {{$patient->age}}</div>
                    </div>
                    
                    <h2 class="text-center m-5">ORDONNANCE</h2>

                    <div class="row">
                        <div class="col">
                            <form action="/ordonnance" method="post">
                                @csrf
                                <input type="hidden" name="cin_patient" value="{{$patient->cin}}">
                                <input type="hidden" name="age" value="{{$patient->age}}">
                                <textarea id="ordonnance-input" name="description"></textarea>
                                <input type="submit" value="Enregistrer">
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