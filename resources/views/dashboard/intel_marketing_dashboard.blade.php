@extends('layouts.master')

@section('title', 'Marketing Dashboard - Application Intel')

@section('headerStyle')
<link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}">
@stop

@section('content')
<main id="js-page-content" role="main" class="page-content" style="color: white;
    background-color: black!important;">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr justify-content-between  text-white" style="background-color: red;">
                    <h1>
                        Filtra per risultati
                    </h1>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <!-- <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button> -->
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">



                        <div class="form-group row">
                            <label class="col-form-label col-12 col-lg-3 form-label text-lg-right">Seleziona intervallo data</label>
                            <div class="col-12 col-lg-6">
                                <div class="input-group">
                                    <input onchange="selezionaData()" type="text" class="form-control" placeholder="Select date" id="datepicker-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text fs-xl">
                                            <i class="fal fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row ">
                            <div class="col-4">
                                <h4 class="text-dark"><b>Gruppo</b></h4>
                                <select id="s1" onchange="selezionaValore()" class="form-select " style="height: 35px; border-radius: 5px;">
                                    
                                    <option selected>Scegli supermercato</option>
                                    @foreach ($markets as $market )

                                    <option value="{{$market->id}}">
                                        {{$market->nome}}
                                    </option>

                                    @endforeach

                                </select>
                            </div>
                            <div class="col-4">
                                <h4 class="text-dark"><b>Canale</b></h4>
                                <select id="s2" class="form-select" style="height: 35px; border-radius: 5px;" aria-label="Default select example">
                                    
                                    <option selected>Seleziona tutti</option>
                                    @foreach ($marketsAll as $market )
                                    <option value="{{$market->id_parent}}" style="display:none;">
                                        {{$market->nome}}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <button id="bottone" class="btn  " style="color:white; background-color: red; border-color: red; ">cerca</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
   
</main>
<link rel="stylesheet" href="https://btn.ninja/css/addons.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@stop

@section('footerScript')


<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

<script src="{{ URL::asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>

<script src="{{ URL::asset('js/datagrid/datatables/datatables.export.js') }}"></script>

<script src="{{ URL::asset('js/dependency/moment/moment.js') }}"></script>
<script src="{{ URL::asset('js/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
<script>
      function selezionaValore() {
        var valoreSelezionato = document.getElementById("s1").value;

        var secondoValore = document.getElementById("s2");
        //console.log(secondoValore);
            for (var i = 0; i < secondoValore.length; i++) {
            var option = secondoValore.options[i];
            option.style.display = "none";
            if (option.value == valoreSelezionato) {
                option.style.display = "block";
            }
        }
    }


    function selezionaData() {
        var dataSelezionata = document.getElementById("datepicker-2").value;
        document.getElementById("dataInizio").innerHTML=dataSelezionata;
        // console.log(dataSelezionata);
        // Spezzare la data e salvarla in un array QUI
        let myArray = dataSelezionata.split(" - ");
        // console.log(myArray);

        // console.log(dateStart);
        // console.log(dateEnd);
        return myArray;
    }

    //// Prendo e divido la data in due stringhe
    let arrayDate = selezionaData();
            // console.log(arrayDate);
            let dateStart = arrayDate[0];
            let dateEnd = arrayDate[1];

</script>
<script>
   $(document).ready(function() {
            
        // Funzione calendario
        $('#datepicker-2, #datepicker-modal-3').daterangepicker({
            timePicker: true,
            startDate: moment(),
            endDate: moment(),
            locale: {
                format: 'YYYY-MM-DD'
            }
        });


    });
</script>
@stop