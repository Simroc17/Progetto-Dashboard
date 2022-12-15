@extends('layouts.master')



@section('headerStyle')
<link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/statistics/chartjs/chartjs.css')}}">

@stop

@section('content')
<main id="js-page-content" role="main" class="page-content"  >


    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-pie'></i> Dettaglio Promozione <sup class='badge badge-primary fw-500'>Promozione</sup>
            <small>
                Scrivi qualcosa qui
            </small>
        </h1>
    </div>


    <!-- <div class="mr-2 hidden-md-down">
                <span class="icon-stack icon-stack-lg">
                    <i class="base base-6 icon-stack-3x opacity-100 color-primary-500"></i>
                    <i class="base base-10 icon-stack-2x opacity-100 color-primary-300 fa-flip-vertical"></i>
                    <i class="ni ni-blog-read icon-stack-1x opacity-100 color-white"></i>
                </span>
            </div> -->
    <div class="row justify-content-between">
        <div style="font-size: 20px;" class="col-6"> <i class="fa-solid fa-bomb"></i> {{$promo->nome}}: {{$promo->descrizione}}</div>
        <div class="col-6">
            @if ($promo->id_canale==75)
            <img src="{{asset('img/decoNuova.png')}}" alt="" style="width: 100px;margin-left: 70px; float:right; border-radius:5px;">
            @elseif ($promo->id_canale==92)
            <img src="{{asset('img\sebonNuova.png')}}" alt="" style="width:100px; margin-left: 70px; float:right; border-radius:5px;">
            @elseif ($promo->id_canale==141)
            <img src="{{asset('img\ayokaNuova.png')}}" alt="" style="width:100px;margin-left: 70px; float:right; border-radius:5px;">
            @else($promo->id_canale==143)
            <img src="{{asset('img\dodeca.png')}}" alt="" style="width:100px;margin-left: 70px; float:right; border-radius:5px;">
            @endif
        </div>
    </div>
    <div style="font-size: 15px; margin-bottom:1rem;"><i class="fa-regular fa-clock"></i> DAL {{$promo->date_start}} AL {{$promo->date_end}}</div>

    <!-- /////////////// CARDS ////////////////// -->
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
                            <h5 class="description-header text-white">{{$volantino}}</h5>
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
                <h3 class="fw-500 text-white"><i class="ion ion-stats-bars"></i> Prodotti</h3>
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
                            <h5 class="description-header text-white">{{$sommaPr}}</h5>
                            <span class="description-text text-white">CLICK RICEVUTI</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ////////////////////////// LISTA UL ////////////////////// -->
    <ul class="nav nav-tabs mb-2">
        <li class="nav-item">
            <a class="nav-link active" href="#" aria-current="page" id="connessioni">Connessioni</a>
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
        <div class="col-xl-12 mb-3">
            <div class="panel-container show ">
                    <div class="table-list-container " id="users">
                        <!-- <div class="row justify-content-between">
                            <div class="col-10 ml-3 mb-3"><input type="text" class="search " placeholder="Search" />
                               
                            </div>
                            
                        </div>

                       
                        <table id="intestazione"  class="table table-hover table-striped w-100 mt-1">
                            <thead>
                            <tr class="text-white" role="row" style="background-color: red;">
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 35%;" ><button type="button" class="sort" data-sort="regione">Regione</button></th>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 30%;" ><button type="button" class="sort" data-sort="click_unici">Click Unici</button></th>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 35%;" ><button type="button" class="sort" data-sort="click_totali">Click Totali</button></th>
                            </tr>
                            </thead>
                        </table>
                        <table id="test-list"  class="table table-hover table-striped w-100 mt-1">
                           
                            <tbody id="tbody" class="list ">
                               
                                @foreach ($datiGrafico as $dato )
                                <tr>    
                                    <td class="regione" style="width: 35%;" >{{ $dato['place'] }}</td>
                                    <td class="click_unici" style="width: 30%;">{{ $dato['uniche'] }}</td>
                                    <td class="click_totali" style="width: 35%;">{{ $dato['somma']}}</td>    
                                </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                        <table id="tfoot" style="display: block;" class="table-footer">
                            <tr>
                                <td class="table-pagination position-absolute">
                                    <button type="button" style="border: none; background-color: #ff0202a8;" class="jPaginateBack"><i class="material-icons keyboard_arrow_left">&#xe314;</i></button>
                                    <ul class="pagination"></ul>
                                    <button type="button" style="border: none; background-color: #ff0202a8;" class="jPaginateNext"><i class="material-icons keyboard_arrow_right">&#xe315;</i></button>
                                </td>
                                
                                
                            </tr>
                        </table> -->
                        

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
                                            <span class="badge bg-primary coccarda float-left text-white">{{$count+1}}°</span>
                                            <span class="badge bg-success text-white" style="font-size: 15px; border-radius: 0.1; margin-left: -36px">{{$fin->sommaQta}}</span>
                                        </div>
                                        <div class="col-12" style="min-height: 70px;  margin-top: 10px">
                                            {{$fin->descrizione}}                                          
                                        </div>
                                        <div class="col-12 p-1">
                                            <img style="height:200px;" src="" class="img-prod">
                                        </div>
                                        <div class="col-12 p-1">
                                            <div class="float-left"><img class="top-prod" src="/img/curiosita.png"> {{$fin->tipo}} - {{$fin->titolo}}</div>
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
        <div class="col-xl-12 mb-3">
                <div class="panel-container show ">
                    <div class="table-list-container " id="users2">
                        
                        
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
    <!-- ////DIV PRODOTTI////////////// -->
    <div id="pagina4" class="row" style="display:none;" >
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
                                        <span class="badge bg-primary coccarda float-left text-white">{{$count+1}}°</span>
                                        <span class="badge bg-success text-white" style="font-size: 15px; border-radius: 0.1; margin-left: -36px">{{$pro->sommaQta}}</span>
                                    </div>
                                    <div class="col-12" style="min-height: 70px; margin-top: 10px">
                                        {{$pro->descrizione}}                                            
                                    </div>
                                    <div class="col-12 p-2">
                                        <img src="" class="img-prod">
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
            <div class="col-xl-12 mb-3">
                 
                 <div class="panel-container show ">
                    <div class="table-list-container " id="users3">
                        <!-- <div class="row justify-content-between">
                            <div class="col-10 ml-3 mb-3"><input type="text" class="search " placeholder="Search" />
                               
                            </div>
                            
                        </div>
                        <table id="intestazione3"  class="table table-hover table-striped w-100 mt-1">
                            <thead>
                            <tr class="text-white" role="row" style="background-color: red;">
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 20%;" ><button type="button" class="sort" data-sort="tipoPr">Descrizione</button></th>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 60%;" ><button type="button" class="sort" data-sort="titoloPr">Descrizione Estesa</button></th>
                                   
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;" ><button type="button" class="sort" data-sort="uniciPr">Click unici</button></th>
                                    <th tabindex="0" rowspan="1" colspan="1" style="width: 10%;" ><button type="button" class="sort" data-sort="totaliPr">Click totali</button></th>
                            </tr>
                            </thead>
                        </table>
                        <table id="test-list3"  class="table table-hover table-striped w-100 mt-1">
                           
                            <tbody id="tbody" class="list ">
                                @foreach ($products as $product )       
                                                <tr>
                                                    <td class="tipoPr" style="width: 20%;" >{{ $product->descrizione }}</td>
                                                    <td class="titoloPr" style="width:60%;">{{ $product->descrizione_estesa }}</td>
                                                   
                                                    <td class="uniciPr" style="width: 10%;">{{ $product->sommaUnici }}</td>
                                                    <td class="totaliPr" style="width: 10%;">{{ $product->sommaQta }}</td>
                                                </tr>  
                                @endforeach
                            </tbody>
                        </table>
                        <table id="tfoot3" style="display: block;" class="table-footer">
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

     <!-- ////DIV RIEPILOGO////////////// -->

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
                                        <tr class="text-white" role="row" style="background-color: #fb3e3e;">
                                            <th colspan="2"><button type="button" class="sort" data-sort="i">Info Volantino</button></th>
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
                                            <th colspan="1"><button type="button" class="sort" data-sort="pr"><i class="bi bi-plus-circle-fill"></i> Prodotti</button></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="ri">Ricette</button></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="vi"><i class="bi bi-play-circle-fill"></i> Video</button></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="cu"><i class="bi bi-info-lg"></i> Curiosita</button></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="li"><i class="bi bi-globe"></i> Link</button></th>
                                            <th></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="lis">Liste</button></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="imp"><i class="bi bi-currency-euro"></i> Importo</button></th>
                                            <th colspan="1"><button type="button" class="sort" data-sort="med"><i class="bi bi-currency-euro"></i> Media</button></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody" class="list">
                                                            @php $indP = 0 @endphp
                                                            @php $indR = 0 @endphp
                                                            @php $indV = 0 @endphp
                                                            @php $indC = 0 @endphp
                                                            @php $indL = 0 @endphp
                                        @foreach($riepilogoConnessioni as $connessione)
                                            @foreach($riepilogoVisualizzazioni as $visualizzazione)
                                                @if($connessione->id_market==$visualizzazione->id_market)
                                                    <tr role="row">
                                                        <td colspan="2" class="i"><a href="{{ route('volantino', $connessione->id_volantino)}}" style="color: #17a2b8;">{{$connessione->nome}} - {{$connessione->id_volantino}}</a></td>
                                                        <td colspan="1" class="d">{{$connessione->desktop}}</td>
                                                        <td colspan="1" class="m">{{$connessione->mobile}}</td>
                                                        <td colspan="1" class="t">{{$connessione->desktop + $connessione->mobile}}</td>
                                                        <td colspan="1" class="de">{{$connessione->deskUni}}</td>
                                                        <td colspan="1" class="mo">{{$connessione->mobUni}}</td>
                                                        <td colspan="1" class="un">{{$connessione->deskUni + $connessione->mobUni}}</td>
                                                        <td></td>
                                                        <td colspan="1" class="uni">{{$visualizzazione->uniche}}</td>
                                                        <td colspan="1" class="tot">{{$visualizzazione->totali}}</td>
                                                        <td></td>
                                                        @if($interattivoProdotti == '[]')
                                                            <td class="pr">0</td>
                                                        @else
                                                            @if (count($interattivoProdotti)>$indP)    
                                                                @while($indP< count($interattivoProdotti))  
                                                                    @if($interattivoProdotti[$indP]->id_market == $visualizzazione->id_market)
                                                                        <td colspan="1" class="pr">{{$interattivoProdotti[$indP]->totali}}</td>
                                                                        @if($interattivoProdotti[$indP]->id_market == $visualizzazione->id_market)
                                                                            @php $indP++ @endphp
                                                                        @endif
                                                                        
                                                                    @else
                                                                        <td class="pr">0</td>
                                                                    @endif
                                                                    @break
                                                                @endwhile
                                                            @else
                                                                <td class="pr">0</td> 
                                                            @endif       
                                                        @endif
                                                        @if($interattivoRicette == '[]')
                                                            <td class="ri">0</td>
                                                        @else
                                                        <!-- ////////////// PROVA A FARLO CON UN FOR E METTERE IL "<=" ////////////// -->
                                                            @if (count($interattivoRicette)>$indR)
                                                                @while($indR < count($interattivoRicette))  
                                                                    @if($interattivoRicette[$indR]->id_market == $visualizzazione->id_market)
                                                                        <td colspan="1" class="ri">{{$interattivoRicette[$indR]->totali}}</td>
                                                                        @if($interattivoRicette[$indR]->id_market == $visualizzazione->id_market)
                                                                            @php $indR++ @endphp
                                                                        @endif
                                                                    @else
                                                                        <td class="ri">0</td>
                                                                    @endif
                                                                    @break
                                                                @endwhile
                                                            @else
                                                                <td class="ri">0</td> 
                                                            @endif       
                                                        @endif
                                                        @if($interattivoVideo == '[]')
                                                            <td class="vi">0</td>
                                                        @else 
                                                            @if (count($interattivoVideo)>$indV)
                                                                @while($indV< count($interattivoVideo))  
                                                                    @if($interattivoVideo[$indV]->id_market == $visualizzazione->id_market)
                                                                        <td colspan="1" class="vi">{{$interattivoVideo[$indV]->totali}}</td>
                                                                        @if($interattivoVideo[$indV]->id_market == $visualizzazione->id_market)
                                                                            @php $indV++ @endphp
                                                                        @endif
                                                                        
                                                                        
                                                                    @else
                                                                        <td class="vi">0</td>
                                                                    @endif
                                                                    @break
                                                                @endwhile
                                                            @else
                                                                <td class="vi">0</td> 
                                                            @endif    
                                                        @endif
                                                        @if($interattivoCuriosita == '[]')
                                                            <td class="cu">0</td>
                                                        @else 
                                                            @if (count($interattivoCuriosita)>$indC)
                                                                @while($indC< count($interattivoCuriosita))  
                                                                    @if($interattivoCuriosita[$indC]->id_market == $visualizzazione->id_market)
                                                                        <td colspan="1" class="cu">{{$interattivoCuriosita[$indC]->totali}}</td>
                                                                        @if($interattivoCuriosita[$indC]->id_market == $visualizzazione->id_market)
                                                                            @php $indC++ @endphp
                                                                        @endif
                                                                        
                                                                        
                                                                    @else
                                                                        <td class="cu">0</td>
                                                                    @endif
                                                                    @break
                                                                @endwhile
                                                            @else
                                                                <td class="cu">0</td> 
                                                            @endif 
                                                        @endif
                                                        @if($interattivoLink == '[]')
                                                            <td class="li">0</td>
                                                        @else 
                                                            @if (count($interattivoLink)>$indL)    
                                                                @while($indL< count($interattivoLink))  
                                                                    @if($interattivoLink[$indL]->id_market == $visualizzazione->id_market)
                                                                        <td colspan="1" class="li">{{$interattivoLink[$indL]->totali}}</td>
                                                                        @if($interattivoLink[$indL]->id_market == $visualizzazione->id_market)
                                                                            @php $indL++ @endphp
                                                                        @endif
                                                                        
                                                                        
                                                                    @else
                                                                        <td class="li">0</td>
                                                                    @endif
                                                                    @break
                                                                @endwhile
                                                            @else
                                                                <td class="li">0</td> 
                                                            @endif 
                                                        @endif
                                                        <td></td>
                                                        <td colspan="1" class="lis">0</td>
                                                        <td colspan="1" class="imp">0</td>
                                                        <td colspan="1" class="med">0</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endforeach
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-white" role="row" style="background-color: red;">
                                            <th colspan="2">Totale</th>
                                            <th colspan="1">Desktop</th>
                                            <th colspan="1">Mobile</th>
                                            <th colspan="1">Totali</th>
                                            <th colspan="1">Desktop</th>
                                            <th colspan="1">Mobile</th>
                                            <th colspan="1">Uniche</th>
                                            <th></th>
                                            <th colspan="1">Uniche</th>
                                            <th colspan="1">Totali</th>
                                            <th></th>
                                            <th colspan="1">Prodotti</th>
                                            <th colspan="1">Ricette</th>
                                            <th colspan="1">Video</th>
                                            <th colspan="1">Curiosita</th>
                                            <th colspan="1">Link</th>
                                            <th></th>
                                            <th colspan="1">Liste</th>
                                            <th colspan="1">Importo</th>
                                            <th colspan="1">Media</th>
                                        </tr>
                                        <tr class="text-white" role="row" style="background-color: #fb3e3e;">
                                            <td colspan="2"></td>
                                            <td colspan="1">{{$sumD}}</td>
                                            <td colspan="1">{{$sumM}}</td>
                                            <td colspan="1">{{$sumD + $sumM}}</td>
                                            <td colspan="1">{{$sumDu}}</td>
                                            <td colspan="1">{{$sumMu}}</td>                                             
                                            <td colspan="1">{{$sumDu + $sumMu}}</td>
                                            <td></td>
                                            <td colspan="1">{{$sumVuni}}</td>
                                            <td colspan="1">{{$sumVtot}}</td>
                                            <td></td>
                                            <td colspan="1">{{$sommaProdotti}}</td>
                                            <td colspan="1">{{$sommaRicette}}</td>
                                            <td colspan="1">{{$sommaVideo}}</td>
                                            <td colspan="1">{{$sommaCuriosita}}</td>
                                            <td colspan="1">{{$sommaCollegamenti}}</td>
                                            <td></td>
                                            <td colspan="1">0</td>
                                            <td colspan="1">0</td>
                                            <td colspan="1">0</td>
                                        </tr>
                                    </tfoot>
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

      // Prova ricerca
      var options = {
        valueNames: ['i','d','m','t','de','mo','un','uni','tot','pr','ri','vi','cu','li','lis','imp','med','regione', 'click_unici', 'click_totali','tipo1','titolo1','prodotto1','unici1','totali1','tipoPr','titoloPr','uniciPr','totaliPr'],
        page: 10,
        pagination: {
            innerWindow: 1,
            left: 0,
            right: 0,
            paginationClass: "pagination",
        }
    };
    var userList3 = new List('users4', options);
    var userList2 = new List('users3', options);
    var userList1 = new List('users2', options);
    var userList = new List('users', options);
    var userList = new List('users5', options);
    // Prova Pagination
    var monkeyList = new List('test-list', {
        valueNames: ['i','d','m','t','de','mo','un','uni','tot','pr','ri','vi','cu','li','lis','imp','med','regione', 'click_unici', 'click_totali','tipo1','titolo1','prodotto1','unici1','totali1','tipoPr','titoloPr','uniciPr','totaliPr'],
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
    var visualizzazioni=<?php echo json_encode($arrayTotPag); ?>;
    var pagineUniche=<?php echo json_encode($arrayUnicPag); ?>;
    var giorniPag=<?php echo json_encode($arrayGiorniPag); ?>;
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
    var link = <?php echo json_encode($sommaCollegamenti); ?>;
    var ricette = <?php echo json_encode($sommaRicette); ?>;
    var vai_a=<?php echo json_encode($sommaVai_a); ?>;
    var video=<?php echo json_encode($sommaVideo); ?>;
    var ecommerce=<?php echo json_encode($sommaEcommerce); ?>;
    var barChart2 = function() {
        const data = {
                labels: ["curiosita","link","ricette","vai_a","video","ecommerce"],
                datasets: [{
                axis: 'y',
                label: '',
                data: [curiosita,link,ricette,vai_a,video,ecommerce],
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
    
   
    
    
    var tipo=<?php echo json_encode($arrayprodotti); ?>;
    var data=<?php echo json_encode($arrayGiorni2); ?>;
    let numbers = Object.values(<?php echo json_encode($arrayCuriosita); ?>);
    let numbers2 = Object.values(<?php echo json_encode($arrayEcommerce); ?>);
    let numbers3 = Object.values(<?php echo json_encode($arrayLink); ?>);
    let numbers4 = Object.values(<?php echo json_encode($arrayVideo); ?>);
    let numbers5= Object.values(<?php echo json_encode($arrayRicette); ?>);
    let numbers6= Object.values(<?php echo json_encode($arrayVai_a); ?>);
    console.log(numbers)
    let arrCu=[]
    for(i =0; i < numbers.length; i++){
        arrCu[i]= numbers[i].somma
    }
    console.log(arrCu)
    let arrEcomm=[]
    for(i =0; i < numbers2.length; i++){
        arrEcomm[i]= numbers2[i].somma
    }
    let arrLink=[]
    for(i=0;i<numbers3.length;i++){
        arrLink[i]= numbers3[i].somma
    }
    let arrVid=[]
    for(i=0;i<numbers4.length;i++){
        arrVid[i]= numbers4[i].somma
    }
    let arrRic=[]
    for(i=0;i<numbers5.length;i++){
        arrRic[i]= numbers5[i].somma
    }
    let arrVai=[]
    for(i=0;i<numbers6.length;i++){
        arrVai[i]=numbers6[i].somma
    }

    
    var barStacked = function() {
        var barStackedData = {
            labels: data,
            datasets: [{
                    label: "Curiosita",
                    backgroundColor: color.primary._300,
                    borderColor: color.primary._500,
                    borderWidth: 1,
                    data: arrCu,
                },
                {
                    label: "Ecommerce",
                    backgroundColor: color.danger._300,
                    borderColor: color.danger._500,
                    borderWidth: 1,
                    data: arrEcomm,
                },
                {
                    label: "Link",
                    backgroundColor: color.warning._300,
                    borderColor: color.warning._500,
                    borderWidth: 1,
                    data: arrLink,
                },
                {
                    label: "Video",
                    backgroundColor: color.success._300,
                    borderColor: color.success._500,
                    borderWidth: 1,
                    data: arrVid,
                },
                {
                    label: "Ricette",
                    backgroundColor:color.warning._700,
                    borderColor: color.warning._500,
                    borderWidth: 1,
                    data: arrRic,
                },
                {
                    label: "Vai_a",
                    backgroundColor: color.success._1000,
                    borderColor: color.success._00,
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
    var connessioniDesktop=<?php echo json_encode($sommaDesktop); ?>;
    var connessioniMobile=<?php echo json_encode($sommaMobile); ?>;
    var pieChart = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [connessioniDesktop,connessioniMobile]     
                    ,
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
    var connessioniDesktopPag=<?php echo json_encode($sommaDesktopPag); ?>;
    var connessioneMobilePag=<?php echo json_encode($sommaMobilePag); ?>;
    var pieChart1 = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [ connessioniDesktopPag,connessioneMobilePag
                        
                        
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
    var connessioniDesktopU=<?php echo json_encode($sommaUnicaDesktop); ?>;
    var connessioniMobileU=<?php echo json_encode($sommaUnicaMobile); ?>;
    /* doughnut chart */
    var doughnutChart = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [connessioniDesktopU,connessioniMobileU],
                       
                    
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
    var connDesktop=<?php echo json_encode($sommaDesktopUnicPag); ?>;
    var connMobile= <?php echo json_encode($sommaMobileUnicPag); ?>;
    var doughnutChart1 = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [connDesktop,connMobile
                        
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
        var link4= document.getElementById('prodotti');
        var link5= document.getElementById('riepilogo');
        $('#connessioni').on('click', function() {
            pagina1.style.display = 'block';
            pagina2.style.display = 'none';
            pagina3.style.display = 'none';
            pagina4.style.display = 'none';
            pagina5.style.display = 'none';
            link1.classList.add('active');
            link3.classList.remove('active');
            link2.classList.remove('active');
            link4.classList.remove('active');
            link5.classList.remove('active');
        });
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

            

            var userList3 = new List('users4', options3);
           

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

<!-- <div>                    COMMENTI

<div class="row">

                @component('common-components.colorful-widget')
                @slot('colorClass') bg-primary-300 @endslot
                @slot('price') {{auth()->user()->nome}} @endslot
                @slot('description') users signed up @endslot
                @slot('icon') fa-user @endslot
                @endcomponent

                @component('common-components.colorful-widget')
                @slot('colorClass') bg-warning-400 @endslot
                @slot('price') {{count($arrayPromo)}} @endslot
                @slot('description') Numero Promo {{auth()->user()->nome}} @endslot
                @slot('icon') fa-gem @endslot
                @endcomponent

                @component('common-components.colorful-widget')
                @slot('colorClass') bg-success-200 @endslot
                @slot('price') {{count($markets)}} @endslot
                @slot('description') Numero negozi @endslot
                @slot('icon') fa-lightbulb @endslot
                @endcomponent

                @component('common-components.colorful-widget')
                @slot('colorClass') bg-info-200 @endslot
                @slot('price') {{count($negozi)}} @endslot
                @slot('description') Negozi @endslot
                @slot('icon') fa-globe @endslot
                @endcomponent

            </div> 


     <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-1" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Line <span class="fw-300"><i>Chart</i></span>
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
                                    The line chart requires an array of labels for each of the data points. This is shown on the X axis. It has a colour for the fill, a colour for the line and colours for the points and strokes of the points
                                </div>
                                <div id="lineChart">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div id="panel-7" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Area <span class="fw-300"><i>Chart</i></span>
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
                                    An area chart or area graph displays graphically quantitative data. It is based on the line chart. The area between axis and line are commonly emphasized with colors, textures and hatchings
                                </div>
                                <div id="areaChart">
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
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div id="panel-9" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Bar <span class="fw-300"><i>Stacked (horizontal)</i></span>
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
                                    A stacked horizontal bar chart, shows you a breakdown and compare parts of a whole. Each segment displays a whole brown down into different parts or categories - displayed on top of another
                                </div>
                                <div id="barHorizontalStacked">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
<!-- <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-4" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Bubble <span class="fw-300"><i>Chart</i></span>
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
                                    A bubble chart is used to display three dimensions of data. The location of the bubble is determined by the first two dimensions and the third dimension is represented by the size of the individual bubbles
                                </div>
                                <div id="bubbleChart">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div id="panel-10" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Combination <span class="fw-300"><i>Chart (Bar & Line)</i></span>
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
                                    This is a combination of different charts presented together to show how easy it is to built complex charts. Here we use similar data sets to combine a linechart with bar chart
                                </div>
                                <div id="barlineCombine">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
<!-- <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-5" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Polar <span class="fw-300"><i>Area</i></span>
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
                                    Polar charts are similar to pie charts, but each segment has the same angle - the radius of the segment differs depending on the value. Polar charts is often useful when we want to show a comparison data similar to a pie chart, but also show a scale of values for context
                                </div>
                                <div id="polarArea">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div id="panel-11" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Radar <span class="fw-300"><i>Chart</i></span>
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
                                    For a radar chart, to provide context of what each point means, we include an array of strings that show around each point in the chart. For the radar chart data, we have an array of datasets as objects, with a fill, stroke, and line color for each point. We also have an array of data values
                                </div>
                                <div id="radarChart">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        ////////////////////////////// GRAFICI ELIMINATI ////////////////////////////////

         /* line chart */
    /*var lineChart = function() {
        var config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "Success",
                    borderColor: color.success._500,
                    pointBackgroundColor: color.success._700,
                    pointBorderColor: 'rgba(0, 0, 0, 0)',
                    pointBorderWidth: 1,
                    borderWidth: 1,
                    pointRadius: 3,
                    pointHoverRadius: 4,
                    data: [
                        23,
                        75,
                        60, -48, -9,
                        26,
                        45
                    ],
                    fill: false
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: 'Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
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
        };
        new Chart($("#lineChart > canvas").get(0).getContext("2d"), config);
    }*/
    /* line chart -- end */


    /* area chart */
    /*var areaChart = function() {
        var config = {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "Primary",
                        backgroundColor: 'rgba(136,106,181, 0.2)',
                        borderColor: color.primary._500,
                        pointBackgroundColor: color.primary._700,
                        pointBorderColor: 'rgba(0, 0, 0, 0)',
                        pointBorderWidth: 1,
                        borderWidth: 1,
                        pointRadius: 3,
                        pointHoverRadius: 4,
                        data: [
                            45,
                            75,
                            26,
                            23,
                            60, -48, -9
                        ],
                        fill: true
                    },
                    {
                        label: "Success",
                        backgroundColor: 'rgba(29,201,183, 0.2)',
                        borderColor: color.success._500,
                        pointBackgroundColor: color.success._700,
                        pointBorderColor: 'rgba(0, 0, 0, 0)',
                        pointBorderWidth: 1,
                        borderWidth: 1,
                        pointRadius: 3,
                        pointHoverRadius: 4,
                        data: [-10,
                            16,
                            72,
                            93,
                            29, -74,
                            64
                        ],
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: 'Area Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
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
        };
        new Chart($("#areaChart > canvas").get(0).getContext("2d"), config);
    }*/
    /* area chart -- end */




    /* bar horizontal stacked */
    /*var barHorizontalStacked = function() {
        var barHorizontalStackedData = {
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
            type: 'horizontalBar',
            data: barHorizontalStackedData,
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
        new Chart($("#barHorizontalStacked > canvas").get(0).getContext("2d"), config);
    } */
    /* bar horizontal stacked -- end */

    /* grid color */
    /* var gridColor = function() {
        var config = {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                        data: [10, 24, 20, 25, 35, 50],
                        backgroundColor: 'rgba(0,0,0, 0.07)',
                        borderColor: color.fusion._300,
                        borderWidth: 1,
                        fill: true
                    },
                    {
                        data: [20, 30, 28, 33, 45, 65],
                        backgroundColor: 'rgba(0,0,0, 0.03)',
                        borderColor: color.fusion._100,
                        borderWidth: 1,
                        fill: true
                    }
                ]
            },
            options: {
                legend: {
                    display: false,
                    labels: {
                        display: false
                    }
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: ['', color.danger._500, color.success._500]
                        },
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11,
                            max: 80
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontSize: 11
                        }
                    }]
                }
            }
        }
        new Chart($("#gridColor > canvas").get(0).getContext("2d"), config);
     } */
    /* grid color -- end */

    /* bar & line combine */
    /*var barlineCombine = function() {
        var barlineCombineData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                    type: 'line',
                    label: 'Dataset 1',
                    borderColor: color.danger._300,
                    pointBackgroundColor: color.danger._500,
                    pointBorderColor: color.danger._500,
                    pointBorderWidth: 1,
                    borderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 5,
                    fill: false,
                    data: [
                        -10,
                        16,
                        72,
                        93,
                        29,
                        -74,
                        64
                    ]
                },
                {
                    type: 'bar',
                    label: 'Dataset 2',
                    backgroundColor: color.primary._300,
                    borderColor: color.primary._500,
                    data: [
                        45,
                        75,
                        26,
                        23,
                        60,
                        -48,
                        -9
                    ],
                    borderWidth: 1
                },
                {
                    type: 'bar',
                    label: 'Dataset 3',
                    backgroundColor: color.success._300,
                    borderColor: color.success._500,
                    data: [
                        -10,
                        16,
                        72,
                        93,
                        29,
                        -74,
                        64
                    ],
                    borderWidth: 1
                }
            ]

        };
        var config = {
            type: 'bar',
            data: barlineCombineData,
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Bar Chart'
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
        new Chart($("#barlineCombine > canvas").get(0).getContext("2d"), config);
     } */
    /* bar & line combine -- end */

    /* polar area */
    /*var polarArea = function() {
        var config = {
            type: 'polarArea',
            data: {
                datasets: [{
                    data: [
                        11,
                        16,
                        7,
                        3,
                        14
                    ],
                    backgroundColor: [
                        color.primary._200,
                        color.primary._400,
                        color.success._100,
                        color.success._400,
                        color.success._600
                    ],
                    label: 'My dataset' // for legend
                }],
                labels: [
                    "USA",
                    "Germany",
                    "Austalia",
                    "Canada",
                    "France"
                ]
            },
            options: {
                responsive: true,
                legend: {
                    display: true,
                    position: 'bottom',
                }
            }
        };
        new Chart($("#polarArea > canvas").get(0).getContext("2d"), config);
    }*/
    /* polar area -- end */

    /* radar chart */
    /*var radarChart = function() {
        var config = {
            type: "radar",
            data: {
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Partying", "Running"],
                datasets: [{
                        label: "First",
                        pointRadius: 4,
                        borderDashOffset: 2,
                        backgroundColor: "rgba(136,106,181, 0.2)",
                        borderColor: "rgba(0,0,0,0)",
                        pointBackgroundColor: color.primary._500,
                        pointBorderColor: color.primary._500,
                        pointHoverBackgroundColor: color.primary._500,
                        pointHoverBorderColor: color.primary._500,
                        data: [65, 59, 90, 81, 56, 55, 40]
                    },
                    {
                        label: "Second",
                        pointRadius: 4,
                        borderDashOffset: 2,
                        backgroundColor: "rgba(29,201,183, 0.2)",
                        borderColor: "rgba(0,0,0,0)",
                        pointBackgroundColor: color.success._500,
                        pointBorderColor: color.success._500,
                        pointHoverBackgroundColor: color.success._500,
                        pointHoverBorderColor: color.success._500,
                        data: [28, 48, 40, 19, 96, 27, 100]
                    }
                ]
            },
            options: {
                responsive: true,
            }
        }

        new Chart($("#radarChart > canvas").get(0).getContext("2d"), config);

     }*/
    /* radar chart -- end */

    /* bubble chart */
    /* var bubbleChart = function() {
        var config = {
            type: 'bubble',
            data: {
                labels: "Africa",
                datasets: [{
                        label: ["China"],
                        backgroundColor: color.primary._300,
                        borderColor: color.primary._500,
                        data: [{
                            x: 21269017,
                            y: 5.245,
                            r: 15
                        }]
                    },
                    {
                        label: ["Denmark"],
                        backgroundColor: color.success._300,
                        borderColor: color.success._500,
                        data: [{
                            x: 258702,
                            y: 7.526,
                            r: 10
                        }]
                    },
                    {
                        label: ["Germany"],
                        backgroundColor: color.info._300,
                        borderColor: color.info._500,
                        data: [{
                            x: 3979083,
                            y: 6.994,
                            r: 15
                        }]
                    },
                    {
                        label: ["Japan"],
                        backgroundColor: color.danger._300,
                        borderColor: color.danger._500,
                        data: [{
                            x: 4931877,
                            y: 5.921,
                            r: 15
                        }]
                    }
                ]
            },
            options: {
                title: {
                    display: true,
                    text: 'Predicted world population (millions) in 2050'
                },
                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: "Happiness"
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: "GDP (PPP)"
                        }
                    }]
                }
            }
        }
        new Chart($("#bubbleChart > canvas").get(0).getContext("2d"), config);
    }*/
    /* bubble chart -- end*/


</div> -->

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