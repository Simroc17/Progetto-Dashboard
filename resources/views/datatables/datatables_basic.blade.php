@extends('layouts.master')



@section('headerStyle')
<link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/statistics/chartjs/chartjs.css')}}">
<link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/datagrid/datatables/datatables.bundle.css') }}">
@stop

@section('content')
<main id="js-page-content" role="main" class="page-content">

    @component('common-components.breadcrumb')
    @slot('item1') Datatables @endslot
    @slot('item2') ColumnFilter @endslot
    @endcomponent
    <div class="card-body" style="padding-left: 0">
        <div class="row">
            <div class="col-12 col-sm-8">
                <h5> <i class="fi-megaphone"></i><span style="text-decoration: underline"> {{$promo[0]->nome}}: {{$promo[0]->descrizione}} </span> </h5>
                <h6><i class="ionicons ion-ios-calendar-outline"></i><span style="font-style: italic"> DAL {{$promo[0]->date_start}} AL {{$promo[0]->date_end}} </span> </h6>

                <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#modal-pv" style="max-width:10rem"><i class="ionicons ion-android-home"></i> Punti Vendita</button>

                <!--Popup lista punti vendita-->
                <!-- <div class="modal fade" id="modal-pv" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-secondary">
                                <h4 class="modal-title">Elenco punti vendita</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color: #fff">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Location</th>
                                            <th>Indirizzo</th>
                                            <th>Provincia</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>Contrada Scrofeta, 83100 Avellino AV, Italia</td>
                                            <td>AV</td>
                                        </tr>
                                        <tr>
                                            <td>Avellino</td>
                                            <td>Contrada Scrofeta, 83100 Avellino AV, Italia</td>
                                            <td>AV</td>
                                        </tr>
                                        <tr>
                                            <td>Caserta</td>
                                            <td>Via Sud Piazza d'Armi, 20, 81100 Caserta CE, Italia</td>
                                            <td>CE</td>
                                        </tr>
                                        <tr>
                                            <td>Caserta</td>
                                            <td>Via Sud Piazza d'Armi, 22, 81100 Caserta CE, Italia</td>
                                            <td>CE</td>
                                        </tr>
                                        <tr>
                                            <td>Cesa</td>
                                            <td>Via G. Matteotti, 81030 Cesa CE, Italia</td>
                                            <td>CE</td>
                                        </tr>
                                        <tr>
                                            <td>Cesa</td>
                                            <td>Via G. Matteotti, 81030 Cesa CE, Italia</td>
                                            <td>CE</td>
                                        </tr>
                                        <tr>
                                            <td>Curti</td>
                                            <td>Via Appia, 226, 81040 Curti CE, Italia</td>
                                            <td>CE</td>
                                        </tr>
                                        <tr>
                                            <td>Curti</td>
                                            <td>Via Nazionale Appia, 226, 81040 Curti CE, Italia</td>
                                            <td>CE</td>
                                        </tr>
                                        <tr>
                                            <td>Ercolano</td>
                                            <td>Via Sacerdote Cozzolino Benedetto, 86, 80056 Ercolano NA, Italia</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td>Ercolano</td>
                                            <td>Via Sacerdote Cozzolino Benedetto, 86, 80056 Ercolano NA, Italia</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td>Mattine</td>
                                            <td>Via Madonna della Pace, 46, 84043 Mattine SA, Italia</td>
                                            <td>SA</td>
                                        </tr>
                                        <tr>
                                            <td>Mattine</td>
                                            <td>Via Madonna della Pace, 84043 Mattine SA, Italia</td>
                                            <td>SA</td>
                                        </tr>
                                        <tr>
                                            <td>Mercato San Severino</td>
                                            <td>Via Ferrovia, 1, 84085 Mercato San Severino SA, Italia</td>
                                            <td>SA</td>
                                        </tr>
                                        <tr>
                                            <td>Mercato San Severino</td>
                                            <td>Via Ferrovia, 1, 84085 Mercato San Severino SA, Italia</td>
                                            <td>SA</td>
                                        </tr>
                                        <tr>
                                            <td>Montano</td>
                                            <td>Via Ceraselle, 81059 Montano CE, Italia</td>
                                            <td>CE</td>
                                        </tr>
                                        <tr>
                                            <td>Napoli</td>
                                            <td>Via Arenaccia, 154, 80141 Napoli NA, Italia</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td>Napoli</td>
                                            <td>Via Arenaccia, 154, 80141 Napoli NA, Italia</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td>Roccaravindola</td>
                                            <td>all'interno del centro commerciale I Melograni, SS 85 Venafrana, Loc, 86170 Roccaravindola IS, Italia</td>
                                            <td>IS</td>
                                        </tr>
                                        <tr>
                                            <td>Sant'Anastasia</td>
                                            <td>Via Pomigliano, 80048 Sant'Anastasia NA, Italia</td>
                                            <td>NA</td>
                                        </tr>
                                        <tr>
                                            <td>Santa Maria Capua Vetere</td>
                                            <td>Via Galatina, 209, 81055 Santa Maria Capua Vetere CE, Italia</td>
                                            <td>CE</td>
                                        </tr>
                                        <tr>
                                            <td>Santa Maria Capua Vetere</td>
                                            <td>Via Galatina, 209, 81055 Santa Maria Capua Vetere CE, Italia</td>
                                            <td>CE</td>
                                        </tr>
                                        <tr>
                                            <td>Vallo della Lucania</td>
                                            <td>Via Niccolò Lettiero, 84078 Vallo della Lucania SA, Italia</td>
                                            <td>SA</td>
                                        </tr>
                                        <tr>
                                            <td>Vallo della Lucania</td>
                                            <td>Via Niccolò Lettiero, 84078 Vallo della Lucania SA, Italia</td>
                                            <td>SA</td>
                                        </tr>
                                        <tr>
                                            <td>Venafro</td>
                                            <td>SS 85 Venafrana, 85, 86079 Venafro IS, Italia</td>
                                            <td>IS</td>
                                        </tr>
                                        <tr>
                                            <td>Volla</td>
                                            <td>Via Eduardo de Filippo, 112, 80040 Volla NA, Italia</td>
                                            <td>NA</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Chiudi</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="col-12 col-sm-4 text-right promo_category">
                <a target="_blank" href="https://preview.volantinopiu.it/volantino{{$volantino[0]->id_volantino}}00.html"><img src="https://resources.volantinopiu.it/flyer/{{$array[0]}}/{{$array[1]}}/{{$array[2]}}/{{$array[3]}}/{{$array[4]}}/pagine/1.jpg" style="margin-right: 6px; max-width: 130px; max-height:10rem" class="zoom"></a>
            </div>

        </div>

    </div>

    <!-- <div class="subheader justify-content-between">
        <h1 class="subheader-title">
            Dettaglio Volantino
        </h1>
        <div style="border-radius: 0.5rem;">
            <a target="_blank" href="https://preview.volantinopiu.it/volantino{{$volantino[0]->id_volantino}}00.html"><img src="https://resources.volantinopiu.it/flyer/{{$array[0]}}/{{$array[1]}}/{{$array[2]}}/{{$array[3]}}/{{$array[4]}}/pagine/1.jpg" style="margin-right: 6px; max-width: 130px; max-height:10rem"></a>
        </div>
    </div> -->



    <div class="row justify-content-between">
        <div style="font-size: 20px;" class="col-6"> <i class="fa-solid fa-bomb"></i> {{$promo[0]->nome}}: {{$promo[0]->descrizione}}</div>
    </div>
    <div style="font-size: 15px; margin-bottom:1rem;"><i class="fa-regular fa-clock"></i> DAL {{$promo[0]->date_start}} AL {{$promo[0]->date_end}}</div>

    <div class="row mb-2">
        <div class="col-lg-3 col-6" style="border-radius:25px;">
            <div class="box text-center" style=" background-color: #17a2b8; border-radius:5px;">
                <h3 class="fw-500 text-white"> Connessioni</h3>
                <hr style=" border-bottom-style: solid;">
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <h5 class="description-header text-white">{{$sommaDesktop+$sommaMobile}}</h5>
                            <span class="description-text text-white">TOTALI</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="description-block">
                            <h5 class="description-header text-white">{{$sommaUnicaDesktop+$sommaUnicaMobile}}</h5>
                            <span class="description-text text-white">UNICHE</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6" style="border-radius:25px;">
            <div class="box text-center" style=" background-color: #dc3545; border-radius:5px;">
                <h3 class="fw-500 text-white"> Pagine</h3>
                <hr style=" border-bottom-style: solid;">
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <h5 class="description-header text-white">{{$volantino1}}</h5>
                            <span class="description-text text-white">N.VOLANTINI</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="description-block">
                            <h5 class="description-header text-white">{{$sommaDesktopPag+$sommaMobilePag}}</h5>
                            <span class="description-text text-white">VISUALIZZATE</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6" style="border-radius:25px;">
            <div class="box text-center" style=" background-color: #ffc107; border-radius:5px;">
                <h3 class="fw-500 text-white">Interattivi</h3>
                <hr style=" border-bottom-style: solid;">
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <h5 class="description-header text-white">{{count($finale)}}</h5>
                            <span class="description-text text-white">TOTALI</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="description-block">
                            <h5 class="description-header text-white">{{$sommaInter}}</h5>
                            <span class="description-text text-white">CLICK RICEVUTI</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6" style="border-radius:25px;">
            <div class="box text-center" style=" background-color: #28a745; border-radius:5px;">
                <h3 class="fw-500 text-white">Prodotti</h3>
                <hr style=" border-bottom-style: solid;">
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <h5 class="description-header text-white">{{count($products)}}</h5>
                            <span class="description-text text-white">SU {{count($products)}} TOTALI</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="description-block">
                            <h5 class="description-header text-white">@if($interattivoProdotti == '[]') 0 @else{{$interattivoProdotti[0]->totali}} @endif</h5>
                            <span class="description-text text-white">CLICK RICEVUTI</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link active" href="" aria-current="page" id="connessioni">Connessioni</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#" id="pagine">Pagine</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " href="#" id="interattivi">Interattivi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#" id="prodotti">Prodotti</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#" id="riepilogo">Riepilogo</a>
        </li>
    </ul>

    <!--/////////// DIV CONNESSIONI //////////-->
    <div class="row" id="pagina1">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div id="panel-2" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Visite Geografiche
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-tag">
                                    A horizontal bar chart provides a way of showing data values represented as horizontal bars. It is sometimes used to show trend data, and the comparison of multiple data sets on top of another
                                </div>
                                <div id="horizontalBarChart">
                                    <canvas style="width:100%; height:500px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div id="panel-8" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Andamento giornaliero
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-tag">
                                    A bar chart provides a way of showing data values represented as vertical bars. It is sometimes used to show trend data, and the comparison of multiple data sets side by side
                                </div>
                                <div id="barChart">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-6" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Connessioni per dispositivo
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-tag">
                                    Pie charts are probably the most commonly used chart there are. They are divided into segments, the arc of each segment shows the proportional value of each piece of data
                                </div>
                                <div id="pieChart">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div id="panel-12" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Connessioni uniche per dispositivo
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-tag">
                                    Doughnut charts are probably the most commonly used chart there are. They are divided into segments, the arc of each segment shows the proportional value of each piece of data
                                </div>
                                <div id="doughnutChart">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="panel-container show ">
                <div class="table-list-container " id="users">
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                            <thead class="bg-primary-600">
                                <tr>
                                    <th>Regione</th>
                                    <th>Click Unici</th>
                                    <th>Click Totali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datiGrafico as $dato )
                                <tr>    
                                    <td class="regione" style="width: 35%;" >{{ $dato['place'] }}</td>
                                    <td class="click_unici" style="width: 30%;">{{ $dato['uniche'] }}</td>
                                    <td class="click_totali" style="width: 35%;">{{ $dato['somma']}}</td>    
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Regione</th>
                                    <th>Click Unici</th>
                                    <th>Click Totali</th>
                                </tr>
                            </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--//////// DIV PAGINE ////////////-->
    <div id="pagina2" class="row" style="display: none;">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div id="panel-8" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Andamento giornaliero
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-tag">
                                    A bar chart provides a way of showing data values represented as vertical bars. It is sometimes used to show trend data, and the comparison of multiple data sets side by side
                                </div>
                                <div id="barChart1">
                                    <canvas style="height: 190px!important; width: 700px!important;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-6" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Connessioni per dispositivo
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-tag">
                                    Pie charts are probably the most commonly used chart there are. They are divided into segments, the arc of each segment shows the proportional value of each piece of data
                                </div>
                                <div id="pieChart1">
                                    <canvas style="height: 190px!important; width: 700px!important;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div id="panel-12" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Connessioni uniche per dispositivo
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-tag">
                                    Doughnut charts are probably the most commonly used chart there are. They are divided into segments, the arc of each segment shows the proportional value of each piece of data
                                </div>
                                <div id="doughnutChart1">
                                    <canvas style="height: 190px!important; width: 700px!important;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="panel-container show ">
                <div class="table-list-container " id="users2">

                    <table id="dt-basic-example1" class="table table-bordered table-hover table-striped w-100">
                            <thead class="bg-primary-600">
                                <tr style="background-color: #dc3545;">
                                    <th>Numero Pagina</th>
                                    <th>Volantini Online</th>
                                    <th>Visite Uniche</th>
                                    <th>Visite Totali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($volantinoId as $dato )
                                <tr>
                                    <td class="regione2" style="width: 35%;">{{$dato['num_pagina']}}</td>
                                    <td class="volantini_online" style="width: 30%;"><a target="_blank" href="https://preview.volantinopiu.it/volantino{{$volantino[0]->id_volantino}}00.html">vis.online</a></td>
                                    <td class="click_unici2" style="width: 25%;">{{ $dato['uniche'] }}</td>
                                    <td class="click_totali2" style="width: 30%;">{{ $dato['somma']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Numero Pagina</th>
                                    <th>Volantini Online</th>
                                    <th>Visite Uniche</th>
                                    <th>Visite Totali</th>
                                </tr>
                            </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!--//////////// DIV INTERATTIVI /////////////-->
    <div id="pagina3" class="row" style="display: none;">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div id="panel-3" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Andamento <span class="fw-300"><i>Interattivi</i></span>
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-tag">
                                    A stacked bar chart, is a graph that is used to break down and compare parts of a whole. Each bar in the chart represents a whole, and segments in the bar represent different parts or categories of that whole
                                </div>
                                <div id="barStacked">
                                    <canvas style="height: 190px!important; width: 700px!important;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div id="panel-8" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Interattivi per tipologia
                            </h2>
                            <div class="panel-toolbar">
                                <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                            </div>
                        </div>
                        <div class="panel-container show">
                            <div class="panel-content">
                                <div class="panel-tag">
                                    A bar chart provides a way of showing data values represented as vertical bars. It is sometimes used to show trend data, and the comparison of multiple data sets side by side
                                </div>
                                <div id="barChart2">
                                    <canvas style="height: 190px!important; width: 700px!important;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card bg-light mb-3" style="max-width: 100%;">
                        <div class="card-header text-dark">8 Interattivi più cliccati</div>
                        <div class="card-body row">
                            @php $count = 0 @endphp
                            @foreach($finale as $fin)
                            <div class="col-12 col-md-6 col-xl-3 p-1 text-center div-top">
                                <div class="container-fluid">
                                    <div class="col-12">
                                        <span class="badge bg-primary coccarda float-left text-white" style="box-shadow: 0 0 3px #007bff; font-size: 18px;">{{$count+1}}°</span>
                                        <span class="badge bg-success text-white" style="font-size: 20px; border-radius: 0.1; margin-left: -36px">{{$fin->sommaQta}}</span>
                                    </div>
                                    <div class="col-12" style="min-height: 70px; margin-top: 10px">
                                        <h1 style="font-family:verdana; font-size: 1.2rem;">{{$fin->descrizione}}</h1>
                                    </div>
                                    <div class="col-12 p-1">
                                        @php $array = str_split($fin->id_volantino); @endphp
                                        @php $image_url = "https://resources.volantinopiu.it/flyer/{$array[0]}/{$array[1]}/{$array[2]}/{$array[3]}/{$array[4]}/screenshot/{$fin->id_prodotto}.jpg"; @endphp
                                        @php
                                            $headers = @get_headers($image_url);
                                            if (strpos($headers[0], '200') === false) {
                                                $image_exists = false;
                                            } else {
                                                $image_exists = true;
                                            }
                                        @endphp
                                        @if ($image_exists)
                                            <img style="height:200px;" src="{{ $image_url }}" alt="Immagine" class="img-prod zoom m-b-2">
                                        @else
                                            <img src="https://www.volantinopiu.it/img/nofoto.jpg" class="img-prod" style="height:200px;">
                                        @endif
                                    </div>
                                    <div class="col-12 p-1">
                                        <div class="float-left">
                                        @if($fin->tipo=='ricetta')<img src="https://preview.volantinopiu.it//public/image/icona-ricette.png" style="width: 30px;">
                                        @elseif($fin->tipo=='video')<img src="https://preview.volantinopiu.it//public/image/icona-video.png" style="width: 30px;">
                                        @elseif($fin->tipo=='curiosita')<img src="https://preview.volantinopiu.it//public/image/icona-curiosita.png" style="width: 30px;"> 
                                        @elseif($fin->tipo=='collegamento')<img src="https://preview.volantinopiu.it//public/image/icona-collegamenti.png" style="width: 30px;"> 
                                        @endif {{$fin->tipo}} - {{$fin->titolo}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php $count++ @endphp
                            @if($count == 8)
                            @break
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="panel-container show ">
                <div class="table-list-container " id="users3">

                    <table id="dt-basic-example2" class="table table-bordered table-hover table-striped w-100">
                            <thead class="bg-primary-600">
                                <tr>
                                    <th>Tipo</th>
                                    <th>Titolo</th>
                                    <th>Prodotto</th>
                                    <th>Click Unici</th>
                                    <th>Click Totali</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($finale as $finale )
                                            
                                            
                                            @if ($finale->tipo=='ricetta')
                                                <tr>
                                                    <td class="tipo1" style="width: 10%;" >{{ $finale->tipo }}</td>
                                                    <td class="titolo1" style="width:45%;">{{ $finale->titolo }}</td>
                                                    <td class="prodotto1" style="width:25%">{{ $finale->descrizione }} - {{ $finale->descrizione_estesa}}</td>
                                                    <td class="unici1" style="width: 10%;">{{ $finale->sommaUnici }}</td>
                                                    <td class="totali1" style="width: 10%;">{{ $finale->sommaQta }}</td>
                                                </tr>
                                            @endif
                                            @if ($finale->tipo=='icona')
                                            <tr>
                                                    <td class="tipo1" style="width: 10%;" >{{ $finale->tipo }}</td>
                                                    <td class="titolo1" style="width:45%;">{{ $finale->titolo }}</td>
                                                    <td class="prodotto1" style="width:25%">{{ $finale->descrizione }} - {{ $finale->descrizione_estesa}}</td>
                                                    <td class="unici1" style="width: 10%;">{{ $finale->sommaUnici }}</td>
                                                    <td class="totali1" style="width: 10%;">{{ $finale->sommaQta }}</td>
                                                </tr>
                                            @endif
                                            @if ($finale->tipo=='curiosita')
                                            <tr>
                                                    <td class="tipo1" style="width: 10%;" >{{ $finale->tipo }}</td>
                                                    <td class="titolo1" style="width:45%;">{{ $finale->titolo }}</td>
                                                    <td class="prodotto1" style="width:25%">{{ $finale->descrizione }} - {{ $finale->descrizione_estesa}}</td>
                                                    <td class="unici1" style="width: 10%;">{{ $finale->sommaUnici }}</td>
                                                    <td class="totali1" style="width: 10%;">{{ $finale->sommaQta }}</td>
                                                </tr>



                                            @endif
                                            @if ($finale->tipo=='collegamento')
                                            <tr>
                                                    <td class="tipo1" style="width: 10%;" >{{ $finale->tipo }}</td>
                                                    <td class="titolo1" style="width:45%;">{{ $finale->titolo }}</td>
                                                    <td class="prodotto1" style="width:25%">{{ $finale->descrizione }} - {{ $finale->descrizione_estesa}}</td>
                                                    <td class="unici1" style="width: 10%;">{{ $finale->sommaUnici }}</td>
                                                    <td class="totali1" style="width: 10%;">{{ $finale->sommaQta }}</td>
                                                </tr>
                                            @endif
                                            @if ($finale->tipo=='video')
                                            <tr>
                                                    <td class="tipo1" style="width: 10%;" >{{ $finale->tipo }}</td>
                                                    <td class="titolo1" style="width:45%;">{{ $finale->titolo }}</td>
                                                    <td class="prodotto1" style="width:25%">{{ $finale->descrizione }} - {{ $finale->descrizione_estesa}}</td>
                                                    <td class="unici1" style="width: 10%;">{{ $finale->sommaUnici }}</td>
                                                    <td class="totali1" style="width: 10%;">{{ $finale->sommaQta }}</td>
                                                </tr>
                                            @endif
                                            
                                
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Titolo</th>
                                    <th>Prodotto</th>
                                    <th>Click Unici</th>
                                    <th>Click Totali</th>
                                </tr>
                            </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- ////Div PRODOTTI////////////// -->
    <div id="pagina4" class="row" style="display:none;">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card bg-light mb-3" style="max-width: 100%;">
                        <div class="card-header text-dark">8 Prodotti più cliccati</div>
                        <div class="card-body row">
                            @php $count = 0 @endphp
                            @foreach($products as $pro)
                            <div class="col-12 col-md-6 col-xl-3 p-1 text-center div-top">
                                <div class="col-12">
                                <span class="badge bg-primary coccarda float-left text-white" style="box-shadow: 0 0 3px #007bff; font-size: 18px;">{{$count+1}}°</span>
                                    <span class="badge bg-success text-white" style="font-size: 20px; border-radius: 0.1; margin-left: -36px">{{$pro->sommaQta}}</span>
                                </div>
                                <div class="col-12" style="min-height: 70px; margin-top: 10px">
                                        <h1 style="font-family:verdana; font-size: 1.2rem;">{{$pro->descrizione}}</h1>
                                    </div>
                                <div class="col-12 p-2">
                                <img style="height:200px;"src="https://resources.volantinopiu.it/flyer/{{$array[0]}}/{{$array[1]}}/{{$array[2]}}/{{$array[3]}}/{{$array[4]}}/screenshot/{{$pro->id_prodotti}}.jpg" class="img-prod zoom">
                                </div>
                            </div>
                            @php $count++ @endphp
                            @if($count == 8)
                            @break
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="panel-container show ">
                <div class="table-list-container " id="users4">
                    <!-- <div class="row justify-content-between">
                        <div class="col-10 ml-3 mb-3"><input type="text" class="search " placeholder="Search" />

                        </div>

                    </div>
                    <table id="intestazione4" class="table table-bordered table-hover table-striped w-100">
                        <thead class="bg-warning-200">
                            <tr class="text-white" role="row" style="background-color: red;">
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;"><button type="button" class="sort" data-sort="tipoPr">Prodotto</button></th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 50%;"><button type="button" class="sort" data-sort="descrizionePr">Descrizione</button></th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;"><button type="button" class="sort" data-sort="pagina">Pagina</button></th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;"><button type="button" class="sort" data-sort="uniciPr">Click unici</button></th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;"><button type="button" class="sort" data-sort="totaliPr">Click totali</button></th>
                            </tr>
                        </thead>
                    </table>
                    <table id="test-list4" class="table table-hover table-striped w-100 mt-1">
                        <tbody id="tbody3" class="list ">
                            @foreach ($products as $product )



                            <tr>
                                <td class="tipoPr" style="width: 20%;">{{ $product->descrizione }}</td>
                                <td class="descrizionePr" style="width:50%;">{{ $product->descrizione_estesa }}</td>
                                <td class="pagina" style="width:10%;">{{$product->pagina}}</td>
                                <td class="uniciPr" style="width: 10%;">{{ $product->sommaUnici }}</td>
                                <td class="totaliPr" style="width: 10%;">{{ $product->sommaQta }}</td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <table id="tfoot4" style="display: block;margin-bottom: 50px;" class="table-footer">
                        <tr>
                            <td class="table-pagination position-absolute">
                                <button type="button" style="border: none; background-color: #ff0202a8;" class="jPaginateBack"><i class="material-icons keyboard_arrow_left">&#xe314;</i></button>
                                <ul class="pagination"></ul>
                                <button type="button" style="border: none; background-color: #ff0202a8;" class="jPaginateNext"><i class="material-icons keyboard_arrow_right">&#xe315;</i></button>
                            </td>


                        </tr>
                    </table> -->
                    
                    <table id="dt-basic-example3" class="table table-bordered table-hover table-striped w-100">
                            <thead class="bg-primary-600">
                                <tr>
                                    <th>Descrizione</th>
                                    <th>Descrizione Estesa</th>
                                    <th>Click Unici</th>
                                    <th>Click Totali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product )       
                                    <tr>
                                        <td class="tipoPr" style="width: 20%;" >{{ $product->descrizione }}</td>
                                        <td class="titoloPr" style="width:60%;">{{ $product->descrizione_estesa }}</td>
                                        
                                        <td class="uniciPr" style="width: 10%;">{{ $product->sommaUnici }}</td>
                                        <td class="totaliPr" style="width: 10%;">{{ $product->sommaQta }}</td>
                                    </tr>  
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>Descrizione</th>
                                    <th>Descrizione Estesa</th>
                                    <th>Click Unici</th>
                                    <th>Click Totali</th>
                                </tr>
                            </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- ///////////////// DIV RIEPILOGO /////////////////////// -->
    <div id="pagina5" class="row" style="display:none;">

        <div class="col-xl-12 mb-3">

            <div class="panel-container show ">
                <div class="table-list-container " id="users5">
                    <div class="row justify-content-between">
                        <div class="col-10 ml-3 mb-3"><input type="text" class="search " placeholder="Search" />

                        </div>

                    </div>


                    <table id="test-list5" class="table table-striped data-t table-sm table-bordered table-volantino dataTable ">
                        <thead>
                            <tr class="text-white" role="row" style="background-color: red;">
                                <th colspan="2"></th>
                                <th colspan="6"><i class="bi bi-bar-chart-line-fill"></i> Connessioni</th>
                                <th></th>
                                <th colspan="2"><i class="bi bi-clipboard2-data-fill"></i> Visualizzazioni</th>
                                <th></th>
                                <th colspan="5"><i class="bi bi-cursor-fill"></i> Interazioni</th>
                                <th></th>
                                <th colspan="3"><i class="bi bi-cart3"></i> Spesa</th>
                            </tr>
                            <tr class="text-white fw-bold" role="row" style="background-color: #fb3e3e;">
                                <th colspan="2"><button type="button" class="sort" data-sort="i">Gruppo</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="d">Desktop</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="m">Mobile</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="t">Totali</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="de">Desktop</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="mo">Mobile</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="un">Uniche</button></th>
                                <th></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="uni">Uniche</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="tot">Totali</button></th>
                                <th></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="pr"><img src="https://preview.volantinopiu.it//public/image/icona-prodotto.png" style="width: 40px;"> Prodotti</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="ri"><img src="https://preview.volantinopiu.it//public/image/icona-ricette.png" style="width: 40px;">Ricette</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="vi"><img src="https://preview.volantinopiu.it//public/image/icona-video.png" style="width: 40px;"> Video</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="cu"><img src="https://preview.volantinopiu.it//public/image/icona-curiosita.png" style="width: 40px;"> Curiosita</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="li"><img src="https://preview.volantinopiu.it//public/image/icona-collegamenti.png" style="width: 40px;">Link</button></th>
                                <th></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="lis">Liste</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="imp"><i class="bi bi-currency-euro"></i> Importo</button></th>
                                <th colspan="1"><button type="button" class="sort" data-sort="med"><i class="bi bi-currency-euro"></i> Media</button></th>
                            </tr>
                        </thead>
                        <tbody id="tbody" class="list">
                            <tr role="row">
                                <td colspan="2" class="i">{{$volantino[0]->nome_canale}}</td>
                                <td colspan="1" class="d">{{$sommaDesktop}}</td>
                                <td colspan="1" class="m">{{$sommaMobile}}</td>
                                <td colspan="1" class="t">{{$sommaDesktop + $sommaMobile}}</td>
                                <td colspan="1" class="de">{{$sommaUnicaDesktop}}</td>
                                <td colspan="1" class="mo">{{$sommaUnicaMobile}}</td>
                                <td colspan="1" class="un">{{$sommaUnicaDesktop + $sommaUnicaMobile}}</td>
                                <td></td>
                                <td colspan="1" class="uni">{{$sommaMobileUnicPag + $sommaDesktopUnicPag}}</td>
                                <td colspan="1" class="tot">{{$sommaMobilePag + $sommaDesktopPag}}</td>
                                <td></td>
                                @if($interattivoProdotti == '[]')
                                <td class="pr">0</td>
                                @else
                                <td class="pr">{{$interattivoProdotti[0]->totali}}</td>
                                @endif
                                @if($interattivoRicette == '[]')
                                <td class="ri">0</td>
                                @else
                                <td class="ri">{{$interattivoRicette[0]->totali}}</td>
                                @endif
                                @if($interattivoVideo == '[]')
                                <td class="vi">0</td>
                                @else
                                <td class="vi">{{$interattivoVideo[0]->totali}}</td>
                                @endif
                                @if($interattivoCuriosita == '[]')
                                <td class="cu">0</td>
                                @else
                                <td class="cu">{{$interattivoCuriosita[0]->totali}}</td>
                                @endif
                                @if($interattivoLink == '[]')
                                <td class="li">0</td>
                                @else
                                <td class="li">{{$interattivoLink[0]->totali}}</td>
                                @endif
                                <td></td>
                                <td colspan="1" class="lis">0</td>
                                <td colspan="1" class="imp">0</td>
                                <td colspan="1" class="med">0</td>
                            </tr>
                        </tbody>
                    </table>
                    <table id="tfoot5" style="display: block;" class="table-footer">
                        <tr>
                            <td class="table-pagination position-absolute">
                                <button type="button" style="border: none; background-color: #ff0202a8;" class="jPaginateBack"><i class="material-icons keyboard_arrow_left">&#xe314;</i></button>
                                <ul class="pagination"></ul>
                                <button type="button" style="border: none; background-color: #ff0202a8;" class="jPaginateNext"><i class="material-icons keyboard_arrow_right">&#xe315;</i></button>
                            </td>


                        </tr>
                    </table>

                </div>

            </div>
        </div>

    </div>

</main>
<link rel="stylesheet" href="https://btn.ninja/css/addons.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

@stop

@section('footerScript')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
<script src="{{ URL::asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>
<script src="{{ URL::asset('js/datagrid/datatables/datatables.export.js') }}"></script>
<script src="{{ URL::asset('js/dependency/moment/moment.js') }}"></script>
<script src="{{ URL::asset('js/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
<script src="{{ URL::asset('js/statistics/chartjs/chartjs.bundle.js')}}"></script>


<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        console.log('DOM fully loaded and parsed');
        /////////////CONNESSIONI\\\\\\\\\\\\\\\\\\\\
        // Prova ricerca connessioni
        var options = {
            valueNames: ['tipo', 'titolo', 'prodotto', 'unici2', 'totali2', 'tipoPr', 'descrizionePr', 'pagina', 'uniciPr', 'totaliPr', 'regione', 'click_unici', 'click_totali', 'regione2', 'volantini_online', 'click_unici2', 'click_totali2'],
            page: 10,
            pagination: {
                innerWindow: 1,
                left: 0,
                right: 0,
                paginationClass: "pagination",
            }
        };

        var userList0 = new List('users', options);
        var userList = new List('users2', options);
        var userList1 = new List('users3', options);
        var userList2 = new List('users4', options);
        // Prova Pagination connsessioni
        var monkeyList = new List('test-list', {
            valueNames: ['tipo', 'titolo', 'prodotto', 'unici2', 'totali2', 'tipoPr', 'descrizionePr', 'pagina', 'uniciPr', 'totaliPr', 'regione', 'click_unici', 'click_totali', 'regione2', 'volantini_online', 'click_unici2', 'click_totali2'],
            page: 10,
            pagination: {
                innerWindow: 1,
                left: 0,
                right: 0,
                paginationClass: "pagination",
            }
        });
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


    });



    /* horizontal bar chart */
    var regioni = <?php echo json_encode($arrRegioni); ?>;
    var arrUniche = <?php echo json_encode($arrUniche); ?>;
    var arrTotali = <?php echo json_encode($arrTotali); ?>;
    var horizontalBarChart = function() {
        var horizontalBarChart = {
            labels: regioni,
            datasets: [{
                    label: "Connessioni Totali",
                    backgroundColor: color.primary._100,
                    borderColor: color.primary._100,
                    borderWidth: 1,
                    data: arrTotali

                },
                {
                    label: "Connessioni Uniche",
                    backgroundColor: color.primary._300,
                    borderColor: color.primary._500,
                    borderWidth: 1,
                    data: arrUniche
                }
            ]

        };
        var config = {
            type: 'horizontalBar',
            data: horizontalBarChart,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Horizontal Bar Chart'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Quarterly forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#horizontalBarChart > canvas").get(0).getContext("2d"), config);
    }
    /* horizontal bar chart -- end */

    /* bar chart */
    var connessioniUniche = <?php echo json_encode($arrayUniq); ?>;
    var connessioniTotale = <?php echo json_encode($arrayTot); ?>;
    var giorni = <?php echo json_encode($arrayGiorni); ?>;
    var barChart = function() {
        var barChartData = {
            labels: giorni,
            datasets: [{
                    label: "Connessioni Totali",
                    backgroundColor:  color.primary._100,
                    borderColor:  color.primary._100,
                    borderWidth: 1,
                    data: connessioniTotale,
                },
                {
                    label: "Connessioni Uniche",
                    backgroundColor: color.primary._300,
                    borderColor: color.primary._500,
                    borderWidth: 1,
                    data: connessioniUniche,
                }
            ]

        };
        var config = {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Bar Chart'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: '6 months forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#barChart > canvas").get(0).getContext("2d"), config);
    }
    /* bar chart -- end */

    /* bar chart */
    var visualizzazioni = <?php echo json_encode($arrayTotPag); ?>;
    var pagineUniche = <?php echo json_encode($arrayUnicPag); ?>;
    var giorniPag = <?php echo json_encode($arrayGiorniPag); ?>;
    var barChart1 = function() {
        var barChartData = {
            labels: giorniPag,
            datasets: [{
                    label: "Visualizzazioni",
                    backgroundColor: color.danger._200,
                    borderColor: color.danger._300,
                    borderWidth: 1,
                    data: visualizzazioni


                },
                {
                    label: "Pagine Uniche",
                    backgroundColor: color.danger._600,
                    borderColor: color.danger._500,
                    borderWidth: 1,
                    data: pagineUniche

                }
            ]

        };
        var config = {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: false,
                    text: 'Bar Chart'
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: '6 months forecast'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: false,
                            labelString: 'Profit margin (approx)'
                        },
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#barChart1 > canvas").get(0).getContext("2d"), config);
    }
    /* bar chart -- end */

    /* bar chart */
    var curiosita = <?php echo json_encode($sommaCuriosita); ?>;
    var video = <?php echo json_encode($sommaVideo); ?>;
    var link = <?php echo json_encode($sommaCollegamenti); ?>;
    var ricette = <?php echo json_encode($sommaRicette); ?>;
    var vai_a = <?php echo json_encode($sommaVai_a); ?>;
    var ecommerce = <?php echo json_encode($sommaEcommerce); ?>;
    var barChart2 = function() {
        const data = {
            labels: ["curiosita", "link", "ricette", "vai_a", "video", "ecommerce"],
            datasets: [{
                axis: 'y',
                label: '',
                data: [curiosita, link, ricette, vai_a, video, ecommerce],
                fill: false,
                backgroundColor: [
                    '#67ea19',
                    '#447ba5',
                    '#744f4f',
                    '#51aef6',
                    '#cf1523',
                    '#6d437c',

                ],
                borderColor: [
                    'black',
                    'black',
                    'black',
                    'black',
                    'black',
                    'black',

                ],
                borderWidth: 1
            }]
        };
        const config = {
            type: 'horizontalBar',
            data,
            options: {
                indexAxis: 'y',
            }
        };
        new Chart($("#barChart2 > canvas").get(0).getContext("2d"), config);
    }
    /* bar chart -- end */


    /* bar stacked */
    var tipo = <?php echo json_encode($arrayprodotti); ?>;
    var data = <?php echo json_encode($arrayGiorni2); ?>;
    let numbers = Object.values(<?php echo json_encode($arrayCuriosita); ?>);
    let numbers2 = Object.values(<?php echo json_encode($arrayEcommerce); ?>);
    let numbers3 = Object.values(<?php echo json_encode($arrayLink); ?>);
    let numbers4 = Object.values(<?php echo json_encode($arrayVideo); ?>);
    let numbers5 = Object.values(<?php echo json_encode($arrayRicette); ?>);
    let numbers6 = Object.values(<?php echo json_encode($arrayVai_a); ?>);
    //  console.log(numbers)
    let arrCu = []
    for (i = 0; i < numbers.length; i++) {
        arrCu[i] = numbers[i].somma
    }
    console.log(arrCu)
    let arrEcomm = []
    for (i = 0; i < numbers2.length; i++) {
        arrEcomm[i] = numbers2[i].somma
    }
    let arrLink = []
    for (i = 0; i < numbers3.length; i++) {
        arrLink[i] = numbers3[i].somma
    }
    let arrVid = []
    for (i = 0; i < numbers4.length; i++) {
        arrVid[i] = numbers4[i].somma
    }
    let arrRic = []
    for (i = 0; i < numbers5.length; i++) {
        arrRic[i] = numbers5[i].somma
    }
    let arrVai = []
    for (i = 0; i < numbers6.length; i++) {
        arrVai[i] = numbers6[i].somma
    }


    var barStacked = function() {
        var barStackedData = {
            labels: data,
            datasets: [{
                    label: "Curiosita",
                    backgroundColor: color.success._300,
                    borderColor: color.success._500,
                    borderWidth: 1,
                    data: arrCu,
                },
                {
                    label: "Ecommerce",
                    backgroundColor: color.info._900,
                    borderColor: color.info._900,
                    borderWidth: 1,
                    data: arrEcomm,
                },
                {
                    label: "Link",
                    backgroundColor: color.primary._800,
                    borderColor: color.primary._900,
                    borderWidth: 1,
                    data: arrLink,
                },
                {
                    label: "Video",
                    backgroundColor: color.danger._300,
                    borderColor: color.danger._500,
                    borderWidth: 1,
                    data: arrVid,
                },
                {
                    label: "Ricette",
                    backgroundColor: color.warning._900,
                    borderColor: color.warning._800,
                    borderWidth: 1,
                    data: arrRic,
                },
                {
                    label: "Vai_a",
                    backgroundColor: color.primary._300,
                    borderColor: color.primary._500,
                    borderWidth: 1,
                    data: arrVai,
                }
            ]

        };
        var config = {
            type: 'bar',
            data: barStackedData,
            options: {
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                scales: {
                    yAxes: [{
                        stacked: true,
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }],
                    xAxes: [{
                        stacked: true,
                        gridLines: {
                            display: true,
                            color: "#f2f2f2"
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#barStacked > canvas").get(0).getContext("2d"), config);
    }
    /* bar stacked -- end */

    /* pie chart */
    var connessioniDesktop = <?php echo json_encode($sommaDesktop); ?>;
    var connessioniMobile = <?php echo json_encode($sommaMobile); ?>;
    var pieChart = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [connessioniDesktop, connessioniMobile],
                    backgroundColor: [
                        color.primary._100,
                        color.primary._400,
                        color.primary._200,
                        color.primary._300,
                        color.primary._500
                    ],
                    label: 'My dataset' // for legend
                }],
                labels: [
                    "Desktop",
                    "Mobile",
                ]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                    },
                },
            },

        };
        new Chart($("#pieChart > canvas").get(0).getContext("2d"), config);
    }
    /* pie chart -- end */

    /* pie chart */
    var connessioniDesktopPag = <?php echo json_encode($sommaDesktopPag); ?>;
    var connessioneMobilePag = <?php echo json_encode($sommaMobilePag); ?>;
    var pieChart1 = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [connessioniDesktopPag, connessioneMobilePag


                    ],
                    backgroundColor: [
                        color.danger._200,
                        color.danger._600,
                        color.danger._100,
                        color.danger._300,
                        color.danger._500
                    ],
                    label: 'My dataset' // for legend
                }],
                labels: [
                    "Desktop",
                    "Mobile",
                ]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                    },
                }
            }
        };
        new Chart($("#pieChart1 > canvas").get(0).getContext("2d"), config);
    }
    /* pie chart -- end */
    var connessioniDesktopU = <?php echo json_encode($sommaUnicaDesktop); ?>;
    var connessioniMobileU = <?php echo json_encode($sommaUnicaMobile); ?>;
    /* doughnut chart */
    var doughnutChart = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [connessioniDesktopU, connessioniMobileU],


                    backgroundColor: [
                        color.primary._300,
                        color.primary._100,
                        color.primary._50,
                        color.primary._300,
                        color.primary._500
                    ],
                    label: 'My dataset' // for legend


                }],
                labels: [
                    "Desktop",
                    "Mobile",
                ]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'left',
                    labels: {
                        usePointStyle: true,
                    },
                }
            }
        };
        new Chart($("#doughnutChart > canvas").get(0).getContext("2d"), config);
    }
    /* doughnut chart -- end */

    /* doughnut chart */
    var connDesktop = <?php echo json_encode($sommaDesktopUnicPag); ?>;
    var connMobile = <?php echo json_encode($sommaMobileUnicPag); ?>;
    var doughnutChart1 = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [connDesktop, connMobile

                    ],
                    backgroundColor: [
                        color.danger._200,
                        color.danger._600,
                        color.danger._100,
                        color.danger._300,
                        color.danger._500
                    ],
                    label: 'My dataset' // for legend


                }],
                labels: [
                    "Desktop",
                    "Mobile",
                ]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'left',
                    labels: {
                        usePointStyle: true,
                    },
                }
            }
        };
        new Chart($("#doughnutChart1 > canvas").get(0).getContext("2d"), config);
    }
    /* doughnut chart -- end */

    /* initialize all charts */
    $(document).ready(function() {

        $('#dt-basic-example').dataTable({
            responsive: true,
            lengthChange: false,
            dom:
                /*  --- Layout Structure
                    --- Options
                    l   -   length changing input control
                    f   -   filtering input
                    t   -   The table!
                    i   -   Table information summary
                    p   -   pagination control
                    r   -   processing display element
                    B   -   buttons
                    R   -   ColReorder
                    S   -   Select

                    --- Markup
                    < and >             - div element
                    <"class" and >      - div with a class
                    <"#id" and >        - div with an ID
                    <"#id.class" and >  - div with an ID and a class

                    --- Further reading
                    https://datatables.net/reference/option/dom
                    --------------------------------------
                 */
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                /*{
                    extend:    'colvis',
                    text:      'Column Visibility',
                    titleAttr: 'Col visibility',
                    className: 'mr-sm-3'
                },*/
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Generate PDF',
                    className: 'btn-outline-danger btn-sm mr-1'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Generate Excel',
                    className: 'btn-outline-success btn-sm mr-1'
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    titleAttr: 'Copy to clipboard',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-primary btn-sm'
                }
            ]
        });
        $('#dt-basic-example1').dataTable({
            responsive: true,
            lengthChange: false,
            dom:
                /*  --- Layout Structure
                    --- Options
                    l   -   length changing input control
                    f   -   filtering input
                    t   -   The table!
                    i   -   Table information summary
                    p   -   pagination control
                    r   -   processing display element
                    B   -   buttons
                    R   -   ColReorder
                    S   -   Select

                    --- Markup
                    < and >             - div element
                    <"class" and >      - div with a class
                    <"#id" and >        - div with an ID
                    <"#id.class" and >  - div with an ID and a class

                    --- Further reading
                    https://datatables.net/reference/option/dom
                    --------------------------------------
                 */
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                /*{
                    extend:    'colvis',
                    text:      'Column Visibility',
                    titleAttr: 'Col visibility',
                    className: 'mr-sm-3'
                },*/
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Generate PDF',
                    className: 'btn-outline-danger btn-sm mr-1'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Generate Excel',
                    className: 'btn-outline-success btn-sm mr-1'
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    titleAttr: 'Copy to clipboard',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-primary btn-sm'
                }
            ]
        });
        $('#dt-basic-example2').dataTable({
            responsive: true,
            lengthChange: false,
            dom:
                /*  --- Layout Structure
                    --- Options
                    l   -   length changing input control
                    f   -   filtering input
                    t   -   The table!
                    i   -   Table information summary
                    p   -   pagination control
                    r   -   processing display element
                    B   -   buttons
                    R   -   ColReorder
                    S   -   Select

                    --- Markup
                    < and >             - div element
                    <"class" and >      - div with a class
                    <"#id" and >        - div with an ID
                    <"#id.class" and >  - div with an ID and a class

                    --- Further reading
                    https://datatables.net/reference/option/dom
                    --------------------------------------
                 */
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                /*{
                    extend:    'colvis',
                    text:      'Column Visibility',
                    titleAttr: 'Col visibility',
                    className: 'mr-sm-3'
                },*/
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Generate PDF',
                    className: 'btn-outline-danger btn-sm mr-1'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Generate Excel',
                    className: 'btn-outline-success btn-sm mr-1'
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    titleAttr: 'Copy to clipboard',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-primary btn-sm'
                }
            ]
        });
        $('#dt-basic-example3').dataTable({
            responsive: true,
            lengthChange: false,
            dom:
                /*  --- Layout Structure
                    --- Options
                    l   -   length changing input control
                    f   -   filtering input
                    t   -   The table!
                    i   -   Table information summary
                    p   -   pagination control
                    r   -   processing display element
                    B   -   buttons
                    R   -   ColReorder
                    S   -   Select

                    --- Markup
                    < and >             - div element
                    <"class" and >      - div with a class
                    <"#id" and >        - div with an ID
                    <"#id.class" and >  - div with an ID and a class

                    --- Further reading
                    https://datatables.net/reference/option/dom
                    --------------------------------------
                 */
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                /*{
                    extend:    'colvis',
                    text:      'Column Visibility',
                    titleAttr: 'Col visibility',
                    className: 'mr-sm-3'
                },*/
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Generate PDF',
                    className: 'btn-outline-danger btn-sm mr-1'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Generate Excel',
                    className: 'btn-outline-success btn-sm mr-1'
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    titleAttr: 'Copy to clipboard',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-primary btn-sm'
                }
            ]
        });
        $('#dt-basic-example4').dataTable({
            responsive: true,
            lengthChange: false,
            dom:
                /*  --- Layout Structure
                    --- Options
                    l   -   length changing input control
                    f   -   filtering input
                    t   -   The table!
                    i   -   Table information summary
                    p   -   pagination control
                    r   -   processing display element
                    B   -   buttons
                    R   -   ColReorder
                    S   -   Select

                    --- Markup
                    < and >             - div element
                    <"class" and >      - div with a class
                    <"#id" and >        - div with an ID
                    <"#id.class" and >  - div with an ID and a class

                    --- Further reading
                    https://datatables.net/reference/option/dom
                    --------------------------------------
                 */
                "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [
                /*{
                    extend:    'colvis',
                    text:      'Column Visibility',
                    titleAttr: 'Col visibility',
                    className: 'mr-sm-3'
                },*/
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    titleAttr: 'Generate PDF',
                    className: 'btn-outline-danger btn-sm mr-1'
                },
                {
                    extend: 'excelHtml5',
                    text: 'Excel',
                    titleAttr: 'Generate Excel',
                    className: 'btn-outline-success btn-sm mr-1'
                },
                {
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    titleAttr: 'Copy to clipboard',
                    className: 'btn-outline-primary btn-sm mr-1'
                },
                {
                    extend: 'print',
                    text: 'Print',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-primary btn-sm'
                }
            ]
        });

        var pagina1 = document.getElementById('pagina1');
        var pagina2 = document.getElementById('pagina2');
        var pagina3 = document.getElementById('pagina3');
        var pagina4 = document.getElementById('pagina4');
        var pagina5 = document.getElementById('pagina5');
        var link1 = document.getElementById('connessioni');
        var link2 = document.getElementById('pagine');
        var link3 = document.getElementById('interattivi');
        var link4 = document.getElementById('prodotti');
        var link5 = document.getElementById('riepilogo');
        $('#pagine').on('click', function() {
            pagina1.style.display = 'none';
            pagina2.style.display = 'block';
            pagina3.style.display = 'none';
            pagina4.style.display = 'none';
            pagina5.style.display = 'none';
            link1.classList.remove('active');
            link3.classList.remove('active');
            link2.classList.add('active');
            link4.classList.remove('active');
            link5.classList.remove('active');


        });
        $('#interattivi').on('click', function() {
            pagina1.style.display = 'none';
            pagina2.style.display = 'none';
            pagina3.style.display = 'block';
            pagina4.style.display = 'none';
            pagina5.style.display = 'none';
            link1.classList.remove('active');
            link2.classList.remove('active');
            link3.classList.add('active');
            link4.classList.remove('active');
            link5.classList.remove('active');
        });
        $('#prodotti').on('click', function() {
            pagina1.style.display = 'none';
            pagina2.style.display = 'none';
            pagina3.style.display = 'none';
            pagina4.style.display = 'block';
            pagina5.style.display = 'none';
            link1.classList.remove('active');
            link2.classList.remove('active');
            link3.classList.remove('active');
            link4.classList.add('active');
            link5.classList.remove('active');
        });
        $('#riepilogo').on('click', function() {
            pagina1.style.display = 'none';
            pagina2.style.display = 'none';
            pagina3.style.display = 'none';
            pagina4.style.display = 'none';
            pagina5.style.display = 'block';
            link1.classList.remove('active');
            link3.classList.remove('active');
            link2.classList.remove('active');
            link4.classList.remove('active');
            link5.classList.add('active');



            var userList3 = new List('users5', options3);


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

        });




        // lineChart();
        // areaChart();
        horizontalBarChart();
        barChart();
        barChart1();
        barChart2();
        barStacked();
        // barHorizontalStacked();
        // bubbleChart();
        // barlineCombine();
        // polarArea();
        // radarChart();
        pieChart();
        pieChart1();
        doughnutChart();
        doughnutChart1();
    });
</script>

<style>
    .zoom {
    transition: transform .2s; /* Animation */
    }

    .zoom:hover {
    transform: scale(1.3); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
    }
    .promo_category img {
    max-width: 15rem;
    max-height: 5rem;
    border-radius: 0.7rem;
    }
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



    .sort {
        margin: 0 !important;
        padding: 8px 30px;
        border-radius: 6px;
        font-weight: bold;
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
</style>

@stop