<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>Chances Vitória</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/LOGO_CHANCES-_1_-_2_.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="//fonts.googleapis.com/css?family=Kanit:300,400,500,500i,600,900%7CRoboto:400,900">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">    
    <link rel="stylesheet" href="css/style.css">
    <style>
        .ie-panel {
            display: none;
            background: #212121;
            padding: 10px 0;
            box-shadow: 3px 3px 5px 0 rgba(0, 0, 0, .3);
            clear: both;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        html.ie-10 .ie-panel,
        html.lt-ie-10 .ie-panel {
            display: block;
        }
    </style>
    @stack('css')
</head>

<body>
    @php
        @session_start();
    @endphp

    @include('layouts.header')

    @yield('content')

    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    @stack('scripts')

        <footer class="section footer-classic footer-classic-dark context-dark">
            <div class="footer-classic-aside footer-classic-darken">
                <div class="container">
                    <div class="layout-justify">
                        <!-- Rights-->
                        <p class="rights"><span>A&B Entertainment and
                                Business</span><span>&nbsp;&copy;&nbsp;</span><span
                                class="copyright-year"></span><span>.&nbsp;</span>
                            {{-- <span>
                            Designed by <a href="https://www.templatemonster.com/products/author/zemez/">Zemez.</a>
                        </span> --}}
                        </p>
                        <nav class="nav-minimal">
                            <ul class="nav-minimal-list">
                                {{-- <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Statistics</a></li>
                        <li><a href="#">Team</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Shop</a></li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </footer>

</body>

</html>