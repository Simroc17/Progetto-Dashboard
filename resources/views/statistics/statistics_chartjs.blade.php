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

    <!-- <div class="row">

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

            </div> -->


    <div class="row">
        <!-- <div class="col-xl-12">
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
        </div> -->
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-12">
                    <div id="panel-2" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Horizontal <span class="fw-300"><i>Bar Chart</i></span>
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
                                Bar <span class="fw-300"><i>Chart</i></span>
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
        <!-- <div class="col-xl-12">
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
        </div> -->
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6">
                    <div id="panel-6" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Pie <span class="fw-300"><i>Chart</i></span>
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
                                Doughnut <span class="fw-300"><i>Chart</i></span>
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
    </div>
    <div class="panel-container show">
        <div class="panel-content">
            <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                <thead class="bg-warning-200">
                    <tr>
                        <th>CustomerID</th>
                        <th>Name</th>
                        <th>PurchaseDate</th>
                        <th>CustomerEmail</th>
                        <th>CustomerCVV</th>
                        <th>Country</th>
                        <th>InvoiceAmount</th>
                        <th>Controls</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>268410636</td>
                        <td>Cooley, Walker J.</td>
                        <td>03-13-19</td>
                        <td>odio.auctor@orcilobortis.edu</td>
                        <td>717</td>
                        <td>Timor-Leste</td>
                        <td>$7,007</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>077610947</td>
                        <td>Wise, Ruby R.</td>
                        <td>04-10-19</td>
                        <td>mi.Aliquam@afeugiat.edu</td>
                        <td>715</td>
                        <td>Burkina Faso</td>
                        <td>$7,052</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>959104621</td>
                        <td>Orr, Isabella V.</td>
                        <td>05-14-20</td>
                        <td>amet.lorem@risus.edu</td>
                        <td>256</td>
                        <td>Sri Lanka</td>
                        <td>$6,697</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>756590147</td>
                        <td>Schwartz, Xander P.</td>
                        <td>11-05-18</td>
                        <td>sagittis.placerat.Cras@nonlaciniaat.com</td>
                        <td>963</td>
                        <td>Liberia</td>
                        <td>$8,117</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>533801387</td>
                        <td>Gilmore, Cedric O.</td>
                        <td>01-16-20</td>
                        <td>consectetuer.adipiscing@semegestasblandit.co.uk</td>
                        <td>754</td>
                        <td>Svalbard and Jan Mayen Islands</td>
                        <td>$5,328</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>403080948</td>
                        <td>Foley, Cynthia M.</td>
                        <td>07-14-18</td>
                        <td>a.auctor.non@nuncrisus.net</td>
                        <td>826</td>
                        <td>Afghanistan</td>
                        <td>$6,823</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>114290869</td>
                        <td>Marshall, Carter V.</td>
                        <td>08-30-18</td>
                        <td>porttitor.interdum@dolordolortempus.com</td>
                        <td>256</td>
                        <td>Singapore</td>
                        <td>$6,679</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>033182882</td>
                        <td>Reilly, Jacob K.</td>
                        <td>09-19-18</td>
                        <td>vestibulum.lorem@adipiscing.ca</td>
                        <td>703</td>
                        <td>Chile</td>
                        <td>$5,252</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>471026559</td>
                        <td>Barlow, Jena S.</td>
                        <td>12-16-19</td>
                        <td>mollis@lacusUtnec.org</td>
                        <td>998</td>
                        <td>Botswana</td>
                        <td>$5,542</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>223467911</td>
                        <td>Huber, Warren Z.</td>
                        <td>05-30-20</td>
                        <td>Nulla@ipsumdolorsit.edu</td>
                        <td>127</td>
                        <td>Equatorial Guinea</td>
                        <td>$7,331</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>571295351</td>
                        <td>Miller, Emerald G.</td>
                        <td>11-08-19</td>
                        <td>dui@faucibus.co.uk</td>
                        <td>791</td>
                        <td>Chile</td>
                        <td>$8,318</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>314268756</td>
                        <td>Randolph, Ina Y.</td>
                        <td>04-20-19</td>
                        <td>sodales.Mauris@pharetraNamac.ca</td>
                        <td>272</td>
                        <td>Bermuda</td>
                        <td>$9,181</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>010785095</td>
                        <td>Stephens, Brady K.</td>
                        <td>04-18-19</td>
                        <td>Suspendisse.sed.dolor@elementumdui.edu</td>
                        <td>810</td>
                        <td>Mayotte</td>
                        <td>$8,253</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>522462928</td>
                        <td>Eaton, Cathleen M.</td>
                        <td>03-18-20</td>
                        <td>rhoncus@tincidunt.com</td>
                        <td>238</td>
                        <td>Belgium</td>
                        <td>$5,585</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>833601081</td>
                        <td>Conner, Wylie U.</td>
                        <td>09-07-18</td>
                        <td>diam@infaucibus.edu</td>
                        <td>917</td>
                        <td>Hong Kong</td>
                        <td>$6,687</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>462938945</td>
                        <td>Mccall, Hyacinth M.</td>
                        <td>06-22-19</td>
                        <td>ante@gravida.com</td>
                        <td>335</td>
                        <td>Mayotte</td>
                        <td>$5,419</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>465431336</td>
                        <td>Calderon, Bruno L.</td>
                        <td>06-22-19</td>
                        <td>enim.nisl@natoquepenatibus.com</td>
                        <td>449</td>
                        <td>Pitcairn Islands</td>
                        <td>$7,833</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>700402324</td>
                        <td>Barnes, Brittany O.</td>
                        <td>08-23-19</td>
                        <td>nonummy@massanon.org</td>
                        <td>200</td>
                        <td>Jordan</td>
                        <td>$9,673</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>999816267</td>
                        <td>Lambert, Nerea A.</td>
                        <td>04-01-20</td>
                        <td>interdum.libero@sed.com</td>
                        <td>347</td>
                        <td>Hong Kong</td>
                        <td>$5,805</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>230094773</td>
                        <td>Hartman, Murphy I.</td>
                        <td>02-19-19</td>
                        <td>Aenean.sed.pede@utodio.ca</td>
                        <td>120</td>
                        <td>Equatorial Guinea</td>
                        <td>$5,785</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>656291846</td>
                        <td>Hartman, Griffin I.</td>
                        <td>09-04-19</td>
                        <td>diam@tellusNunc.com</td>
                        <td>369</td>
                        <td>Suriname</td>
                        <td>$6,885</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>667672315</td>
                        <td>Buchanan, Jack N.</td>
                        <td>09-19-19</td>
                        <td>odio.vel.est@quam.co.uk</td>
                        <td>394</td>
                        <td>India</td>
                        <td>$6,480</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>895637221</td>
                        <td>Holloway, Molly T.</td>
                        <td>12-04-19</td>
                        <td>Aliquam.gravida.mauris@acnullaIn.net</td>
                        <td>978</td>
                        <td>Qatar</td>
                        <td>$7,940</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>582511127</td>
                        <td>Pacheco, Nicholas Q.</td>
                        <td>12-17-19</td>
                        <td>aliquam.enim.nec@eros.edu</td>
                        <td>860</td>
                        <td>Botswana</td>
                        <td>$9,291</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>473206092</td>
                        <td>Woods, Lucian Y.</td>
                        <td>04-04-20</td>
                        <td>ac@bibendumsedest.co.uk</td>
                        <td>267</td>
                        <td>Reunion</td>
                        <td>$6,514</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>058837337</td>
                        <td>Shelton, Benedict Q.</td>
                        <td>08-18-18</td>
                        <td>Suspendisse.non@convallisligulaDonec.net</td>
                        <td>556</td>
                        <td>Senegal</td>
                        <td>$5,960</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>435186291</td>
                        <td>Mcmahon, Zephania V.</td>
                        <td>03-20-19</td>
                        <td>commodo@viverra.ca</td>
                        <td>313</td>
                        <td>Estonia</td>
                        <td>$9,119</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>290955491</td>
                        <td>Bryant, Paloma S.</td>
                        <td>08-09-18</td>
                        <td>tellus.id.nunc@nonlorem.com</td>
                        <td>564</td>
                        <td>Belarus</td>
                        <td>$7,675</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>960011146</td>
                        <td>Sutton, Dominique R.</td>
                        <td>03-31-19</td>
                        <td>nisi.magna.sed@ipsumsodales.co.uk</td>
                        <td>517</td>
                        <td>Central African Republic</td>
                        <td>$5,836</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>332794726</td>
                        <td>Whitehead, Amal R.</td>
                        <td>05-02-20</td>
                        <td>ultricies.adipiscing@insodales.edu</td>
                        <td>450</td>
                        <td>Equatorial Guinea</td>
                        <td>$5,351</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>270594724</td>
                        <td>Hopkins, Taylor I.</td>
                        <td>05-03-20</td>
                        <td>neque.venenatis@tristique.net</td>
                        <td>509</td>
                        <td>Uzbekistan</td>
                        <td>$5,373</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>062276811</td>
                        <td>Dalton, Ursula I.</td>
                        <td>05-23-19</td>
                        <td>sit.amet.consectetuer@Fusce.org</td>
                        <td>235</td>
                        <td>Grenada</td>
                        <td>$8,587</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>475988143</td>
                        <td>Velasquez, Harper B.</td>
                        <td>05-03-20</td>
                        <td>et.ultrices@Proinvel.ca</td>
                        <td>166</td>
                        <td>Cuba</td>
                        <td>$5,844</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>959744004</td>
                        <td>Flowers, Jackson U.</td>
                        <td>10-06-19</td>
                        <td>Cras.pellentesque@interdum.edu</td>
                        <td>654</td>
                        <td>Tokelau</td>
                        <td>$8,953</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>461623134</td>
                        <td>Massey, Mercedes R.</td>
                        <td>05-22-20</td>
                        <td>Suspendisse.tristique.neque@Praesentinterdum.com</td>
                        <td>199</td>
                        <td>Bahamas</td>
                        <td>$7,332</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>197211170</td>
                        <td>Barrera, Ulysses V.</td>
                        <td>02-17-19</td>
                        <td>leo.in@duiaugueeu.com</td>
                        <td>809</td>
                        <td>Spain</td>
                        <td>$9,416</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>918682220</td>
                        <td>Wilder, Sophia L.</td>
                        <td>03-06-19</td>
                        <td>et@mienim.net</td>
                        <td>480</td>
                        <td>Congo, the Democratic Republic of the</td>
                        <td>$5,571</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>268276169</td>
                        <td>Lott, Tucker E.</td>
                        <td>02-03-19</td>
                        <td>pede.ultrices.a@pharetra.org</td>
                        <td>344</td>
                        <td>Congo, the Democratic Republic of the</td>
                        <td>$7,563</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>690297924</td>
                        <td>Morse, Alyssa G.</td>
                        <td>11-27-19</td>
                        <td>sed.sem@Aliquamauctor.edu</td>
                        <td>513</td>
                        <td>Malta</td>
                        <td>$8,768</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>591331798</td>
                        <td>Kemp, Darrel H.</td>
                        <td>04-17-20</td>
                        <td>nunc.ac.mattis@facilisisSuspendissecommodo.co.uk</td>
                        <td>479</td>
                        <td>Papua New Guinea</td>
                        <td>$7,197</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>186475257</td>
                        <td>Madden, Keaton R.</td>
                        <td>04-27-20</td>
                        <td>lectus@convallisconvallis.net</td>
                        <td>361</td>
                        <td>Serbia</td>
                        <td>$9,904</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>510961618</td>
                        <td>Chaney, Brynne H.</td>
                        <td>10-23-19</td>
                        <td>Aliquam@venenatisamagna.edu</td>
                        <td>305</td>
                        <td>Indonesia</td>
                        <td>$6,660</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>543494850</td>
                        <td>Carroll, Alexis S.</td>
                        <td>07-07-19</td>
                        <td>erat.eget@tincidunt.org</td>
                        <td>640</td>
                        <td>Falkland Islands</td>
                        <td>$9,617</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>304655673</td>
                        <td>Key, Chase F.</td>
                        <td>03-09-19</td>
                        <td>lectus@convallisconvallisdolor.edu</td>
                        <td>171</td>
                        <td>Cyprus</td>
                        <td>$8,533</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>462690355</td>
                        <td>Douglas, Sebastian Z.</td>
                        <td>03-16-19</td>
                        <td>scelerisque.neque@utlacus.com</td>
                        <td>432</td>
                        <td>Guyana</td>
                        <td>$6,932</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>156043267</td>
                        <td>Spence, Gillian K.</td>
                        <td>09-03-18</td>
                        <td>pellentesque.eget@Fusce.org</td>
                        <td>557</td>
                        <td>Christmas Island</td>
                        <td>$9,081</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>163510126</td>
                        <td>Hill, Ingrid N.</td>
                        <td>02-01-20</td>
                        <td>pede.nec.ante@pellentesque.edu</td>
                        <td>395</td>
                        <td>French Guiana</td>
                        <td>$8,552</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>622838605</td>
                        <td>Larson, Matthew C.</td>
                        <td>05-09-20</td>
                        <td>consequat@vitaeeratvel.net</td>
                        <td>771</td>
                        <td>Rwanda</td>
                        <td>$6,559</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>916243272</td>
                        <td>Wagner, Xerxes X.</td>
                        <td>07-19-18</td>
                        <td>erat@egestaslaciniaSed.org</td>
                        <td>647</td>
                        <td>Oman</td>
                        <td>$8,061</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>218462067</td>
                        <td>Yang, Savannah M.</td>
                        <td>08-10-18</td>
                        <td>lacinia.at@Morbiaccumsan.co.uk</td>
                        <td>632</td>
                        <td>China</td>
                        <td>$6,029</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>641016894</td>
                        <td>Blankenship, Silas Y.</td>
                        <td>10-08-19</td>
                        <td>tristique.aliquet.Phasellus@habitant.edu</td>
                        <td>780</td>
                        <td>Indonesia</td>
                        <td>$8,447</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>736823352</td>
                        <td>Schneider, Kamal E.</td>
                        <td>02-11-20</td>
                        <td>nec.leo.Morbi@liberoet.com</td>
                        <td>905</td>
                        <td>Hungary</td>
                        <td>$6,009</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>014625222</td>
                        <td>Goodwin, Carol T.</td>
                        <td>05-20-19</td>
                        <td>luctus@tortordictum.com</td>
                        <td>915</td>
                        <td>Saint Barthélemy</td>
                        <td>$7,961</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>665870531</td>
                        <td>Sargent, Rogan I.</td>
                        <td>11-08-19</td>
                        <td>non.sollicitudin.a@elitelitfermentum.org</td>
                        <td>759</td>
                        <td>Jordan</td>
                        <td>$7,840</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>341513158</td>
                        <td>Mendez, Alfonso Z.</td>
                        <td>08-14-19</td>
                        <td>Vestibulum.ante@sem.edu</td>
                        <td>766</td>
                        <td>Falkland Islands</td>
                        <td>$7,280</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>746815364</td>
                        <td>Deleon, Rachel C.</td>
                        <td>02-16-20</td>
                        <td>nisl@semperpretium.edu</td>
                        <td>183</td>
                        <td>Peru</td>
                        <td>$6,726</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>273111385</td>
                        <td>Hopper, Tobias W.</td>
                        <td>05-17-20</td>
                        <td>convallis@eratneque.edu</td>
                        <td>315</td>
                        <td>Cook Islands</td>
                        <td>$6,870</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>025589813</td>
                        <td>Richmond, Dolan H.</td>
                        <td>07-20-19</td>
                        <td>fringilla@liberoduinec.co.uk</td>
                        <td>969</td>
                        <td>American Samoa</td>
                        <td>$8,530</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>318399474</td>
                        <td>Nunez, Thane P.</td>
                        <td>10-17-19</td>
                        <td>consequat.lectus@nunc.org</td>
                        <td>636</td>
                        <td>Sweden</td>
                        <td>$5,656</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>945440014</td>
                        <td>Rosario, Kenneth D.</td>
                        <td>04-07-19</td>
                        <td>in.molestie@dolorelit.net</td>
                        <td>722</td>
                        <td>Puerto Rico</td>
                        <td>$6,326</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>044328789</td>
                        <td>Chen, Sharon W.</td>
                        <td>01-24-19</td>
                        <td>imperdiet.ornare@augue.co.uk</td>
                        <td>419</td>
                        <td>Lesotho</td>
                        <td>$7,406</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>348706227</td>
                        <td>Kennedy, Garth B.</td>
                        <td>08-20-18</td>
                        <td>Donec.feugiat@adipiscing.edu</td>
                        <td>145</td>
                        <td>Palestine, State of</td>
                        <td>$6,961</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>706217387</td>
                        <td>Barton, Paki W.</td>
                        <td>03-13-20</td>
                        <td>at.velit.Pellentesque@Suspendisse.ca</td>
                        <td>847</td>
                        <td>Sao Tome and Principe</td>
                        <td>$8,342</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>570593442</td>
                        <td>Reed, Adria M.</td>
                        <td>08-25-18</td>
                        <td>feugiat@justonec.co.uk</td>
                        <td>474</td>
                        <td>Cyprus</td>
                        <td>$7,680</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>308696228</td>
                        <td>Patton, Blaine M.</td>
                        <td>10-05-19</td>
                        <td>elementum@auctorvelit.org</td>
                        <td>689</td>
                        <td>Bermuda</td>
                        <td>$8,421</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>225437920</td>
                        <td>Malone, Serina K.</td>
                        <td>12-20-19</td>
                        <td>interdum.Sed.auctor@dolor.com</td>
                        <td>936</td>
                        <td>Luxembourg</td>
                        <td>$7,529</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>913619417</td>
                        <td>Snow, Skyler K.</td>
                        <td>07-02-19</td>
                        <td>Curabitur.sed.tortor@euneque.com</td>
                        <td>284</td>
                        <td>Costa Rica</td>
                        <td>$8,341</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>246424915</td>
                        <td>Snider, Cecilia C.</td>
                        <td>12-17-18</td>
                        <td>orci.adipiscing@maurissapien.ca</td>
                        <td>170</td>
                        <td>Serbia</td>
                        <td>$7,146</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>054562889</td>
                        <td>Mcgee, Quyn R.</td>
                        <td>01-14-20</td>
                        <td>semper@interdumenimnon.com</td>
                        <td>281</td>
                        <td>Spain</td>
                        <td>$7,673</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>651566150</td>
                        <td>Berger, Echo X.</td>
                        <td>10-08-19</td>
                        <td>magnis.dis@nequeInornare.co.uk</td>
                        <td>686</td>
                        <td>Niue</td>
                        <td>$8,190</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>234164663</td>
                        <td>Carter, Sopoline N.</td>
                        <td>07-01-19</td>
                        <td>sit.amet.metus@imperdiet.org</td>
                        <td>538</td>
                        <td>Cambodia</td>
                        <td>$8,042</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>132403056</td>
                        <td>Hernandez, Desirae W.</td>
                        <td>10-06-18</td>
                        <td>commodo.auctor@tempus.edu</td>
                        <td>531</td>
                        <td>Saint Barthélemy</td>
                        <td>$7,241</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>302907167</td>
                        <td>Kidd, Unity R.</td>
                        <td>07-02-19</td>
                        <td>fermentum.vel@atliberoMorbi.co.uk</td>
                        <td>881</td>
                        <td>Guinea</td>
                        <td>$9,476</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>457711257</td>
                        <td>Mays, Quynn G.</td>
                        <td>04-17-19</td>
                        <td>eget.dictum.placerat@Donec.co.uk</td>
                        <td>179</td>
                        <td>Bangladesh</td>
                        <td>$6,944</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>822402913</td>
                        <td>Cobb, Heather Q.</td>
                        <td>01-30-19</td>
                        <td>pharetra.nibh@erat.org</td>
                        <td>591</td>
                        <td>Barbados</td>
                        <td>$6,243</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>133496570</td>
                        <td>Norman, Elijah I.</td>
                        <td>03-16-19</td>
                        <td>ridiculus.mus.Proin@ipsum.edu</td>
                        <td>313</td>
                        <td>Bosnia and Herzegovina</td>
                        <td>$9,748</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>143641645</td>
                        <td>Cherry, Phyllis W.</td>
                        <td>08-06-19</td>
                        <td>ipsum.leo@quis.co.uk</td>
                        <td>626</td>
                        <td>Sri Lanka</td>
                        <td>$7,641</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>997733126</td>
                        <td>Wright, Warren X.</td>
                        <td>06-09-19</td>
                        <td>a.auctor@interdum.org</td>
                        <td>876</td>
                        <td>Egypt</td>
                        <td>$8,458</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>433765625</td>
                        <td>Daugherty, Sylvia O.</td>
                        <td>04-07-19</td>
                        <td>blandit.Nam@disparturientmontes.edu</td>
                        <td>973</td>
                        <td>Bermuda</td>
                        <td>$5,551</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>468916945</td>
                        <td>Myers, Bryar W.</td>
                        <td>10-03-18</td>
                        <td>Nulla.semper@nonjustoProin.com</td>
                        <td>273</td>
                        <td>Isle of Man</td>
                        <td>$6,671</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>874521677</td>
                        <td>Brennan, Vance I.</td>
                        <td>03-04-20</td>
                        <td>urna@pharetra.edu</td>
                        <td>509</td>
                        <td>Puerto Rico</td>
                        <td>$5,918</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>609952775</td>
                        <td>Banks, Portia T.</td>
                        <td>05-26-20</td>
                        <td>Proin.vel.nisl@justonec.com</td>
                        <td>754</td>
                        <td>Romania</td>
                        <td>$6,316</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>672207271</td>
                        <td>Mccoy, Brady F.</td>
                        <td>09-02-18</td>
                        <td>lobortis.mauris@atnisiCum.net</td>
                        <td>179</td>
                        <td>Venezuela</td>
                        <td>$7,909</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>140391038</td>
                        <td>Mcconnell, Hamish C.</td>
                        <td>05-19-20</td>
                        <td>egestas@Loremipsum.co.uk</td>
                        <td>424</td>
                        <td>Netherlands</td>
                        <td>$6,285</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>100877406</td>
                        <td>Stuart, Hilda C.</td>
                        <td>02-24-20</td>
                        <td>Vivamus.nibh@quis.ca</td>
                        <td>514</td>
                        <td>Afghanistan</td>
                        <td>$6,408</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>083842419</td>
                        <td>Page, Emi G.</td>
                        <td>09-16-18</td>
                        <td>Integer.sem.elit@quispedePraesent.ca</td>
                        <td>835</td>
                        <td>Tokelau</td>
                        <td>$5,696</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>025865486</td>
                        <td>Rasmussen, Piper C.</td>
                        <td>01-18-19</td>
                        <td>blandit@molestiesodales.com</td>
                        <td>496</td>
                        <td>Slovakia</td>
                        <td>$8,843</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>602908154</td>
                        <td>Kinney, Laurel N.</td>
                        <td>01-27-20</td>
                        <td>neque.Nullam@penatibuset.org</td>
                        <td>718</td>
                        <td>Norfolk Island</td>
                        <td>$8,374</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>103910519</td>
                        <td>Hess, Oren I.</td>
                        <td>10-29-19</td>
                        <td>tincidunt.pede.ac@tellusNunclectus.edu</td>
                        <td>804</td>
                        <td>Mauritius</td>
                        <td>$5,009</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>053136990</td>
                        <td>Baldwin, Beau W.</td>
                        <td>03-20-19</td>
                        <td>a.felis@nisiaodio.org</td>
                        <td>133</td>
                        <td>Saint Lucia</td>
                        <td>$8,786</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>554906412</td>
                        <td>Herrera, Lila R.</td>
                        <td>01-10-19</td>
                        <td>habitant.morbi.tristique@aptent.edu</td>
                        <td>441</td>
                        <td>Malawi</td>
                        <td>$7,422</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>813289717</td>
                        <td>Rowland, Jameson U.</td>
                        <td>10-19-19</td>
                        <td>est.vitae@molestieorcitincidunt.com</td>
                        <td>224</td>
                        <td>Bouvet Island</td>
                        <td>$7,380</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>552262891</td>
                        <td>Burks, Tanya X.</td>
                        <td>03-26-19</td>
                        <td>nunc.risus@leo.co.uk</td>
                        <td>168</td>
                        <td>Australia</td>
                        <td>$9,070</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>925675126</td>
                        <td>Santana, Knox B.</td>
                        <td>06-05-20</td>
                        <td>at.libero@molestie.org</td>
                        <td>288</td>
                        <td>Armenia</td>
                        <td>$7,205</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>042657015</td>
                        <td>Russell, Ima J.</td>
                        <td>10-06-18</td>
                        <td>egestas.lacinia.Sed@risusDonec.com</td>
                        <td>588</td>
                        <td>New Caledonia</td>
                        <td>$7,272</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>379067929</td>
                        <td>Knowles, Chanda J.</td>
                        <td>09-06-18</td>
                        <td>tristique@antedictum.co.uk</td>
                        <td>747</td>
                        <td>Lebanon</td>
                        <td>$8,249</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>322274499</td>
                        <td>Mcclain, Bree J.</td>
                        <td>03-12-20</td>
                        <td>ante@nislelementumpurus.org</td>
                        <td>224</td>
                        <td>Korea, South</td>
                        <td>$5,587</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>404718686</td>
                        <td>Bailey, Lani X.</td>
                        <td>08-07-19</td>
                        <td>Proin@massaMauris.ca</td>
                        <td>761</td>
                        <td>Australia</td>
                        <td>$6,092</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>359926938</td>
                        <td>Sloan, Keefe I.</td>
                        <td>10-14-18</td>
                        <td>Nullam@utaliquamiaculis.org</td>
                        <td>806</td>
                        <td>South Georgia and The South Sandwich Islands</td>
                        <td>$5,003</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>369436084</td>
                        <td>Stephenson, Lilah J.</td>
                        <td>07-13-19</td>
                        <td>nisl@metus.com</td>
                        <td>394</td>
                        <td>Zambia</td>
                        <td>$6,766</td>
                        <td>1</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>CustomerID</th>
                        <th>Name</th>
                        <th>PurchaseDate</th>
                        <th>CustomerEmail</th>
                        <th>CustomerCVV</th>
                        <th>Country</th>
                        <th>InvoiceAmount</th>
                        <th>Controls</th>
                    </tr>
                </tfoot>
            </table>
            <!-- datatable end -->
        </div>
    </div>
</main>
@stop

@section('footerScript')
<script src="{{ URL::asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>
<script src="{{ URL::asset('js/statistics/chartjs/chartjs.bundle.js')}}"></script>
<script>
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

    /* horizontal bar chart */
    var horizontalBarChart = function() {
        var horizontalBarChart = {
            labels: ["January", "February", "March", "April"],
            datasets: [{
                    label: "Red",
                    backgroundColor: color.success._300,
                    borderColor: color.success._500,
                    borderWidth: 1,
                    data: [
                        45,
                        60, -28, -9
                    ]
                },
                {
                    label: "Blue",
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
        new Chart($("#barChart > canvas").get(0).getContext("2d"), config);
    }
    /* bar chart -- end */

    /* bar stacked */
    /*var barStacked = function() {
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
    } */
    /* bar stacked -- end */

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

    /* initialize all charts */
    $(document).ready(function() {
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
        // lineChart();
        // areaChart();
        horizontalBarChart();
        barChart();
        // barStacked();
        // barHorizontalStacked();
        // bubbleChart();
        // barlineCombine();
        // polarArea();
        // radarChart();
        pieChart();
        doughnutChart();
    });
</script>
@stop