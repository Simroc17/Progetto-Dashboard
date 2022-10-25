@extends('layouts.master')

@section('title', 'Welcome - Laravel')

@section('content')

<main id="js-page-content" role="main" class="page-content">

   

    <div class="subheader">
        <h1 class="subheader-title">
          Ricerca Promozioni
        </h1>
    </div>
    <div class="card mb-g">
        <div class="card-header">
            <h4 class="mb-0">Filtra i risultati per</h4>
        </div>
        <div class="card-body">
           
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
        <div class="form-group row">
                            <label class="col-form-label col-12 col-lg-3 form-label text-lg-right">Minimum Setup</label>
                            <div class="col-12 col-lg-6 ">
                                <input type="text" class="form-control" id="datepicker-1" placeholder="Select date" value="01/01/2018 - 01/15/2018">
                            </div>
                        </div>
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
        </div>
    </div>
</main>
@stop
