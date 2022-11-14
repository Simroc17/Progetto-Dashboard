@extends('layouts.master')

@section('title', 'Date Range Picker - Form Plugins')

@section('headerStyle')
<link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}">
@stop

@section('content')

<main id="js-page-content" role="main" class="page-content bg-white" style="color: white;
    background-color: black!important;">

    <div class="subheader">
        <h1 class="subheader-title">
            Ricerca Promozioni
        </h1>
    </div>
    <div class="row" style="margin-left: 1300px;">
        <li class="mb-3 ">
            <span class="js-get-date  " style="color:#ff5050"></span>
        </li>
    </div>

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

    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Promozioni attive nell'intervallo: <span class="ml-1" id="dataInizio"></span> 
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show ">
                    <div class="table-list-container " id="users">
                        <div class="row justify-content-between">
                            <div class="col-10 ml-3 mb-3"><input type="text" class="search " placeholder="Search" />
                                <!-- <button class="  sort btn  col-2  " data-sort="date_start" style="background-color: red; border-color: red; "> Ordina per data </button> -->
                            </div>
                            <div class="col justify-content-between">
                                <i class="bullet-success"></i> Attiva
                                <i class="bullet-danger"></i> Scaduta
                            </div>
                        </div>

                        <!-- datatable start -->
                        <table id="intestazione" style="display: none;" class="table table-hover table-striped w-100 mt-1">
                            <thead>
                            <tr class="text-white" role="row" style="background-color: red;">
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;" >Loghi</th>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;" ><button type="button" class="sort" data-sort="nome">Promo<i class="caret"></i></button></th>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 35%;" ><button type="button" class="sort" data-sort="descrizione">Descrizione<i class="caret"></i></button></th>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;" ><button type="button" class="sort" data-sort="date_start">Data inizio<i class="caret"></i></button></th>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;" ><button type="button" class="sort" data-sort="date_end">Data fine<i class="caret"></i></button></th>

                                </tr>
                            </thead>
                        </table>
                        <table id="test-list" style="display: none;" class="table table-hover table-striped w-100 mt-1">
                            <!-- <thead>
                                <tr class="text-white" role="row" style="background-color: red;">
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 5%;" >Loghi</th>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;" >Promo</th>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 35%;" >Descrizione</th>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;" >Data inizio</th>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 15%;" >Data fine</th>

                                </tr>
                            </thead> -->
                            <tbody id="tbody" class="list ">
                                @if (count($arrayPromo)>0)
                                @foreach ($arrayPromo as $promozione )
                                <tr>
                                    <td style="width: 5%;">
                                        @if ($promozione->id_canale==75)
                                        <img src="img\decoNuova.png" alt="" style="width: 50px;">
                                        @elseif ($promozione->id_canale==92)
                                        <img src="img\sebonNuova.png" alt="" style="width: 50px;">
                                        @elseif ($promozione->id_canale==141)
                                        <img src="img\ayokaNuova.png" alt="" style="width: 50px;">
                                        @else($promozione->id_canale==143)
                                        <img src="" alt="" style="width: 50px;">
                                        @endif
                                    </td>
                                    <td class="nome">{{ $promozione['nome'] }}</td>
                                    <td class="descrizione">{{ $promozione['descrizione'] }}</td>
                                    <td class="date_start">{{ $promozione['date_start'] }}</td>
                                    <td class="date_end">{{ $promozione['date_end'] }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <table id="tfoot" style="display: none;" class="table-footer">
                            <tr>
                                <td class="table-pagination position-absolute">
                                    <button type="button" style="border: none; background-color: #ff0202a8;" class="jPaginateBack"><i class="material-icons keyboard_arrow_left">&#xe314;</i></button>
                                    <ul class="pagination"></ul>
                                    <button type="button" style="border: none; background-color: #ff0202a8;" class="jPaginateNext"><i class="material-icons keyboard_arrow_right">&#xe315;</i></button>
                                </td>
                                
                                
                            </tr>
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
    var promozione = <?php echo json_encode($promozioni) ?>;
    // console.log(promozione);

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
    // Prova ricerca
    var options = {
        valueNames: ['nome', 'descrizione'],
        page: 10,
        pagination: {
            innerWindow: 1,
            left: 0,
            right: 0,
            paginationClass: "pagination",
        }
    };

    var userList = new List('users', options);
    // Prova Pagination
    var monkeyList = new List('test-list', {
        valueNames: ['nome', 'descrizione', 'date_start',  'date_end'],
        page: 10,
        pagination: {
            innerWindow: 1,
            left: 0,
            right: 0,
            paginationClass: "pagination",
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('.jPaginateNext').on('click', function() {
            var list = $('.pagination').find('li');
            $.each(list, function(position, element) {
                if ($(element).is('.active')) {
                    $(list[position + 1]).trigger('click');
                }
            })
        });


        $('.jPaginateBack').on('click', function() {
            var list = $('.pagination').find('li');
            $.each(list, function(position, element) {
                if ($(element).is('.active')) {
                    $(list[position - 1]).trigger('click');
                }
            })
        });
        // Funzione calendario
        $('#datepicker-2, #datepicker-modal-3').daterangepicker({
            timePicker: true,
            startDate: moment(),
            endDate: moment(),
            locale: {
                format: 'YYYY-MM-DD'
            }
        });

        var tabella = document.getElementById('test-list');
        var intestazione = document.getElementById('intestazione');
        var tabfoot = document.getElementById('tfoot');

        // Funzione Ajax al change dell'option
        $('#bottone').on('click', function() {
            var category = $('#s1').val();





            let arrayDate = selezionaData();
            // console.log(arrayDate);
            let dateStart = arrayDate[0];
            let dateEnd = arrayDate[1];
            // console.log(typeof(dateStart), dateStart);
            // console.log(dateEnd);
            tabella.style.display = 'block';
            intestazione.style.display = 'block';
            tabfoot.style.display = 'block';
            tabella.style = 'col-12';
            intestazione.style = 'col-12';


            $.ajax({
                url: "/{filename}",
                type: "GET",
                data: {
                    'category': category,
                    'dateStart': dateStart,
                    'dateEnd': dateEnd


                },
                success: function(data) {


                    // console.log(data)
                    var html = data;

                    var options = {
                        valueNames: ['nome', 'descrizione', 'date_start', 'date_end'],
                        page: 10,
                        pagination: {
                            innerWindow: 1,
                            left: 0,
                            right: 0,
                            paginationClass: "pagination",
                        }
                    };

                    
                    var userList = new List('users', options);


                    $("#tbody").html(html);
                    // Ricerca dopo filtro supermercato

                    var userList = new List('users', options);
                    //Prova pagination
                    var monkeyList = new List('test-list', {
                        valueNames: ['nome', 'descrizione', 'date_start', 'date_end'],
                        page: 10,
                        pagination: {
                            innerWindow: 1,
                            left: 0,
                            right: 0,
                            paginationClass: "pagination",
                        }
                    });
                }
            });
        });
    });
</script>

<style>
    
    .material-icons {
        font-family: 'Material Icons';
        font-weight: normal;
        font-style: normal;
        font-size: 24px;
        line-height: 1;
        letter-spacing: normal;
        text-transform: none;
        display: inline-block;
        white-space: nowrap;
        word-wrap: normal;
        direction: ltr;
        -webkit-font-feature-settings: 'liga';
        -webkit-font-smoothing: antialiased;
    }

    .table-search {
        width: 310px;
        border-left: 1px solid #d2d2d2;
    }

    .table-search .search {
        width: 100%;
        border: none;
        background: transparent;
        box-shadow: none;
    }

    /**/

    .table-pagination {
        white-space: nowrap;
    }

    .table-pagination:after {
        display: block;
        content: "";
        clear: both;
    }

    .jPaginateBack,
    .jPaginateNext,
    .table-list-container .pagination {
        float: left;
    }

    .jPaginateBack,
    .jPaginateNext {
        line-height: 1.75rem;
        width: 1.75rem;
        text-align: center;
        user-select: none;
    }

    .jPaginateBack .material-icons,
    .jPaginateNext .material-icons {
        display: block;
        font-size: 16px;
        line-height: inherit;
    }

    .table-footer {
        background-color: #fff;
        margin-top: -1px;

        z-index: -1;
    }

    .table-list {
        min-height: 176px;
    }

    .table-list th {
        border-bottom: 0.6px solid #d2d2d2;
    }

    .table-list td {
        white-space: nowrap;
        height: 1.75rem;
        vertical-align: top;
        padding: 10px;
        border-bottom: 1px solid #d2d2d2;
    }

    .table-list tr:last-child td {
        height: auto;
    }

    .bullet {
        margin-top: 13px;
    }

    i.bullet,
    i.bullet-primary,
    i.bullet-success,
    i.bullet-warning,
    i.bullet-danger {
        display: inline-table;
        width: 8px;
        height: 8px;
        border-radius: 50%;
    }

    i.bullet {
        opacity: 0.5;
    }

    i.bullet-primary {
        background-color: #33a7d2;
    }

    i.bullet-success {
        background-color: #6dad21;
    }

    i.bullet-warning {
        background-color: #ef9327;
    }

    i.bullet-danger {
        background-color: #db4f4f;
    }

    td a {
        color: black;
        text-decoration: none;
        /* no underline */
    }

    /* td img {
        width: 100%;;
    } */
    .img75 {
        background-image: url("img/decoNuova.png");
        background-size: 60px;
        background-position: center;
        background-repeat: no-repeat;
        background-position-x: center;
        width: 100%;
        border-radius: 35px;
        ;

    }

    .img92 {
        background-image: url("img/sebonNuova.png");
        background-size: 60px;
        background-position: center;
        background-repeat: no-repeat;
        background-position-x: center;
        border-radius: 35px;
        width: 100%;
        ;
    }

    .img141 {
        background-image: url("img/ayokaNuova.png");
        background-size: 60px;
        background-position: center;
        background-repeat: no-repeat;
        background-position-x: center;
        border-radius: 35px;
        width: 100%;
        ;
    }

    .img143 {
        background-image: url("img/ayokaNuova.png");
        background-size: 60px;
        background-position: center;
        background-repeat: no-repeat;
        background-position-x: center;
        border-radius: 35px;
        width: 100%;
        ;
    }

    .pagination {
        border: 0;
    }

    .pagination a.page {
        display: block;
        line-height: 35px;
        width: 35px;
        text-align: center;
        text-decoration: none;
        font-size: 12px;
    }

    .pagination a.page:hover,
    .pagination a.page:focus {
        background-color: #33a7d2;
        color: #fff;
    }

    .pagination .disabled .page {
        display: none;
    }

    .active a.page,
    .active a.page:hover,
    .active a.page:focus {
        color: #a0a0a0;
        pointer-events: none;
        cursor: default;
    }

    .pagination a.page {
        user-select: none;
    }

    /* .pagination li a {

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
    } */

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
        background-color: #343a40;
    }

    .sort:focus {
        outline: none;
    }

    /* .sort:after {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-bottom: 5px solid transparent;
        content: "";
        position: relative;
        top: -10px;
        right: -5px;
    } */

    /* .sort.asc:after {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #fff;
        content: "";
        position: relative;
        top: 13px;
        right: -5px;
    } */

    /* .sort.desc:after {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-bottom: 5px solid #fff;
        content: "";
        position: relative;
        top: -10px;
        right: -5px;
    }  */
</style>



@stop