@extends('layouts.master')

@section('title', 'Tooltips &amp; Popovers - UI Components ')

@section('content')
<main id="js-page-content" role="main" class="page-content">

    @component('common-components.breadcrumb')
    @slot('item1') UI Components @endslot
    @slot('item2') Tooltips &amp; Popovers @endslot
    @endcomponent
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-window'></i> Tooltips & Popovers
            <small>
                tooltips-and-popovers description
            </small>
        </h1>
    </div>
    tooltips-and-popovers
</main>
@stop
