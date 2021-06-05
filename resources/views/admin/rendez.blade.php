@extends('admin.layouts.master')


@section('content')


<!-- form patient  -->


<div id="modal-sections" uk-modal>
        <div class="uk-modal-dialog">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h2 class="uk-modal-title">Ajouté rendez-vous</h2>
            </div>
            <div class="uk-modal-body">

                <form class="uk-form-horizontal uk-margin-large">

                    <div class="uk-margin">
                        <label class="uk-form-label"  >CIN PATIENT </label>
                        <div class="uk-form-controls">
                            <input class="uk-input " id="cin" value="DA1234"   type="text" placeholder="CIN ...">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <div class="uk-form-label">Type </div>
                        <div class="uk-form-controls uk-form-controls-text">
                            <label><input class="uk-radio" type="radio" name="type" value="Consultation" checked> Consultation</label><br>
                            <label><input class="uk-radio" type="radio" name="type" value="Control" > Control</label>
                        </div>
                    </div>

                </form>


            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary uk-save" type="button">Save</button>
            </div>
        </div>
    </div>


<!-- end form patient  -->

    <div class="content">
         <H1> Rendez - vous  </H1>
        <div class="card">

        <div id="calendar"  ></div>
        </div>

    </div>



<!--star source calneder -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
<script src="js/calenderjs.js"></script>
 <!-- end source calender -->

  <!-- add class for element A -->
  <script>

    $(function(){
        $('#rende').addClass("activePg");

    //romove scroll
     $('.fc-scroller').css({'overflow':'hidden','height':  "initial"});

    });


 </script>

@endsection
