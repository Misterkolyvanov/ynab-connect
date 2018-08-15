<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('_theme/assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('_theme/assets/img/favicon.png') }}" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="{{ asset('_theme/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('_theme/assets/css/material-bootstrap-wizard.css') }}" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('_theme/assets/css/demo.css') }}" rel="stylesheet" />
</head>

<body>
<div class="image-container set-full-height" style="background-image: url('https://www.rytsar.io/website/img/CRM-PM-User-1.jpg')">
    <!--   Creative Tim Branding   -->
    <a href="http://creative-tim.com">
        <div class="logo-container">
            <div class="logo">
                <img src="{{ asset('img/logo.png') }}">
            </div>
            <div class="brand">
                {{ config('app.name', 'Laravel') }}
            </div>
        </div>
    </a>

    <!--  Made With Material Kit  -->
    <a href="https://github.com/Misterkolyvanov/ynab-connect" class="made-with-mk">
        <div class="brand">GH</div>
        <div class="made-with">Download on <strong>GitHub</strong></div>
    </a>

    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                @yield('wizard')
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container text-center">
            Made with <i class="fa fa-heart heart"></i> by {{ config('app.name', 'Laravel') }}. Regular YNABBERS</a>
            | <a href="/terms-conditions">Terms & Conditions</a>
            | <a href="/how-it-works">How It Works</a>
            | <a href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="{{ asset('_theme/assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('_theme/assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('_theme/assets/js/jquery.bootstrap.js') }}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('_theme/assets/js/material-bootstrap-wizard.js') }}"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{ asset('_theme/assets/js/jquery.validate.min.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>
</html>
