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
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Kanit:300,400,500,500i,600,900%7CRoboto:400,900">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/fonts.css">
        <link rel="stylesheet" href="css/style.css">
        <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
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
                            <img src="images/logo-soccer-default-95x126.png" alt="" width="95" height="126"/>
                            <h6 class="heading-component-title">Chances do Vitória</h6>
                          </a>
                        </div>
                      </div>
                      <div class="col-6 col-sm-6">
                        <ul class="rd-navbar-nav" style="margin-top: 20px;">
                          <li class="rd-nav-item"><a class="heading-component-title" href="./QuemSomos">Quem Somos</a>
                          </li>
                          <li class="rd-nav-item"><a class="heading-component-title" href="./Chances">Chances</a>
                          </li>
                          <li class="rd-nav-item"><a class="heading-component-title" href="./Elenco">Elenco</a>
                          </li>
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
        <section class="section section-md bg-gray-100">
            <div class="container">
              <div style="align-items: center">
                <article class="heading-component">
                  <div class="heading-component-inner">
                    <h5 class="heading-component-title">Jogadores</h5>
                  </div>
                </article>
                <div class="table-custom-responsive">
                  <table class="table-custom table-standings table-classic">
                    <thead>
                      <tr>
                        <th>NOMES</th>
                        <th>POS</th>
                        <th>IDADE</th>
                        <th>ALT</th>
                        <th>P</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $row)
                            <tr>
                                @foreach($row as $cell)
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
                    <p class="rights"><span>A&B Entertainment and Business</span><span>&nbsp;&copy;&nbsp;</span><span class="copyright-year"></span><span>.&nbsp;</span>
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
    </body>
</html>
