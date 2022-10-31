@extends('layouts.master')

@section('title', 'Date Range Picker - Form Plugins')

@section('headerStyle')
<link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}">
@stop

@section('content')

<main id="js-page-content" role="main" class="page-content bg-white">

    <div class="subheader">
        <h1 class="subheader-title">
            Ricerca Promozioni
        </h1>
    </div>


    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr justify-content-between">
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


                        <form action="">
                            <div class="form-group row">
                                <label class="col-form-label col-12 col-lg-3 form-label text-lg-right">Date Range Picker With Times</label>
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


                            <div class="row">
                                <div class="col-4">

                                    <select id="s1" onchange="selezionaValore()" class="form-select " style="height: 35px; border-radius: 5px;">
                                        <option selected>Seleziona un'opzione</option>
                                        @foreach ($markets as $market )

                                        <option value="{{$market->id}}">
                                            {{$market->nome}}
                                        </option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select id="s2" class="form-select" style="height: 35px; border-radius: 5px;" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($marketsAll as $market )
                                        <option value="{{$market->id_parent}}" style="display:none;">
                                            {{$market->nome}}
                                        </option>

                                        @endforeach

                                    </select>
                                </div>
                                <button class="btn btn-primary col-1" type="submit" style="background-color: red; border-color: red;">cerca</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Promozioni attive nell'intervallo....
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content" id="users">
                        <input class="search" placeholder="Search" />
                        <button class="sort " data-sort="nome"> Ordina per data </button>
                        <!-- datatable start -->
                        
                        <table id="test-list" style="display: none;" class ="table table-bordered table-hover table-striped w-100">
                            <thead>
                                <tr role="row" style="background-color: red;">
                                    <th  tabindex="0"  rowspan="1" colspan="1" style="width: 261px;"  >Promo</th>
                                    <th  tabindex="0"  rowspan="1" colspan="1" style="width: 385px;" aria-label="Position: activate to sort column ascending">Descrizione</th>
                                    <th  tabindex="0"  rowspan="1" colspan="1" style="width: 197px;" aria-label="Office: activate to sort column ascending">Data inizio</th>
                                    <th  tabindex="0"  rowspan="1" colspan="1" style="width: 105px;" aria-label="Age: activate to sort column ascending">Data fine</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="tbody" class="list" >
                                @if (count($arrayPromo)>0)
                                @foreach ($arrayPromo as $promozione )
                                <tr>
                                    <td class="nome">{{ $promozione['nome'] }}</td>
                                    <td class="descrizione">{{ $promozione['descrizione'] }}</td>
                                    <td >{{ $promozione['date_start'] }}</td>
                                    <td>{{ $promozione['date_end'] }}</td>
                                    <td>cancellare</td>
                                    <td>cancellare</td>
                                </tr>

                                @endforeach

                                @endif
                               
                            </tbody>
                            <tfoot class="pagination"></tfoot>
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>

            </div>
        </div>



    </div>
    </div>
    </div>
    </div>
    </div>

</main>
@stop

@section('footerScript')

<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script src="{{ URL::asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>

<script src="{{ URL::asset('js/datagrid/datatables/datatables.export.js') }}"></script>

<script src="{{ URL::asset('js/dependency/moment/moment.js') }}"></script>
<script src="{{ URL::asset('js/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
<script>
    var promozione = <?php echo json_encode($promozioni) ?>;
    console.log(promozione);

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
        console.log(dataSelezionata);
    }
    // Prova ricerca
    var options = {
        valueNames: ['nome', 'descrizione']
    };

    var userList = new List('users', options);
    // Prova Pagination
    var monkeyList = new List('test-list', {
        valueNames: ['nome'],
        page: 10,
        pagination: true
    });
</script>
<script>
    $(document).ready(function() {
        // Funzione calendario
        $('#datepicker-2, #datepicker-modal-3').daterangepicker({
            timePicker: true,
            startDate: moment(),
            endDate: moment(),
            locale: {
                format: 'YYYY-M-DD'
            }
        });

        var tabella = document.getElementById('test-list');

        // Funzione Ajax al change dell'option
        $('#s1').on('change', function() {
            tabella.style.display = 'block';
            var category = $(this).val();
            $.ajax({
                url: "/{filename}",
                type: "GET",
                data: {
                    'category': category
                },
                success: function(data) {
                    var promozioni = data.promozioni;
                    console.log(promozioni)
                    var html = '';
                    if (promozioni.length > 0) {
                        for (let i = 0; i < promozioni.length; i++) {
                            html += '`<tr>\
                                 <td class="nome"> ' + promozioni[i]['nome'] + ' </td>\
                                 <td class="descrizione"> ' + promozioni[i]['descrizione'] + ' </td>\
                                 <td class="date_start"> ' + promozioni[i]['date_start'] + ' </td>\
                                 <td> ' + promozioni[i]['date_end'] + ' </td>\
                            </tr>`'
                        }
                        
                    } else {
                        html += '<tr>\
                                 <td> Nessuna promozione trovata</td>\
                                 </tr>';
                    }
                    var options = {
                        valueNames: ['nome', 'descrizione', 'date_start']
                    };

                    var userList = new List('users', options);
                   
                    $("#tbody").html(html);
                    // Ricerca
                   
                    var userList = new List('users', options);
                    //Prova pagination
                    var monkeyList = new List('test-list', {
                        valueNames: ['nome'],
                        page: 10,
                        pagination: true
                    });
                }
            });
        });
    });
</script>

<style>
    .pagination li a {

        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        padding: 0;
        margin: 0 3px;
        border-radius: 50% !important;
        width: 36px;
        height: 36px;
        font-size: 0.875rem;
        background-color: red;
    }

    .sort {
        margin: 0 !important;
        padding: 8px 30px;
        border-radius: 6px;
        border: none;
        display: inline-block;
        color: white;
        text-decoration: none;
        background-color: red;
    }

    .sort:hover {
        text-decoration: none;
        background-color: #ff5050;
    }

    .sort:focus {
        outline: none;
    }

    .sort:after {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-bottom: 5px solid transparent;
        content: "";
        position: relative;
        top: -10px;
        right: -5px;
    }

    .sort.asc:after {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #fff;
        content: "";
        position: relative;
        top: 13px;
        right: -5px;
    }

    .sort.desc:after {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-bottom: 5px solid #fff;
        content: "";
        position: relative;
        top: -10px;
        right: -5px;
    }
</style>
@stop