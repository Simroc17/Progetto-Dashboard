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
                                <button class="btn btn-primary col-1" type="submit">cerca</button>
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
                    <div class="panel-content">

                        <!-- datatable start -->
                        <div id="dt-basic-example_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100 dataTable dtr-inline" role="grid" aria-describedby="dt-basic-example_info" style="width: 1546px;">
                                        <thead class="bg-primary-600">
                                            <tr role="row" style="background-color: red;">
                                                <th class="sorting_asc" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 261px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Promo</th>
                                                <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 385px;" aria-label="Position: activate to sort column ascending">Descrizione</th>
                                                <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 197px;" aria-label="Office: activate to sort column ascending">Data inizio</th>
                                                <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 105px;" aria-label="Age: activate to sort column ascending">Data fine</th>
                                                <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 183px;" aria-label="Start date: activate to sort column ascending">Age</th>
                                                <th class="sorting" tabindex="0" aria-controls="dt-basic-example" rowspan="1" colspan="1" style="width: 157px;" aria-label="Salary: activate to sort column ascending">Age</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbody">

                                            @if (count($arrayPromo)>0)
                                            @foreach ($arrayPromo as $promozione )
                                            <tr>
                                                <td>{{ $promozione['nome'] }}</td>
                                                <td>{{ $promozione['descrizione'] }}</td>
                                                <td>{{ $promozione['date_start'] }}</td>
                                                <td>{{ $promozione['date_end'] }}</td>
                                                <td>cancellare</td>
                                                <td>cancellare</td>
                                            </tr>

                                            @endforeach

                                            @endif


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Promo</th>
                                                <th rowspan="1" colspan="1">Descrizione</th>
                                                <th rowspan="1" colspan="1">Data inizio</th>
                                                <th rowspan="1" colspan="1">Data fine</th>
                                                <th rowspan="1" colspan="1">age</th>
                                                <th rowspan="1" colspan="1">age</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
@stop

@section('footerScript')
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
</script>
<script>
    $(document).ready(function() {
        $('#s1').on('change', function() {
            var category = $(this).val();
            $.ajax({
                url: "/{filename}",
                type: "GET",
                data: {
                    'category': category
                },
                success: function(data) {
                    var promozioni = data.promozioni;
                    var html = '';
                    if (promozioni.length > 0) {
                        for (let i = 0; i < promozioni.length; i++) {
                            html += '<tr>\
                                 <td> ' + promozioni[i]['nome'] + ' </td>\
                                 <td> ' + promozioni[i]['descrizione'] + ' </td>\
                                 <td> ' + promozioni[i]['date_start'] + ' </td>\
                                 <td> ' + promozioni[i]['date_end'] + ' </td>\
                                 <td> cancellare </td>\
                                 <td> cancellare </td>\
                                 </tr>';
                        }
                    } else {
                        html += '<tr>\
                                 <td> Nessuna promozione trovata</td>\
                                 </tr>';
                    }

                    $("#tbody").html(html);

                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {

      


        // $('#s1').mouseup(function() {
        //     console.log("CIAO")
        // for (var i = 0; i <nomeNegozio.length; i++) {
        //     if (nomeNegozio[i] == 15){
        //     console.log("OK");
        // }
        // }

        // var open = $(this).data("isopen");
        // if (open) {
        //     console.log("ciao")
        // }
        // $(this).data("isopen", !open);
        // });

        $('#datepicker-1, #datepicker-modal-2').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });

        $('#datepicker-2, #datepicker-modal-3').daterangepicker({
            timePicker: true,
            startDate: moment(),
            endDate: moment(),
            locale: {
                format: 'YYYY-M-DD'
            }
        });

        $('#datepicker-3').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        });

        $(function() {

            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            }

            $('#datepicker-4').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }, cb);

            cb(start, end);

        });

        $('#custom-range').daterangepicker({
            "showDropdowns": true,
            "showWeekNumbers": true,
            "showISOWeekNumbers": true,
            "timePicker": true,
            "timePicker24Hour": true,
            "timePickerSeconds": true,
            "autoApply": true,
            "maxSpan": {
                "days": 7
            },
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "alwaysShowCalendars": true,
            "startDate": "05/12/2019",
            "endDate": "05/18/2019",
            "applyButtonClasses": "btn-default shadow-0",
            "cancelClass": "btn-success shadow-0"
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });

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
                // {
                //     extend: 'copyHtml5',
                //     text: 'Copy',
                //     titleAttr: 'Copy to clipboard',
                //     className: 'btn-outline-primary btn-sm mr-1'
                // },
                // {
                //     extend: 'print',
                //     text: 'Print',
                //     titleAttr: 'Print Table',
                //     className: 'btn-outline-primary btn-sm'
                // }
            ]
        });



    });
</script>
@stop