@extends('layouts.master')



@section('headerStyle')
<link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/statistics/chartjs/chartjs.css')}}">

@stop

@section('content')
<main id="js-page-content" role="main" class="page-content">


    <div class="subheader">
        <h1 class="subheader-title">
            Dettaglio Promozione

        </h1>
    </div>



    <div class="row justify-content-between">
        <div style="font-size: 20px;" class="col-6"> <i class="fa-solid fa-bomb"></i> {{$promo[0]->nome}}: {{$promo[0]->descrizione}}</div>
        <!-- <div class="col-6">
            @if ($promo[0]->id_canale==75)
            <img src="{{asset('img/decoNuova.png')}}" alt="" style="width: 100px;margin-left: 70px; float:right; border-radius:5px;">
            @elseif ($promo[0]->id_canale==92)
            <img src="{{asset('img\sebonNuova.png')}}" alt="" style="width:100px; margin-left: 70px; float:right; border-radius:5px;">
            @elseif ($promo[0]->id_canale==141)
            <img src="{{asset('img\ayokaNuova.png')}}" alt="" style="width:100px;margin-left: 70px; float:right; border-radius:5px;">
            @else($promo[0]->id_canale==143)
            <img src="" alt="" style="width: 50px;">
            @endif
        </div> -->
    </div>
    <div style="font-size: 15px; margin-bottom:1rem;"><i class="fa-regular fa-clock"></i> DAL {{$promo[0]->date_start}} AL {{$promo[0]->date_end}}</div>

    <div class="row mb-2">
        <div class="col-lg-3 col-6" style="border-radius:25px;">
            <div class="box text-center" style=" background-color: #17a2b8; border-radius:5px;">
                <h3 class="fw-500 text-white"><i class="ion ion-stats-bars"></i> Connessioni</h3>
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
                <h3 class="fw-500 text-white"><i class="ion ion-stats-bars"></i> Pagine</h3>
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
                <h3 class="fw-500 text-white"><i class="ion ion-stats-bars"></i> Interattivi</h3>
                <hr style=" border-bottom-style: solid;">
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <h5 class="description-header text-white">2.852</h5>
                            <span class="description-text text-white">Totali</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="description-block">
                            <h5 class="description-header text-white">786</h5>
                            <span class="description-text text-white">Uniche</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6" style="border-radius:25px;">
            <div class="box text-center" style=" background-color: #28a745; border-radius:5px;">
                <h3 class="fw-500 text-white"><i class="ion ion-stats-bars"></i> Prodotti</h3>
                <hr style=" border-bottom-style: solid;">
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <h5 class="description-header text-white">2.852</h5>
                            <span class="description-text text-white">Totali</span>
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
                    <div class="row justify-content-between">
                        <div class="col-10 ml-3 mb-3"><input type="text" class="search " placeholder="Search" />

                        </div>

                    </div>


                    <table id="intestazione" class="table table-hover table-striped w-100 mt-1">
                        <thead>
                            <tr class="text-white" role="row" style="background-color: red;">
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 35%;"><button type="button" class="sort" data-sort="regione">Regione</button></th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;"><button type="button" class="sort" data-sort="click_unici">Click Unici</button></th>
                                <th tabindex="0" rowspan="1" colspan="1" style="width: 35%;"><button type="button" class="sort" data-sort="click_totali">Click Totali</button></th>
                            </tr>
                        </thead>
                    </table>
                    <table id="test-list" class="table table-hover table-striped w-100 mt-1">

                        <tbody id="tbody" class="list ">
                            @foreach ($datiGrafico as $dato )
                            <tr>
                                <td class="regione" style="width: 35%;">{{ $dato['place'] }}</td>
                                <td class="click_unici" style="width: 30%;">{{ $dato['uniche'] }}</td>
                                <td class="click_totali" style="width: 35%;">{{ $dato['somma']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table id="tfoot" style="display: block;margin-bottom: 20px;" class="table-footer">
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
            <div class="row">
                <div class="col-xl-12">
                    <div class="panel-container show ">
                        <div class="table-list-container " id="users2">
                            <div class="row justify-content-between">
                                <div class="col-10 ml-3 mb-3"><input type="text" class="search " placeholder="Search" />

                                </div>

                            </div>


                            <table id="intestazione2" class="table table-hover table-striped w-100 mt-1">
                                <thead>
                                    <tr class="text-white" role="row" style="background-color: red;">
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 35%;"><button type="button" class="sort" data-sort="regione2">Numero Pagina</button></th>
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;"><button type="button" class="sort" data-sort="click_unici2">volantini onlini</button></th>                                                       
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 25%;"><button type="button" class="sort" data-sort="click_unici2">Visite uniche</button></th>
                                        <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;"><button type="button" class="sort" data-sort="click_totali2">Visite totali</button></th>
                                    </tr>
                                </thead>
                            </table>
                            <table id="test-list2" class="table table-hover table-striped w-100 mt-1">

                                <tbody id="tbody2" class="list ">
                                    @foreach ($volantinoId as $dato )
                                    <tr>
                                        <td class="regione2" style="width: 35%;">{{$dato['num_pagina']}}</td>
                                        <td class="click_unici2" style="width: 30%;">vis.online</td>
                                        <td class="click_unici2" style="width: 25%;">{{ $dato['uniche'] }}</td>
                                        <td class="click_totali2" style="width: 30%;">{{ $dato['somma']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <table id="tfoot2" style="display: block;margin-bottom: 50px;" class="table-footer">
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
                                    Bar <span class="fw-300"><i>Stacked</i></span>
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
                            <div class="card-header text-dark">Header</div>
                            <div class="card-body row">

                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="panel-container show ">
                    <div class="panel-content ">
                        <table id="dt-basic-example1" class="table table-bordered table-hover table-striped w-100">
                            <thead class="bg-warning-200">
                                <tr>
                                    <th>Regione</th>
                                    <th>Click Unici</th>
                                    <th>Click Totali</th>
                                    <th>Controls</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>268410636</td>
                                    <td>Cooley, Walker J.</td>
                                    <td>03-13-19</td>
                                    <td>1</td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>CustomerID</th>
                                    <th>Name</th>
                                    <th>PurchaseDate</th>
                                    <th>Controls</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- datatable end -->
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
                            <div class="card-header text-dark">Header</div>
                            <div class="card-body row">

                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                                <div class="card col-3" style="width: 15rem; height:15rem;">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="panel-container show ">
                    <div class="panel-content ">
                        <table id="dt-basic-example2" class="table table-bordered table-hover table-striped w-100">
                            <thead class="bg-warning-200">
                                <tr>
                                    <th>Regione</th>
                                    <th>Click Unici</th>
                                    <th>Click Totali</th>
                                    <th>Controls</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>268410636</td>
                                    <td>Cooley, Walker J.</td>
                                    <td>03-13-19</td>
                                    <td>1</td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>CustomerID</th>
                                    <th>Name</th>
                                    <th>PurchaseDate</th>
                                    <th>Controls</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- datatable end -->
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
                                            <th colspan="6">Connessioni</th>
                                            <th></th>
                                            <th colspan="2">Visualizzazioni</th>
                                            <th></th>
                                            <th colspan="5">Interazioni</th>
                                            <th></th>
                                            <th colspan="3">Spesa</th>
                                        </tr>
                                        <tr class="text-white" role="row" style="background-color: #fb3e3e;">
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
                                            <th colspan="1"><button type="button" class="sort" data-sort="pr">Prodotti</button></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="ri">Ricette</button></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="vi">Video</button></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="cu">Curiosita</button></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="li">Link</button></th>
                                            <th></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="lis">Liste</button></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="imp">Importo</button></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="med">Media</button></th>
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
                                                            <td class="pr">0</td>
                                                            @else
                                                            <td class="ri">{{$interattivoRicette[0]->totali}}</td>
                                                            @endif
                                                            @if($interattivoVideo == '[]')
                                                            <td class="pr">0</td>
                                                            @else
                                                            <td class="vi">{{$interattivoVideo[0]->totali}}</td>
                                                            @endif
                                                            @if($interattivoCuriosita == '[]')
                                                            <td class="pr">0</td>
                                                            @else
                                                            <td class="cu">{{$interattivoCuriosita[0]->totali}}</td>
                                                            @endif
                                                            @if($interattivoLink == '[]')
                                                            <td class="pr">0</td>
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
                valueNames: ['regione', 'click_unici', 'click_totali'],
                page: 10,
                pagination: {
                    innerWindow: 1,
                    left: 0,
                    right: 0,
                    paginationClass: "pagination",
                }
            };

            var userList = new List('users', options);
            // Prova Pagination connsessioni
            var monkeyList = new List('test-list', {
                valueNames: ['regione', 'click_unici', 'click_totali', ],
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
                    backgroundColor: color.success._300,
                    borderColor: color.success._500,
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
                    backgroundColor: color.success._300,
                    borderColor: color.success._500,
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
                    backgroundColor: color.success._300,
                    borderColor: color.success._500,
                    borderWidth: 1,
                    data: visualizzazioni


                },
                {
                    label: "Pagine Uniche",
                    backgroundColor: color.primary._300,
                    borderColor: color.primary._500,
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
    var barChart2 = function() {
        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                    label: "red",
                    backgroundColor: color.success._300,
                    borderColor: color.success._500,
                    borderWidth: 1,
                    data: [
                        45,
                        75,
                        26,
                        23,
                        60, -48, -9
                    ]
                },
                {
                    label: "Blue",
                    backgroundColor: color.primary._300,
                    borderColor: color.primary._500,
                    borderWidth: 1,
                    data: [-10,
                        16,
                        72,
                        93,
                        29, -74,
                        64
                    ]
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
        new Chart($("#barChart2 > canvas").get(0).getContext("2d"), config);
    }
    /* bar chart -- end */

    /* bar stacked */
    var barStacked = function() {
        var barStackedData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                    label: "Red",
                    backgroundColor: color.primary._300,
                    borderColor: color.primary._500,
                    borderWidth: 1,
                    data: [
                        45,
                        75,
                        26,
                        23,
                        60, -48, -9
                    ]
                },
                {
                    label: "Blue",
                    backgroundColor: color.success._300,
                    borderColor: color.success._500,
                    borderWidth: 1,
                    data: [-10,
                        16,
                        72,
                        93,
                        29, -74,
                        64
                    ]
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
                        color.success._300,
                        color.primary._400,
                        color.success._50,
                        color.success._300,
                        color.success._500
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
                        color.primary._200,
                        color.primary._400,
                        color.success._50,
                        color.success._300,
                        color.success._500
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
                        color.success._500,
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
                        color.success._200,
                        color.success._400,
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
        new Chart($("#doughnutChart1 > canvas").get(0).getContext("2d"), config);
    }
    /* doughnut chart -- end */

    /* initialize all charts */
    $(document).ready(function() {



        var pagina1 = document.getElementById('pagina1');
        var pagina2 = document.getElementById('pagina2');
        var pagina3 = document.getElementById('pagina3');
        var pagina4 = document.getElementById('pagina4');
        var pagina5 = document.getElementById('pagina5');
        var link1 = document.getElementById('connessioni');
        var link2 = document.getElementById('pagine');
        var link3 = document.getElementById('interattivi');
        var link4 = document.getElementById('prodotti');
        var link5= document.getElementById('riepilogo');
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

            var options2 = {
            valueNames: ['regione2', 'click_unici2', 'click_totali2'],
            page: 10,
            pagination: {
                innerWindow: 1,
                left: 0,
                right: 0,
                paginationClass: "pagination",
            }
            };
            var userList2 = new List('users2', options2);
            var monkeyList2 = new List('test-list2', {
            valueNames: ['regione2', 'click_unici2', 'click_totali2', ],
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