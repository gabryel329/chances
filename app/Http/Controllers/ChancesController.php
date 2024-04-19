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

    // Retornando a view 'chances' com os dados da tabela compactados
    return view('chances', compact('rows'));
}


public function readExcel()
{
    // Caminho para o arquivo Excel
    $filePath = public_path('/chancesvitoria.xlsx');
    // Carrega o arquivo Excel
    $spreadsheet = IOFactory::load($filePath);

    // Obtém a primeira planilha do arquivo
    $sheet = $spreadsheet->getActiveSheet();

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

        // Adiciona os valores ao array
        $values[] = [$cellAValue, $cellBValue, $cellCValue, $cellDValue, $cellEValue,];
    }

    // Divide o array em conjuntos de três
    $chunks = array_chunk($values, 3);

    // Retorna os valores para a view
    return view('welcome', ['chunks' => $chunks]);
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


}
