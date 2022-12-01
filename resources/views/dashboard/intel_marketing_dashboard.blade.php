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
                            
                                <div class="col-4" >
                                    <form action="#" name="InventoryList" method="post">
                                        <h4 class="text-dark"><b>Gruppo</b></h4>
                                        <select id="s1" name="gruppo"  class="form-select bnotes" style="width: 200px; height: 60px; border-radius: 5px;" multiple>
                                            
                                            <option selected>Scegli supermercato</option>
                                            @foreach ($markets as $market )

                                            <option value="{{$market->id}}">
                                                {{$market->nome}}
                                            </option>

                                            @endforeach

                                        </select>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <form action="#" name="InventoryList1" method="post">
                                        <h4 class="text-dark"><b>Canale</b></h4>
                                        <select id="s2" name="canale" class="form-select" style="width: 200px; height: 60px; border-radius: 5px;" aria-label="Default select example" multiple>
                                            
                                            <option selected>Seleziona tutti</option>
                                            @foreach ($marketsAll as $market )
                                            @foreach ($markets as $market1 )
                                            @if($market1->id==$market->id_parent)
                                            <option value="{{$market->id_parent}}" style="display:block;">
                                                {{$market->nome}}
                                            </option>
                                            @endif
                                            @endforeach
                                            @endforeach

                                        </select>
                                    </form>
                                </div>
                            
                                <div class="row">
                                    <div class="col">
                                        <button id="bottone" class="btn bnotes" style="color:white; background-color: red; border-color: red; " >cerca</button>
                                    </div>
                                </div>
                            
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <h1>{{$nome[0]->nome}}</h1>
    <h2>
        Dal: <span class="ml-1" id="dataInizio"></span> 
    </h2>
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
       
    // function selezionaValore() {
    // var valoreSelezionato= [] 
    // valoreSelezionato = document.getElementById("s1").value;
    // // console.log(valoreSelezionato);

    // var secondoValore = document.getElementById("s2");
    // //console.log(secondoValore);
    //     for (var i = 0; i < secondoValore.length; i++) {
    //     var option = secondoValore.options[i];
    //     option.style.display = "none";
    //     if (option.value == valoreSelezionato) {
    //         option.style.display = "block";                                                     
    //     }                                                               
    // }
    // // console.log(secondoValore);
    // }                 

                                            
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
    // console.log(myArray)
    
    

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

        $('#bottone').on('click', function() {
        
            var InvForm = document.forms.InventoryList;
            var InvForm1 = document.forms.InventoryList1;
            var gruppi = [];
            var canali = [];
            for (i=0; i<InvForm.gruppo.length; i++)
            {
            if (InvForm.gruppo[i].selected)
            {
                //alert(InvForm.SelBranch[x].value);
                gruppi[i] = InvForm.gruppo[i].value;
            }
            }
            for (i=0; i<InvForm1.canale.length; i++)
            {
            if (InvForm1.canale[i].selected)
            {
                //alert(InvForm.SelBranch[x].value);
                canali[i] = InvForm1.canale[i].value;
            }
            }
            console.log(gruppi)
            console.log(canali)
            // alert(SelBranchVal);
            
            let arrayDate = selezionaData();
            // console.log(arrayDate);
            //// Prendo e divido la data in due stringhe
            let dateStart = arrayDate[0];
            let dateEnd = arrayDate[1];
            console.log(arrayDate)
        });
    });
</script>
@stop