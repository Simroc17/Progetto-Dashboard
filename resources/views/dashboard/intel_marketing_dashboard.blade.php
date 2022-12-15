@extends('layouts.master')

@section('title', 'Marketing Dashboard - Application Intel')

@section('headerStyle')
<link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}">
@stop

@section('content')
<main id="js-page-content" role="main" class="page-content">
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr justify-content-between  text-white" style="background-color: #ed1c29;">
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

                        <!-- ///////////////// FILTRI ///////////////////// -->
                        <div class="row">
                            
                                <div class="col-4" >
                                    <form action="#" name="InventoryList" method="post">
                                        <h4 class="text-dark"><b>Gruppo</b></h4>

                                        <select id="s1" name="gruppo"  class="form-select bnotes" style="width: 200px; height: 60px; border-radius: 5px;" multiple>
                                            
                                            
                                            @foreach ($markets as $market )

                                            <option  value="{{$market->id}}">
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
                                            
                                        
                                            @foreach ($marketsAll as $market )
                                            @foreach ($markets as $market1 )
                                            @if($market1->id==$market->id_parent)
                                            <option selected value="{{$market->id_parent}}" name='{{$market->id}}' style="display:block;">
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
    @isset($data1)
    <h2>
        Dal: {{$data1}} al {{$data2}}
    </h2>
    @else
    <h2>
        Dal: <span class="ml-1" id="dataInizio"></span> 
    </h2>
    @endisset

     <!-- /////////////// CARDS ////////////////// -->
    <div class="row mb-2">
        <div class="col-lg-3 col-6" style="border-radius:25px;">
            <div class="box text-center" style=" background-color: #17a2b8; border-radius:5px;">
                <h3 class="fw-500 text-white"><i class="ion ion-stats-bars"></i> Connessioni</h3>
                <hr style=" border-bottom-style: solid;">
                <div class="row">
                    <div class="col-sm-6 border-right">
                        <div class="description-block">
                            <h5 class="description-header text-white">{{number_format($sommaDesktop+$sommaMobile, 2)}}</h5>
                            <span class="description-text text-white">TOTALI</span>
                        </div>
                    </div>                                                        
                    <div class="col-sm-6">
                        <div class="description-block">
                            <h5 class="description-header text-white">{{number_format($sommaUnicaDesktop+$sommaUnicaMobile, 2)}}</h5>
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
                            <h5 class="description-header text-white">{{$volantinoSum}}</h5>
                            <span class="description-text text-white">N.VOLANTINI</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="description-block">
                            <h5 class="description-header text-white">{{number_format($sommaDesktopPag+$sommaMobilePag, 2)}}</h5>
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
                            <h5 class="description-header text-white">{{count($arrTotale)}}</h5>
                            <span class="description-text text-white">SU {{count($arrTotale)}} TOTALI</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="description-block">
                            <h5 class="description-header text-white">{{number_format($sommaPr,2)}}</h5>
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
                    <div id="panel-8" class="panel">
                        <div class="panel-hdr">
                            <h2>
                                Andamento mensile
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
                                <div id="barChart0">
                                    <canvas style="width:100%; height:300px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    </div>
    <!-- ////DIV PRODOTTI////////////// -->
    <div id="pagina4" class="row" style="display:none;" >
            <div class="col-xl-12 mb-3">
                 
                 <div class="panel-container show ">
                    <div class="table-list-container " id="users3">
                        <div class="row justify-content-between">
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
                                    @foreach($product as $p)
                                      
                                          
                                                <tr>
                                                    <td class="tipoPr" style="width: 20%;" >{{ $p->descrizione }}</td>
                                                    <td class="titoloPr" style="width:60%;">{{ $p->descrizione_estesa }}</td>
                                                   
                                                    <td class="uniciPr" style="width: 10%;">{{ $p->sommaUnici }}</td>
                                                    <td class="totaliPr" style="width: 10%;">{{ $p->sommaQta }}</td>
                                                </tr>
                                          
                                    @endforeach
                                       
                                   
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
                                            @foreach($connessione as $c)
                                                @foreach($riepilogoVisualizzazioni as $visualizzazione)
                                                    @foreach($visualizzazione as $v)
                                                        @if($c->id_market==$v->id_market)
                                                            <tr role="row">
                                                                <td colspan="2" class="i"><a href="{{ route('volantino', $c->id_volantino)}}" style="color: #17a2b8;">{{$c->nome}} - {{$c->nomeMarket}}</a></td>
                                                                <td colspan="1" class="d">{{$c->desktop}}</td>
                                                                <td colspan="1" class="m">{{$c->mobile}}</td>
                                                                <td colspan="1" class="t">{{$c->desktop + $c->mobile}}</td>
                                                                <td colspan="1" class="de">{{$c->deskUni}}</td>
                                                                <td colspan="1" class="mo">{{$c->mobUni}}</td>
                                                                <td colspan="1" class="un">{{$c->deskUni + $c->mobUni}}</td>
                                                                <td></td>
                                                                <td colspan="1" class="uni">{{$v->uniche}}</td>
                                                                <td colspan="1" class="tot">{{$v->totali}}</td>
                                                                <td></td>
                                                                @if($interattivoProdotti == '[]')
                                                                    <td class="pr">0</td>
                                                                @else
                                                                    @if (count($interattivoProdotti)>$indP)    
                                                                        @while($indP< count($interattivoProdotti))  
                                                                            @if($interattivoProdotti[$indP]->id_market == $v->id_market)
                                                                                <td colspan="1" class="pr">{{$interattivoProdotti[$indP]->totali}}</td>
                                                                                @if($interattivoProdotti[$indP]->id_market == $v->id_market)
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
                                                                            @if($interattivoRicette[$indR]->id_market == $v->id_market)
                                                                                <td colspan="1" class="ri">{{$interattivoRicette[$indR]->totali}}</td>
                                                                                @if($interattivoRicette[$indR]->id_market == $v->id_market)
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
                                                                            @if($interattivoVideo[$indV]->id_market == $v->id_market)
                                                                                <td colspan="1" class="vi">{{$interattivoVideo[$indV]->totali}}</td>
                                                                                @if($interattivoVideo[$indV]->id_market == $v->id_market)
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
                                                                            @if($interattivoCuriosita[$indC]->id_market == $v->id_market)
                                                                                <td colspan="1" class="cu">{{$interattivoCuriosita[$indC]->totali}}</td>
                                                                                @if($interattivoCuriosita[$indC]->id_market == $v->id_market)
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
                                                                            @if($interattivoLink[$indL]->id_market == $v->id_market)
                                                                                <td colspan="1" class="li">{{$interattivoLink[$indL]->totali}}</td>
                                                                                @if($interattivoLink[$indL]->id_market == $v->id_market)
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

<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

<script src="{{ URL::asset('js/datagrid/datatables/datatables.bundle.js') }}"></script>

<script src="{{ URL::asset('js/datagrid/datatables/datatables.export.js') }}"></script>

<script src="{{ URL::asset('js/dependency/moment/moment.js') }}"></script>
<script src="{{ URL::asset('js/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>

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
       
        var userList2 = new List('users3', options);
        
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

                                            
    function selezionaData() {
        var dataSelezionata = document.getElementById("datepicker-2").value;
        
        // console.log(dataSelezionata);
        // Spezzare la data e salvarla in un array QUI
        let myArray = dataSelezionata.split(" - ");
        // console.log(myArray);

        // console.log(dateStart);
        // console.log(dateEnd);
        return myArray;
    }
    // console.log(myArray)
    
    
    /* horizontal bar chart */
    var regioni = <?php echo json_encode($arrRegioni); ?>;
    var regioni1 = Object.values(regioni);
    var indiceR = regioni1.length
    var arrUniche = <?php echo json_encode($arrUniche); ?>;
    var arrTotali = <?php echo json_encode($arrTotali); ?>;
    var rU = []
    var rT = []
    for(i=0; i<arrUniche.length; i++){
        rU[i] = arrUniche[i] + arrUniche[i+indiceR]
        rT[i] = arrTotali[i] + arrTotali[i+indiceR]
    }
    var horizontalBarChart = function() {
        var horizontalBarChart = {
            labels: regioni,
            datasets: [{
                    label: "Connessioni Totali",
                    backgroundColor: color.primary._100,
                    borderColor: color.primary._100,
                    borderWidth: 1,
                    data: rT
                    
                },
                {
                    label: "Connessioni Uniche",
                    backgroundColor: color.primary._300,
                    borderColor: color.primary._500,
                    borderWidth: 1,
                    data: rU
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
    var giorni1 = Object.values(giorni);
    var indice = giorni1.length
    var cU = []
    var cT = []
    for(i=0; i<connessioniUniche.length; i++){
        cU[i] = connessioniUniche[i] + connessioniUniche[i+indice]
        cT[i] = connessioniTotale[i] + connessioniTotale[i+indice]
    }
    var barChart = function() {
        var barChartData = {
            labels: giorni1,
            datasets: [{
                    label: "Connessioni Totali",
                    backgroundColor:  color.primary._100,
                    borderColor:  color.primary._100,
                    borderWidth: 1,
                    data: cT,
                },
                {
                    label: "Connessioni Uniche",
                    backgroundColor: color.primary._300,
                    borderColor: color.primary._500,
                    borderWidth: 1,
                    data: cU,
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
    var totali = <?php echo json_encode($sommaMobile + $sommaDesktop); ?>;
    var uniche = <?php echo json_encode($sommaUnicaDesktop+$sommaUnicaMobile); ?>; 
    var connessioni = <?php echo json_encode($visits); ?>; 
    var giorniM = <?php echo json_encode($arrayMesi); ?>;
    var giorniM1 = Object.values(giorniM);
    var indiceM = giorniM1.length
    var cUm = []
    var cTm = []
    
    function convertIntObj(connessioni) {
        const res = {}
        for (const key in connessioni) {
            res[key] = {};
            for (const prop in connessioni[key]) {
            const parsed = parseInt(connessioni[key][prop], 10);
            res[key][prop] = isNaN(parsed) ? connessioni[key][prop] : parsed;
            }
        }
        return res;
    }
    var result = [];
    for (var i=0; i<connessioni.length; i++) {
    result.push(convertIntObj(connessioni[i]));
    var arrayResult = Object.values(result);
    }
    console.log(result)  /// OGGETTO DI OGGETTI /////
    console.log(arrayResult)  //// ARRAY DI OGGETTI //////
    var sumId =[]
    for(i=0; i<arrayResult.length; i++){
        for(j=0; j<arrayResult[i].length; j++){
        sumId += arrayResult[i][j].reduce((a, {
        mese,
        vDq,vMq
        }) => (a[mese] = (a[mese] || 0) + vDq + vMq, a), {});
    }
    }
    console.log(sumId); //{editor: 57, admin: 56}

    
    
    // var barChart0 = function() {
    //     var barChartData = {
    //         labels: giorniM,
    //         datasets: [{
    //                 label: "Connessioni Totali",
    //                 backgroundColor:  color.primary._100,
    //                 borderColor:  color.primary._100,
    //                 borderWidth: 1,
    //                 data: [],
    //             },
    //             {
    //                 label: "Connessioni Uniche",
    //                 backgroundColor: color.primary._300,
    //                 borderColor: color.primary._500,
    //                 borderWidth: 1,
    //                 data: [],
    //             }
    //         ]

    //     };
    //     var config = {
    //         type: 'bar',
    //         data: barChartData,
    //         options: {
    //             responsive: true,
    //             legend: {
    //                 position: 'top',
    //             },
    //             title: {
    //                 display: false,
    //                 text: 'Bar Chart'
    //             },
    //             scales: {
    //                 xAxes: [{
    //                     display: true,
    //                     scaleLabel: {
    //                         display: false,
    //                         labelString: '6 months forecast'
    //                     },
    //                     gridLines: {
    //                         display: true,
    //                         color: "#f2f2f2"
    //                     },
    //                     ticks: {
    //                         beginAtZero: true,
    //                         fontSize: 11
    //                     }
    //                 }],
    //                 yAxes: [{
    //                     display: true,
    //                     scaleLabel: {
    //                         display: false,
    //                         labelString: 'Profit margin (approx)'
    //                     },
    //                     gridLines: {
    //                         display: true,
    //                         color: "#f2f2f2"
    //                     },
    //                     ticks: {
    //                         beginAtZero: true,
    //                         fontSize: 11
    //                     }
    //                 }]
    //             }
    //         }
    //     }
    //     new Chart($("#barChart0 > canvas").get(0).getContext("2d"), config);
    // }
    /* bar chart -- end */

    /* bar chart */
    var visualizzazioni=<?php echo json_encode($arrayTotPag); ?>;
    var pagineUniche=<?php echo json_encode($arrayUnicPag); ?>;
    var giorniPag=<?php echo json_encode($arrayGiorniPag); ?>;
    var gP = Object.values(giorniPag);
    var indiceP = gP.length
    var vU = []
    var vT = []                                                          //////////////////// SBAGLIATO ///////////////////////////////////
    for(i=0; i<visualizzazioni.length; i++){
        vU[i] = pagineUniche[i] + pagineUniche[i+indiceP]
        vT[i] = visualizzazioni[i] + visualizzazioni[i+indiceP]
    }
    var barChart1 = function() {
        var barChartData = {
            labels: gP,
            datasets: [{
                    label: "Visualizzazioni",
                    backgroundColor: color.danger._200,
                    borderColor: color.danger._300,
                    borderWidth: 1,
                    data: vT
                       
                    
                },
                {
                    label: "Pagine Uniche",
                    backgroundColor: color.danger._600,
                    borderColor: color.danger._500,
                    borderWidth: 1,
                    data: vU
                    
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
    // console.log(numbers)
    let arrCu=[]
    for(i =0; i < numbers.length; i++){
        arrCu[i]= numbers[i].somma
    }
    //console.log(arrCu)
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
                if (InvForm.gruppo[i].selected){
                    
                    //alert(InvForm.SelBranch[x].value);
                    gruppi[i] = InvForm.gruppo[i].value;
                }
                }
                for (i=0; i<InvForm1.canale.length; i++)
                {
                if (InvForm1.canale[i].selected)
                {
                    //alert(InvForm.SelBranch[x].value);
                    canali[i] = InvForm1.canale[i]
                }
                }
                var rex = /\S/;
                gruppi = gruppi.filter(entry => /\S/.test(entry));
                canali = canali.filter(entry => /\S/.test(entry));
                // console.log(gruppi[1])
                console.log(gruppi)
                console.log(canali)
                // console.log(canali[2].attributes.value.value)
                // console.log(canali[2].attributes.name.value)
                ///////// CREA DIRETTAMENTE UN ARRAY CON I VALUE DEI CANALI //////////// !!!!!!!!!!!!!!!!!!!!!!!
                
                let arrayDate = selezionaData();
                // console.log(arrayDate);
                //// Prendo e divido la data in due stringhe
                let dataScelta = arrayDate[0];
                let dateEnd = arrayDate[1];
                let dataSplit = dataScelta.split("-");
                let month = dataSplit[1]
                console.log(month)
                var arrayGenitori = []
                for(i=0; i<gruppi.length; i++){
                    for(j=0; j<canali.length; j++){
                          /////////// HO BISOGNO CHE MI TROVI LA CORRISPONDENZA SOLO DOVE TROVA L'OPTIONS
                        if(gruppi[i] == canali[j].attributes.value.value){
                            arrayGenitori[i]=canali[j].attributes.value.value;
                            // console.log(gruppi[i])    ///////////// NON MI ENTRA QUIIIIIII !!!!!!!!!!!!!!!!!!!!!!!!!
                        } 
                    }
                }
                var arrayFinale =[]
                for(i=0; i<gruppi.length; i++){
                    for(j=0; j<canali.length; j++){
                        if(canali[j].index){  /////////// HO BISOGNO CHE MI TROVI LA CORRISPONDENZA SOLO DOVE TROVA L'OPTIONS
                            if(gruppi[i] == canali[j].attributes.value.value){
                                arrayFinale[j]=canali[j].attributes.name.value;
                                // console.log(gruppi[i])    ///////////// NON MI ENTRA QUIIIIIII !!!!!!!!!!!!!!!!!!!!!!!!!
                            }
                        }
                    }
                }
                arrayFinale = arrayFinale.filter(entry => /\S/.test(entry));
                arrayGenitori = arrayGenitori.filter(entry => /\S/.test(entry));
                console.log(arrayFinale)
                console.log(arrayGenitori)
                window.location.href="/dashboards/intel_marketing_dashboard?negozi="+arrayFinale+"&genitori="+arrayGenitori+"&mese="+month+"&dataScelta="+dataScelta+"&dataFine="+dateEnd;
                //////////////////////////////////////////  PROVA A FARLO CON AJAX ////////////////////////////////////////////////////////////

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
        // barChart0();
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
    select[multiple]:focus option:checked {
    background: red linear-gradient(0deg, red 0%, #dc3545 100%);
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