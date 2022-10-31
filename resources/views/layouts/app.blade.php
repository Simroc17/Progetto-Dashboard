<!DOCTYPE html>
<!--
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.5.1
Author: Sunnyat A.
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0?ref=myorange
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        @yield('title') - SmartAdmin v4.5.1
    </title>
    <meta name="description" content="Login">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/vendors.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/app.bundle.css') }}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/vendors.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ URL::asset('css/app.bundle.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('/img/favicon/apple-touch-icon.png') }}">
    <link id="mytheme" rel="stylesheet" media="screen, print" href="{{ URL::asset('css/themes/cust-theme-4.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js" referrerpolicy="no-referrer"></script>
    @yield('headerStyle')
    
</head>

<body>
    @yield('content')
    <!-- color-profile -->
    @include('layouts/partials/color-profile')
    <script src="{{ URL::asset('js/vendors.bundle.js') }}"></script>
    <script src="{{ URL::asset('js/app.bundle.js') }}"></script>
    @yield('footerScript')
</body>

</html>
