<!DOCTYPE html>
<html class="wide wow-animation" lang="en">

<head>
    <!-- Site Title-->
    <title>Chances Vitória</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
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
                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <div style="text-align: left;">
                                        <a href="./">
                                            <img src="images/logo-soccer-default-95x126.png" alt=""
                                                width="95" height="126" />
                                            <h6 class="heading-component-title">Chances do Vitória</h6>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6">
                                    <ul class="rd-navbar-nav" style="margin-top: 20px;">
                                        <li class="rd-nav-item"><a class="heading-component-title"
                                                href="/QuemSomos">Quem Somos</a>
                                        </li>
                                        <li class="rd-nav-item"><a class="heading-component-title"
                                                href="/Chances">Chances</a>
                                        </li>
                                        {{-- <li class="rd-nav-item"><a class="heading-component-title"
                                                href="/Elenco">Elenco</a>
                                        </li> --}}
                                    </ul>
                                </div>
                                <!-- Force next columns to break to new line -->
                                <div class="w-100"></div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- Swiper-->
        <section style="margin-top: -50px; margin-bottom: -40px" class="section swiper-container swiper-slider swiper-classic bg-gray-2" data-loop="false"
            data-autoplay="4000" data-simulate-touch="false" data-slide-effect="fade">
            <div class="swiper-wrapper">
                <div class="swiper-slide" data-slide-bg="images/slider-1-slide-3-1920x671.jpg">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="swiper-slide-caption">
                                    <h1 data-caption-animate="fadeInUp" data-caption-delay="100" style="color: #212121">
                                        Melhor Site</h1>
                                    <h4 data-caption-animate="fadeInUp" data-caption-delay="200" style="color: #212121">
                                        para noticias de futebol, atualizações <br class="d-none d-xl-block"> e
                                        resultados de jogos.</h4><a class="button button-primary"
                                        data-caption-animate="fadeInUp" data-caption-delay="300"
                                        href="/Chances">Confira</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section section-md bg-gray-100">
            <div class="container">
                <!-- Heading Component-->
                <article class="heading-component">
                    <div class="heading-component-inner">
                        <h5 class="heading-component-title">Proximos Jogos</h5>
                    </div>
                </article>
                <div>
                    <div class="col-12">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($chunks1 as $index => $chunk)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="row">
                                            @foreach ($chunk as $value)
                                                <div class="col-lg-4">
                                                    <div class="card text-center" style="border: 4px solid #9EEB47">
                                                        <div class="card-header" style="text-align: center">
                                                            <h5>Campeonato Brasileiro</h5>
                                                        </div>
                                                        <div class="card-body" style="background-color: #c9c9c9">
                                                            <p style="text-align: center; color: #212121">
                                                                <img src="images/{{ strtolower($value[0]) }}.png">
                                                                {{ $value[0] }} x {{ $value[1] }}
                                                                <img src="images/{{ strtolower($value[1]) }}.png">
                                                            </p>
                                                        </div>
                                                        <div class="card-footer">
                                                            <h5 class="text-lg font-bold">Chances</h5>
                                                            <br>
                                                            <div class="grid text-center">
                                                                <div class="row">
                                                                    <div class="col-4">
                                                                        <h6 style="color: green">Vitória</h6>
                                                                        <div>
                                                                            <p style="color: #212121">{{ $value[2] }}%</p>
                                                                            {{-- Adicione outras informações aqui --}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <h6>Empate</h6>
                                                                        <div>
                                                                            <p style="color: #212121">{{ $value[3] }}%</p>
                                                                            {{-- Adicione outras informações aqui --}}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-4">
                                                                        <h6 style="color: red">Derrota</h6>
                                                                        <div>
                                                                            <p style="color: #212121">{{ $value[4] }}%</p>
                                                                            {{-- Adicione outras informações aqui --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                </div>
            </div>
        </section>
        <section class="section section-md bg-gray-100">
          <div class="container">
              <!-- Heading Component-->
              <article class="heading-component">
                  <div class="heading-component-inner">
                      <h5 class="heading-component-title">Últimos Jogos</h5>
                  </div>
              </article>
              <div>
                  <div class="col-12">
                      <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
                          <div class="carousel-inner">
                              @foreach ($chunks2 as $index => $chunk)
                                  <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                      <div class="row">
                                          @foreach ($chunk as $value)
                                              <div class="col-lg-4">
                                                <div class="card text-center" style="border: 4px solid #9EEB47">
                                                      <div class="card-header" style="text-align: center">
                                                          <h5>Campeonato Brasileiro</h5>
                                                      </div>
                                                      <div class="card-body" style="background-color: #c9c9c9">
                                                          <p style="text-align: center; color: #212121">
                                                              <img src="images/{{ strtolower($value[0]) }}.png">
                                                              {{ $value[0] }} {{ $value[2] }} x {{ $value[3] }} {{ $value[1] }}
                                                              <img src="images/{{ strtolower($value[1]) }}.png">
                                                          </p>
                                                      </div>
                                                      <div class="card-footer">
                                                          <h5 class="text-lg font-bold">Chances</h5>
                                                          <br>
                                                          <div class="grid text-center">
                                                              <div class="row">
                                                                  <div class="col-4">
                                                                      <h6 style="color: green">Vitória</h6>
                                                                      <div>
                                                                          <p style="color: #212121">{{ $value[4] }}%</p>
                                                                          {{-- Adicione outras informações aqui --}}
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-4">
                                                                      <h6>Empate</h6>
                                                                      <div>
                                                                          <p style="color: #212121">{{ $value[5] }}%</p>
                                                                          {{-- Adicione outras informações aqui --}}
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-4">
                                                                      <h6 style="color: red">Derrota</h6>
                                                                      <div>
                                                                          <p style="color: #212121">{{ $value[6] }}%</p>
                                                                          {{-- Adicione outras informações aqui --}}
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          @endforeach
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators2"
                              data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators2"
                              data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                          </button>
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
        <!-- Javascript-->
        <script src="js/core.min.js"></script>
        <script src="js/script.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>
