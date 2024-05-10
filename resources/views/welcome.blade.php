    @extends('layouts.app')
    @section('content')

        <section class="section section-xs">
            
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-6" style="text-align: center">
                      
                    </div>
                  </div>
                <!-- Heading Component-->
                <article class="heading-component">
                    <div class="heading-component-inner">
                        <h5 class="heading-component-title">Proximos Jogos</h5>
                        <p>Última atualização: <span style="color: red">{{ $dataHora }}</span></p>
                    </div>
                </article>
                <div>
                    <div class="col-12">
                        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="false">
                            <div class="carousel-inner">
                                @foreach ($chunks1 as $index => $chunk)
                                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                        <div class="row">
                                            @foreach ($chunk as $value)
                                                <div class="col-lg-4" style="margin: 5px 0px;">
                                                    <a class="elemento" href="/Chances?timecasa={{ $value->timecasa }}&timefora={{ $value->timefora }}&probabilidade={{ $value->vitoria }}" title="Veja as probabilidades.">
                                                        <div class="card text-center" style="border: 4px solid #F66604; border-radius: 10%; width: 100%;">
                                                            <div class="card-header" style="text-align: center">
                                                                <h5 style="color: #000">Rodada Seguinte</h5>
                                                            </div>
                                                            <div class="card-body" style="background-color: #e2e1e1">
                                                                <p style="text-align: center; color: #212121">
                                                                    <img src="images/{{ strtolower(trim($value->timecasa)) }}.png">
                                                                    <span class="abreviar">{{ $value->timecasa }}</span> x <span class="abreviar">{{ $value->timefora }}</span>
                                                                    <img src="images/{{ strtolower(trim($value->timefora)) }}.png">
                                                                </p>
                                                            </div>
                                                            <div class="card-footer">
                                                                <h5 class="text-lg font-bold" style="color: #000">Chances</h5>
                                                                <br>
                                                                <div class="grid text-center">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <h6 style="color: green">Vitória</h6>
                                                                            <div>
                                                                                <p style="color: #212121">{{ substr($value->vitoria, 0, 4)*100 }}%
                                                                                </p>
                                                                                {{-- Adicione outras informações aqui --}}
                                                                            </div>
                                                                        </div>
                                                                        {{-- <div class="col-4">
                                                                            <h6>Empate</h6>
                                                                            <div>
                                                                                <p style="color: #212121">{{ $value[3] }}%</p>
                                                                            </div>
                                                                        </div> --}}
                                                                        {{-- <div class="col-4">
                                                                            <h6 style="color: red">Derrota</h6>
                                                                            <div>
                                                                                <p style="color: #212121">{{ $value[4] }}%</p>
                                                                            </div>
                                                                        </div> --}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                </div>
            </div>
        </section>
        <section class="section section-xs">
          <div class="container">
              <!-- Heading Component-->
              <article class="heading-component">
                  <div class="heading-component-inner">
                      <h5 class="heading-component-title">Últimos Jogos</h5>
                  </div>
              </article>
              <div>
                  <div class="col-12">
                      <div id="carouselExampleDark2" class="carousel carousel-dark slide">
                          <div class="carousel-inner">
                              @foreach ($chunks2 as $index => $chunk)
                                  <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                      <div class="row">
                                          @foreach ($chunk as $value)
                                            <div class="col-lg-4">
                                                <a class="elemento"  href="/Chances?timecasa={{ $value->timecasa }}&timefora={{ $value->timefora }}&probabilidade={{ $value->vitoria }}" title="Veja as probabilidades.">
                                                <div class="card text-center" style="border: 4px solid #F66604; border-radius: 10%; width: 100%;">
                                                      <div class="card-header" style="text-align: center">
                                                          <h5 style="color: #000">Rodada Anterior</h5>
                                                      </div>
                                                      <div class="card-body" style="background-color: #e2e1e1">
                                                            <p style="text-align: center; color: #212121">
                                                                <img src="images/{{ strtolower(trim($value->timecasa)) }}.png">
                                                                <span class="abreviar">{{ $value->timecasa }}</span> {{ $value->golscasa }} x {{ $value->golsfora }} <span class="abreviar">{{ $value->timefora }}</span>
                                                                <img src="images/{{ strtolower(trim($value->timefora)) }}.png">
                                                            </p>
                                                      </div>
                                                      <div class="card-footer">
                                                          <h5 class="text-lg font-bold" style="color: #000">Chances</h5>
                                                          <br>
                                                          <div class="grid text-center">
                                                              <div class="row">
                                                                  <div class="col-12">
                                                                      <h6 style="color: green">Vitória</h6>
                                                                      <div>
                                                                          <p style="color: #212121">{{ substr($value->vitoria, 0, 4)*100 }}%</p>
                                                                          {{-- Adicione outras informações aqui --}}
                                                                      </div>
                                                                  </div>
                                                                  {{-- <div class="col-4">
                                                                      <h6>Empate</h6>
                                                                      <div>
                                                                          <p style="color: #212121">{{ $value[5] }}%</p>
                                                                      </div>
                                                                  </div>
                                                                  <div class="col-4">
                                                                      <h6 style="color: red">Derrota</h6>
                                                                      <div>
                                                                          <p style="color: #212121">{{ $value[6] }}%</p>
                                                                      </div>
                                                                  </div> --}}
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                </a>
                                            </div>
                                          @endforeach
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark2"
                              data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark2"
                              data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                          </button>
                      </div>

              </div>
          </div>
      </section>
@endsection