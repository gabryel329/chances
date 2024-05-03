@extends('layouts.app')
@section('content')
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
                        <div class="card text-center" style="border: 4px solid #fe944d; border-radius: 30px;">
                            <div class="card-header" style="text-align: center">
                                <h5 style="font-size: 1.0em;"><img src="images/{{ strtolower(trim($timecasa)) }}.png">
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
                                                    <li class="list-group-item" style="background-color:#e4e4e4;border-radius: 10px">{{ $frase1 }}</li>
                                                    <li class="list-group-item" style="border-radius: 10px">{{ $frase2 }}</li>
                                                    <li class="list-group-item" style="background-color:#e4e4e4;border-radius: 10px">{{ $frase3 }}</li>
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
@endsection