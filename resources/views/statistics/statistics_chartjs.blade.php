@extends('layouts.master')



@section('headerStyle')
<link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/statistics/chartjs/chartjs.css')}}">
@stop

@section('content')
<main id="js-page-content" role="main" class="page-content" style="color: white;
    background-color: black;">


    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-pie'></i> Dettaglio Promozione <sup class='badge badge-primary fw-500'>...</sup>
            <small>
                Simple yet flexible JavaScript charting for designers & developers
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
            <img src="" alt="" style="width: 50px;">
            @endif
        </div>
    </div>
    <div style="font-size: 15px; margin-bottom:1rem;"><i class="fa-regular fa-clock"></i> DAL {{$promo->date_start}} AL {{$promo->date_end}}</div>

    <div class="row mb-2">
        <div class="col-lg-3 col-6" style="border-radius:25px;">
            <div class="box text-center" style=" background-color: #17a2b8; border-radius:5px;">
                <h3 class="fw-500 text-white"><i class="ion ion-stats-bars"></i> Connessioni</h3>
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
            <div class="box text-center" style=" background-color: #dc3545; border-radius:5px;">
                <h3 class="fw-500 text-white"><i class="ion ion-stats-bars"></i> Pagine</h3>
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
                            <h5 class="description-header text-white">786</h5>
                            <span class="description-text text-white">Uniche</span>
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
            <a class="nav-link " id="pagine">Pagine</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link " id="interattivi">Interattivi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link "  id="prodotti">Prodotti</a>
        </li>
        <li class="nav-item">
            <a class="nav-link "  id="riepilogo">Riepilogo</a>
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
                                    <canvas style="width:100%; height:300px;"></canvas>
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
                <div class="panel-content ">
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
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
                            <tr>
                                <td>077610947</td>
                                <td>Wise, Ruby R.</td>
                                <td>04-10-19</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>959104621</td>
                                <td>Orr, Isabella V.</td>
                                <td>05-14-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>756590147</td>
                                <td>Schwartz, Xander P.</td>
                                <td>11-05-18</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>533801387</td>
                                <td>Gilmore, Cedric O.</td>
                                <td>01-16-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>403080948</td>
                                <td>Foley, Cynthia M.</td>
                                <td>07-14-18</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>114290869</td>
                                <td>Marshall, Carter V.</td>
                                <td>08-30-18</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>033182882</td>
                                <td>Reilly, Jacob K.</td>
                                <td>09-19-18</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>471026559</td>
                                <td>Barlow, Jena S.</td>
                                <td>12-16-19</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
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
                            <tr>
                                <td>077610947</td>
                                <td>Wise, Ruby R.</td>
                                <td>04-10-19</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>959104621</td>
                                <td>Orr, Isabella V.</td>
                                <td>05-14-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>756590147</td>
                                <td>Schwartz, Xander P.</td>
                                <td>11-05-18</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>533801387</td>
                                <td>Gilmore, Cedric O.</td>
                                <td>01-16-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>403080948</td>
                                <td>Foley, Cynthia M.</td>
                                <td>07-14-18</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>114290869</td>
                                <td>Marshall, Carter V.</td>
                                <td>08-30-18</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>033182882</td>
                                <td>Reilly, Jacob K.</td>
                                <td>09-19-18</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>471026559</td>
                                <td>Barlow, Jena S.</td>
                                <td>12-16-19</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
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
    <div id="pagina4" class="row" style="display:none;" >
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
                            <tr>
                                <td>077610947</td>
                                <td>Wise, Ruby R.</td>
                                <td>04-10-19</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>959104621</td>
                                <td>Orr, Isabella V.</td>
                                <td>05-14-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>756590147</td>
                                <td>Schwartz, Xander P.</td>
                                <td>11-05-18</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>533801387</td>
                                <td>Gilmore, Cedric O.</td>
                                <td>01-16-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>403080948</td>
                                <td>Foley, Cynthia M.</td>
                                <td>07-14-18</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>114290869</td>
                                <td>Marshall, Carter V.</td>
                                <td>08-30-18</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>033182882</td>
                                <td>Reilly, Jacob K.</td>
                                <td>09-19-18</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>471026559</td>
                                <td>Barlow, Jena S.</td>
                                <td>12-16-19</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td>223467911</td>
                                <td>Huber, Warren Z.</td>
                                <td>05-30-20</td>
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
</main>
@stop

@section('footerScript')
<script src="{{ URL::asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>
<script src="{{ URL::asset('js/statistics/chartjs/chartjs.bundle.js')}}"></script>
<script>
    /* horizontal bar chart */
    var horizontalBarChart = function() {
        var horizontalBarChart = {
            labels: ["January", "February", "March", "April"],
            datasets: [{
                    label: "Connessioni Totali",
                    backgroundColor: color.success._300,
                    borderColor: color.success._500,
                    borderWidth: 1,
                    data: [
                        45,
                        60, -28, -9
                    ]
                },
                {
                    label: "Connessioni Uniche",
                    backgroundColor: color.primary._300,
                    borderColor: color.primary._500,
                    borderWidth: 1,
                    data: [-10,
                        29, -34,
                        64
                    ]
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
    var barChart = function() {
        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                    label: "Connessioni Totali",
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
                    label: "Connessioni Uniche",
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
        new Chart($("#barChart > canvas").get(0).getContext("2d"), config);
    }
    /* bar chart -- end */

    /* bar chart */
    var barChart1 = function() {
        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                    label: "Visualizzazioni",
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
                    label: "Pagine Uniche",
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
    var pieChart = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        11,
                        16,
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
        new Chart($("#pieChart > canvas").get(0).getContext("2d"), config);
    }
    /* pie chart -- end */

    /* pie chart */
    var pieChart1 = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        11,
                        16,
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

    /* doughnut chart */
    var doughnutChart = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        11,
                        16,
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
        new Chart($("#doughnutChart > canvas").get(0).getContext("2d"), config);
    }
    /* doughnut chart -- end */

    /* doughnut chart */
    var doughnutChart1 = function() {
        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        11,
                        16,
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
        var link1 = document.getElementById('connessioni');
        var link2 = document.getElementById('pagine');
        var link3 = document.getElementById('interattivi');
        var link4= document.getElementById('prodotti');
        $('#pagine').on('click', function() {
            pagina1.style.display = 'none';
            pagina2.style.display = 'block';
            pagina3.style.display = 'none';
            pagina4.style.display = 'none';
            link1.classList.remove('active');
            link3.classList.remove('active');
            link2.classList.add('active');
            link4.classList.remove('active');
        });
        $('#interattivi').on('click', function() {
            pagina1.style.display = 'none';
            pagina2.style.display = 'none';
            pagina3.style.display = 'block';
            pagina4.style.display = 'none';
            link1.classList.remove('active');
            link2.classList.remove('active');
            link3.classList.add('active');
            link4.classList.remove('active');
        });
        $('#prodotti').on('click', function() {
            pagina1.style.display = 'none';
            pagina2.style.display = 'none';
            pagina3.style.display = 'none';
            pagina4.style.display = 'block';
            link1.classList.remove('active');
            link2.classList.remove('active');
            link3.classList.remove('active');
            link4.classList.add('active');
        });


        $('#dt-basic-example').dataTable({
            responsive: true,
            dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [{
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-default'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    titleAttr: 'Copy to clipboard',
                    className: 'btn-outline-default'
                },
                {
                    extend: 'print',
                    text: '<i class="fal fa-print"></i>',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-default'
                }

            ],
            columnDefs: [{
                    targets: -1,
                    title: '',
                    orderable: false,
                    render: function(data, type, full, meta) {

                        /*
                        -- ES6
                        -- convert using https://babeljs.io online transpiler
                        return `
                        <a href='javascript:void(0);' class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record'>
                            <i class="fal fa-times"></i>
                        </a>
                        <div class='dropdown d-inline-block dropleft '>
                            <a href='#'' class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0' data-toggle='dropdown' aria-expanded='true' title='More options'>
                                <i class="fal fa-ellipsis-v"></i>
                            </a>
                            <div class='dropdown-menu'>
                                <a class='dropdown-item' href='javascript:void(0);'>Change Status</a>
                                <a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>
                            </div>
                        </div>`;
                            
                        ES5 example below:  

                        */
                        return "\n\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record'>\n\t\t\t\t\t\t\t<i class=\"fal fa-times\"></i>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t\t<div class='dropdown d-inline-block dropleft'>\n\t\t\t\t\t\t\t<a href='#'' class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0' data-toggle='dropdown' aria-expanded='true' title='More options'>\n\t\t\t\t\t\t\t\t<i class=\"fal fa-ellipsis-v\"></i>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t<div class='dropdown-menu'>\n\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Change Status</a>\n\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>";
                    },
                },

            ]

        });
        $('#dt-basic-example1').dataTable({
            responsive: true,
            dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [{
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-default'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    titleAttr: 'Copy to clipboard',
                    className: 'btn-outline-default'
                },
                {
                    extend: 'print',
                    text: '<i class="fal fa-print"></i>',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-default'
                }

            ],
            columnDefs: [{
                    targets: -1,
                    title: '',
                    orderable: false,
                    render: function(data, type, full, meta) {

                        /*
                        -- ES6
                        -- convert using https://babeljs.io online transpiler
                        return `
                        <a href='javascript:void(0);' class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record'>
                            <i class="fal fa-times"></i>
                        </a>
                        <div class='dropdown d-inline-block dropleft '>
                            <a href='#'' class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0' data-toggle='dropdown' aria-expanded='true' title='More options'>
                                <i class="fal fa-ellipsis-v"></i>
                            </a>
                            <div class='dropdown-menu'>
                                <a class='dropdown-item' href='javascript:void(0);'>Change Status</a>
                                <a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>
                            </div>
                        </div>`;
                            
                        ES5 example below:  

                        */
                        return "\n\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record'>\n\t\t\t\t\t\t\t<i class=\"fal fa-times\"></i>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t\t<div class='dropdown d-inline-block dropleft'>\n\t\t\t\t\t\t\t<a href='#'' class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0' data-toggle='dropdown' aria-expanded='true' title='More options'>\n\t\t\t\t\t\t\t\t<i class=\"fal fa-ellipsis-v\"></i>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t<div class='dropdown-menu'>\n\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Change Status</a>\n\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>";
                    },
                },

            ]

        });
        $('#dt-basic-example2').dataTable({
            responsive: true,
            dom: "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'B>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            buttons: [{
                    extend: 'csvHtml5',
                    text: 'CSV',
                    titleAttr: 'Generate CSV',
                    className: 'btn-outline-default'
                },
                {
                    extend: 'copyHtml5',
                    text: 'Copy',
                    titleAttr: 'Copy to clipboard',
                    className: 'btn-outline-default'
                },
                {
                    extend: 'print',
                    text: '<i class="fal fa-print"></i>',
                    titleAttr: 'Print Table',
                    className: 'btn-outline-default'
                }

            ],
            columnDefs: [{
                    targets: -1,
                    title: '',
                    orderable: false,
                    render: function(data, type, full, meta) {

                        /*
                        -- ES6
                        -- convert using https://babeljs.io online transpiler
                        return `
                        <a href='javascript:void(0);' class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record'>
                            <i class="fal fa-times"></i>
                        </a>
                        <div class='dropdown d-inline-block dropleft '>
                            <a href='#'' class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0' data-toggle='dropdown' aria-expanded='true' title='More options'>
                                <i class="fal fa-ellipsis-v"></i>
                            </a>
                            <div class='dropdown-menu'>
                                <a class='dropdown-item' href='javascript:void(0);'>Change Status</a>
                                <a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>
                            </div>
                        </div>`;
                            
                        ES5 example below:  

                        */
                        return "\n\t\t\t\t\t\t<a href='javascript:void(0);' class='btn btn-sm btn-icon btn-outline-danger rounded-circle mr-1' title='Delete Record'>\n\t\t\t\t\t\t\t<i class=\"fal fa-times\"></i>\n\t\t\t\t\t\t</a>\n\t\t\t\t\t\t<div class='dropdown d-inline-block dropleft'>\n\t\t\t\t\t\t\t<a href='#'' class='btn btn-sm btn-icon btn-outline-primary rounded-circle shadow-0' data-toggle='dropdown' aria-expanded='true' title='More options'>\n\t\t\t\t\t\t\t\t<i class=\"fal fa-ellipsis-v\"></i>\n\t\t\t\t\t\t\t</a>\n\t\t\t\t\t\t\t<div class='dropdown-menu'>\n\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Change Status</a>\n\t\t\t\t\t\t\t\t<a class='dropdown-item' href='javascript:void(0);'>Generate Report</a>\n\t\t\t\t\t\t\t</div>\n\t\t\t\t\t\t</div>";
                    },
                },

            ]

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


@stop