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

        // Obtém os valores de algumas células específicas
        $cellA3 = $sheet->getCell('A3')->getValue();
        $cellB3 = $sheet->getCell('B3')->getValue();

        // Retorna os valores para a view
        return view('welcome', [
            'cellA3' => $cellA3,
            'cellB3' => $cellB3,
        ]);
    }
}
