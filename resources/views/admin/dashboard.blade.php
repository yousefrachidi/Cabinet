@extends('admin.layouts.master')


@section('content')

<div class="content">


    <H1> Dashboard </H1>
    <div class="text-center dashboard">
        <div class="col-sm-3">
            <div class="card text-white bg-dark">
                <div class="card-header">Patients</div>
                <div class="card-body">
                    <h5 class="card-text text-white">{{$countPatient}} Total Patient</h5>
                    <a href="/patient" class="btn btn-primary">Patients</a>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card text-white bg-dark">
                <div class="card-header">Nombre Rendez vous</div>
                <div class="card-body">
                    <h5 class="card-text text-white">{{$countRendezVous}} Total</h5>
                    <a href="/rendez" class="btn btn-primary">Rendez vous</a>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card text-white bg-dark">
                <div class="card-header">Reception </div>
                <div class="card-body">
                    <h5 class="card-title text-white">{{$countReception}} Réceptionniste</h5>
                    <a href="/reception" class="btn btn-primary">Reception</a>
                </div>
            </div>
        </div>

    </div>

    <div class="card">

    </div>

</div>



<!-- add class for element A -->
<script>
    $('#dash').addClass("activePg");
</script>

@endsection