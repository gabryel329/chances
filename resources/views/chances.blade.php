@extends('layouts.app')
@section('content')
        <!-- Swiper-->
        <section class="section section-md " style="margin-top: -30px;">
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
                                <h5 style="font-size: 1.0em; color: black"><img src="images/{{ strtolower(trim($timecasa)) }}.png">
                                    {{ $timecasa }} x {{ $timefora }}
                                    <img src="images/{{ strtolower(trim($timefora)) }}.png"></h5>
                            </div>
                            <div class="card-body">
                                <br>
                                <div class="grid text-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 style="font-size: 1.0em; color: black">Chances <span style="color: green;">{{ $probabilidade*100 }}%</span></h6>
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
        <section class="section section-md">
            <div class="container">
                <div style="align-items: center">
                    <article class="heading-component">
                        <div class="heading-component-inner">
                            <h5 class="heading-component-title">Campeonato Brasileiro</h5>
                        </div>
                    </article>
                    <div class="table-custom-responsive" style="border-radius: 20px; overflow: hidden;">
                        <div style="overflow-x: auto;">
                            <table class="table table-hover bg-gray-100">
                                <thead class="table-light">
                                    <tr>
                                        <th style="border-top-left-radius: 20px;">#</th>
                                        <th colspan="2">Time</th>
                                        <th>P</th>
                                        <th>J</th>
                                        <th>V</th>
                                        <th>E</th>
                                        <th>D</th>
                                        <th>GP</th>
                                        <th>GC</th>
                                        <th>SG</th>
                                        <th style="border-top-right-radius: 20px;">%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rows as $index => $row)
                                    @if ($index != 0)
                                    <tr>
                                        <td class="@if($index >= 1 && $index <= 4)
                                            cell-top-four
                                        @elseif($index >= 5 && $index <= 6)
                                            cell-middle-two
                                        @elseif($index >= 7 && $index <= 12)
                                            cell-middle-seven       
                                        @elseif($index > 16) <!-- Ajuste conforme o total de times -->
                                            cell-bottom-four
                                        @endif">{{ $index }}</td>
                                        <td>
                                            <img src="images/chances-images/{{ strtolower($row[1]) }}.png" style="height: 25px; vertical-align: middle; margin-right: 5px;">
                                            {{ $row[1] }} <!-- Nome do time -->
                                        </td>
                                        @foreach ($row as $cell_index => $cell)
                                        @if ($cell_index != 1) <!-- Pular o índice do nome do time para não duplicar -->
                                            <td>{{ $cell }}</td>
                                        @endif
                                        @endforeach
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="3" style="border-bottom-left-radius: 20px;">
                                            <div class="color-box" style="background-color:#2161c7"></div>
                                            Libertadores
                                        </td>
                                        
                                        <td colspan="3">
                                            <div class="color-box" style="background-color:#d07026"></div>
                                            Class. Libertadores
                                        </td>
                                       
                                        <td colspan="3">
                                            <div class="color-box" style="background-color:#1fbe4a"></div>
                                            Sul-Americana
                                        </td>
                                      
                                        <td colspan="3" style="border-bottom-right-radius: 20px;">
                                            <div class="color-box" style="background-color:#d42a18"></div>
                                            Rebaixamento
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection