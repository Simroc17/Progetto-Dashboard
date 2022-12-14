@extends('layouts.master')

@section('title', 'Date Range Picker - Form Plugins')

@section('headerStyle')
<link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.css') }}">
@stop

@section('content')

<main id="js-page-content" role="main" class="page-content">

<div class="subheader">
        <h1 class="subheader-title">
          Ricerca Promozioni
        </h1>
    </div>
   
   
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Filtra per risultati                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <!-- <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button> -->
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        
                        <!-- <div class="form-group row">
                            <label class="col-form-label col-12 col-lg-3 form-label text-lg-right">Minimum Setup</label>
                            <div class="col-12 col-lg-6 ">
                                <input type="text" class="form-control" id="datepicker-1" placeholder="Select date" value="01/01/2018 - 01/15/2018">
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label class="col-form-label col-12 col-lg-3 form-label text-lg-right">Date Range Picker With Times</label>
                            <div class="col-12 col-lg-6">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Select date" id="datepicker-2">
                                    <div class="input-group-append">
                                        <span class="input-group-text fs-xl">
                                            <i class="fal fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                       
                        <!-- <div class="form-group row">
                            <label class="col-form-label col-12 col-lg-3 form-label text-lg-right">Modal Demos</label>
                            <div class="col-12 col-lg-6">
                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#default-example-modal">Show inside datepicker</a>
                            </div>
                        </div> -->
                        <!-- modal -->
                        <!-- <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">
                                            Date picker inside modal
                                        </h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="form-label" for="datepicker-modal-2">Minimum Setup</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fs-xl"><i class="fal fa-calendar"></i></span>
                                                </div>
                                                <input type="text" id="datepicker-modal-2" class="form-control" placeholder="Select a date" aria-label="date" aria-describedby="datepicker-modal-2">
                                            </div>
                                            <span class="help-block">Some help content goes here</span>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="datepicker-modal-3">Date Range Picker With Times</label>
                                            <div class="input-group">
                                                <input type="text" id="datepicker-modal-3" class="form-control" placeholder="End date" aria-label="date" aria-describedby="datepicker-modal-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text fs-xl"><i class="fal fa-calendar-alt"></i></span>
                                                </div>
                                            </div>
                                            <span class="help-block">Some help content goes here</span>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- modal end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop

@section('footerScript')
<script src="{{ URL::asset('js/dependency/moment/moment.js') }}"></script>
<script src="{{ URL::asset('js/formplugins/bootstrap-daterangepicker/bootstrap-daterangepicker.js') }}"></script>
<script>
    $(document).ready(function() {



        $('#datepicker-1, #datepicker-modal-2').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });

        $('#datepicker-2, #datepicker-modal-3').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'M/DD hh:mm A'
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

    });
</script>
@stop