@extends('layouts.master')

@section('title', 'Tabs &amp; Accordions - UI Components')

@section('content')
<main id="js-page-content" role="main" class="page-content">

    @component('common-components.breadcrumb')
    @slot('item1') UI Components @endslot
    @slot('item2') Tabs &amp; Accordions @endslot
    @endcomponent
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-window'></i> Tabs & Accordions
            <small>
                tabs-and-accordions description
            </small>
        </h1>
    </div>
    tabs-and-accordions
</main>
@stop
