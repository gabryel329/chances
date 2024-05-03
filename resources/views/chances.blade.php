<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>Chances Vitória</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/logo-soccer-default-95x126.png" style="width: auto; height: auto;" type="image/x-icon">
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
</head>

<body>
    <div class="ie-panel"></div>
    <div class="preloader">
        <div class="preloader-body">
            <div class="preloader-item"></div>
        </div>
    </div>
    <!-- Page-->
    <div class="page">
        <!-- Page Header-->
        <header class="section page-header rd-navbar-dark">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-classic">
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-main"><span></span></button>
                        <!-- RD Navbar Panel-->
                        <div class="rd-navbar-panel-inner container">
                            <div class="rd-navbar-collapse">
                            </div>
                        </div>
                    </div>
                    <div class="rd-navbar-main">
                        <div class="container text-center">
                            <div class="row justify-content-start">
                                <div class="col-12" style="padding: 10px">
                                    <a href="./" class="d-flex align-items-center">
                                        <img src="images/logo-soccer-default-95x126.png" alt="" width="70" height="100" />
                                        <h6 class="font-nitrous-oxides" style="padding: 6.5px 0px 0px 0px">
                                            <span style="color: #F66604; margin-left: -30px">Chances</span><br>
                                            <span style="color: #fff">do Vitória</span>
                                        </h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- Swiper-->
        <section class="section section-md bg-gray-100" style="margin-top: -30px;">
            <div class="container">
                <!-- Heading Component-->
                <article class="heading-component">
                    <div class="heading-component-inner">
                        <h5 class="heading-component-title">Chances para o jogo: </h5>
                    </div>
                </article>
                <div class="col align-self-center">
                    <div class="col-lg-12">
                        <div class="card text-center" style="border: 4px solid #9EEB47; border-radius: 30px;">
                            <div class="card-header" style="text-align: center">
                                <h5><img src="images/{{ strtolower(trim($timecasa)) }}.png">
                                    {{ $timecasa }} x {{ $timefora }}
                                    <img src="images/{{ strtolower(trim($timefora)) }}.png"></h5>
                            </div>
                            <div class="card-body">
                                <br>
                                <div class="grid text-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6>Chances <span style="color: green;">{{ $probabilidade*100 }}%</span></h6>
                                            <div class="col-md">
                                                <p>
                                                    <li class="list-group-item" style="border-radius: 10px">{{ $frase1 }}</li>
                                                    <li class="list-group-item" style="border-radius: 10px">{{ $frase2 }}</li>
                                                    <li class="list-group-item" style="border-radius: 10px">{{ $frase3 }}</li>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </section>
        <section class="section section-md bg-gray-100">
            <div class="container">
                <div style="align-items: center">
                    <article class="heading-component">
                        <div class="heading-component-inner">
                            <h5 class="heading-component-title">Campeonato Brasileiro</h5>
                        </div>
                    </article>
                    <div class="table-custom-responsive">
                        <table class="table-custom table-standings table-classic">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th colspan="2">Time</th>
                                    <th>P</th>
                                    <th>J</th>
                                    <th>V</th>
                                    <th>E</th>
                                    <th>D</th>
                                    <th>GP</th>
                                    <th>GC</th>
                                    <th>SG</th>
                                    <th>%</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rows as $index => $row)
                                    <tr>
                                        <!-- Verifica se não é a primeira linha antes de imprimir o índice -->
                                        <td>{{ $index > 0 ? $index : '' }}</td>
                                        @foreach ($row as $cell)
                                            <td>{{ $cell }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </section>
        <footer class="section footer-classic footer-classic-dark context-dark">
            <div class="footer-classic-aside footer-classic-darken">
                <div class="container">
                    <div class="layout-justify">
                        <!-- Rights-->
                        <p class="rights"><span>A&B Entertainment and
                                Business</span><span>&nbsp;&copy;&nbsp;</span><span
                                class="copyright-year"></span><span>.&nbsp;</span>
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
        <!-- Javascript-->
        <script src="js/core.min.js"></script>
        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

</body>

</html>
