<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ChancesController extends Controller
{

    public function showTable()
    {
        // Configurando o cliente cURL com verificação de certificado desativada temporariamente
        $client = new Client([
            'verify' => false,
        ]);

        // Realizando a solicitação HTTP usando cURL
        $response = $client->get('https://www.gazetaesportiva.com/campeonatos/brasileiro-serie-a/');

        // Obtendo o corpo da resposta HTTP
        $html = (string) $response->getBody();

        // Criando uma instância do Crawler para analisar o HTML
        $crawler = new Crawler($html);

        // Inicializando um array para armazenar os dados da tabela
        $rows = [];

        // Iterando sobre as linhas da tabela e extraindo os dados das células
        $crawler->filter('table tr')->each(function ($row) use (&$rows) {
            $rowData = [];
            $row->filter('td')->each(function ($cell) use (&$rowData) {
                $rowData[] = $cell->text();
            });
            $rows[] = $rowData;
        });

        // Caminho para o arquivo Excel
        $filePath = public_path('/chancesvitoria.xlsx');

        // Carrega o arquivo Excel
        $spreadsheet = IOFactory::load($filePath);

        // Obtém a primeira planilha do arquivo
        $sheet = $spreadsheet->getSheet(2);

        // Inicializa um array para armazenar os valores das colunas A, B, C, D, E e F
        $values = [];

        // Obtém o número da última linha
        $lastRow = $sheet->getHighestRow();

        // Percorre as linhas da coluna A, B, C, D, E e F a partir da linha 3 até a última linha
        for ($row = 3; $row <= $lastRow; $row++) {
            $cellAValue = $sheet->getCell('A' . $row)->getValue();
            $cellBValue = $sheet->getCell('B' . $row)->getValue();
            $cellCValue = $sheet->getCell('C' . $row)->getValue();
            $cellDValue = $sheet->getCell('D' . $row)->getValue();
            $cellEValue = $sheet->getCell('E' . $row)->getValue();
            $cellFValue = $sheet->getCell('F' . $row)->getValue();

            // Verifica se todas as colunas possuem dados
            if ($cellAValue && $cellBValue && $cellCValue && $cellDValue && $cellEValue && $cellFValue) {
                // Adiciona os valores ao array
                $values[] = [$cellAValue, $cellBValue, $cellCValue, $cellDValue, $cellEValue, $cellFValue];
            }
        }

        // Divide o array em conjuntos de três
        $chunks = array_chunk($values, 2);

        // Retornando a view 'chances' com os dados da tabela compactados
        return view('chances', compact('rows', 'chunks'));
    }




    public function readExcel()
    {
        // Caminho para o arquivo Excel
        $filePath = public_path('chancesvitoria.xlsx');

        // Carrega o arquivo Excel
        $spreadsheet = IOFactory::load($filePath);

        // Planilha 1
        $sheet1 = $spreadsheet->getSheet(0);

        // Inicializa um array para armazenar os valores das colunas A, B, C, D e E da primeira planilha
        $values1 = [];

        // Obtém o número da última linha da primeira planilha
        $lastRow1 = $sheet1->getHighestRow();

        // Percorre as linhas da coluna A, B, C, D e E a partir da linha 3 até a última linha
        for ($row = 3; $row <= $lastRow1; $row++) {
            $cellAValue = $sheet1->getCell('A' . $row)->getValue();
            $cellBValue = $sheet1->getCell('B' . $row)->getValue();
            $cellCValue = $sheet1->getCell('C' . $row)->getValue();
            $cellDValue = $sheet1->getCell('D' . $row)->getValue();
            $cellEValue = $sheet1->getCell('E' . $row)->getValue();

            // Adiciona os valores ao array da primeira planilha
            $values1[] = [$cellAValue, $cellBValue, $cellCValue, $cellDValue, $cellEValue];
        }

        // Planilha 2
        $sheet2 = $spreadsheet->getSheet(1); // Index 1 para a segunda planilha

        // Inicializa um array para armazenar os valores das colunas A, B, C, D, E, F e G da segunda planilha
        $values2 = [];

        // Obtém o número da última linha da segunda planilha
        $lastRow2 = $sheet2->getHighestRow();

        // Percorre as linhas da coluna A, B, C, D, E, F e G a partir da linha 3 até a última linha
        for ($row = 3; $row <= $lastRow2; $row++) {
            $cellA2Value = $sheet2->getCell('A' . $row)->getValue();
            $cellB2Value = $sheet2->getCell('B' . $row)->getValue();
            $cellC2Value = $sheet2->getCell('C' . $row)->getValue();
            $cellD2Value = $sheet2->getCell('D' . $row)->getValue();
            $cellE2Value = $sheet2->getCell('E' . $row)->getValue();
            $cellF2Value = $sheet2->getCell('F' . $row)->getValue();
            $cellG2Value = $sheet2->getCell('G' . $row)->getValue();

            // Adiciona os valores ao array da segunda planilha
            $values2[] = [$cellA2Value, $cellB2Value, $cellC2Value, $cellD2Value, $cellE2Value, $cellF2Value, $cellG2Value];
        }

        // Divide os arrays em conjuntos de três para o primeiro carrossel
        $chunks1 = array_chunk($values1, 3);

        // Divide os arrays em conjuntos de três para o segundo carrossel
        $chunks2 = array_chunk($values2, 3);

        // Retorna os valores para a view
        return view('welcome', ['chunks1' => $chunks1, 'chunks2' => $chunks2]);
    }

    public function showTable2()
    {
        // Configurando o cliente cURL com verificação de certificado desativada temporariamente
        $client = new Client([
            'verify' => false,
        ]);

        // Realizando a solicitação HTTP usando cURL
        $response = $client->get('https://www.espn.com.br/futebol/time/elenco/_/id/3457/liga/BRA.COPA_DO_BRAZIL');

        // Obtendo o corpo da resposta HTTP
        $html = (string) $response->getBody();

        // Criando uma instância do Crawler para analisar o HTML
        $crawler = new Crawler($html);

        // Inicializando um array para armazenar os dados da tabela
        $rows = [];

        // Iterando sobre as linhas da tabela e extraindo os dados das células
        $crawler->filter('table tr')->each(function ($row, $i) use (&$rows) {
            // Inicializar um array para armazenar os dados das cinco primeiras colunas
            $rowData = [];
            // Selecionar as cinco primeiras células (colunas) em cada linha
            $row->filter('td')->slice(0, 5)->each(function ($cell) use (&$rowData) {
                $rowData[] = $cell->text();
            });
            $rows[] = $rowData;
        });

        // Retornando a view 'elenco' com os dados da tabela compactados
        return view('elenco', compact('rows'));
    }

    public function readExcel2()
    {
        // Caminho para o arquivo Excel
        $filePath = public_path('/chancesvitoria.xlsx');

        // Carrega o arquivo Excel
        $spreadsheet = IOFactory::load($filePath);

        // Obtém a primeira planilha do arquivo
        $sheet = $spreadsheet->getSheet(1);

        // Inicializa um array para armazenar os valores das colunas A e B
        $values = [];

        // Obtém o número da última linha
        $lastRow = $sheet->getHighestRow();

        // Percorre as linhas da coluna A e B a partir da linha 3 até a última linha
        for ($row = 3; $row <= $lastRow; $row++) {
            $cellAValue = $sheet->getCell('A' . $row)->getValue();
            $cellBValue = $sheet->getCell('B' . $row)->getValue();
            $cellCValue = $sheet->getCell('C' . $row)->getValue();
            $cellDValue = $sheet->getCell('D' . $row)->getValue();
            $cellEValue = $sheet->getCell('E' . $row)->getValue();
            $cellFValue = $sheet->getCell('F' . $row)->getValue();
            $cellGValue = $sheet->getCell('G' . $row)->getValue();

            // Adiciona os valores ao array
            $values[] = [$cellAValue, $cellBValue, $cellCValue, $cellDValue, $cellEValue, $cellFValue, $cellGValue];
        }

        // Divide o array em conjuntos de três
        $chunks = array_chunk($values, 3);

        // Retorna os valores para a view
        return view('quemsomos', ['chunks' => $chunks]);
    }

}
