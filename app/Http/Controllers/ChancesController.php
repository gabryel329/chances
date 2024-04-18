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
        $client = new Client();
        $response = $client->get('https://www.google.com/search?q=tabela+brasileirao');
        $html = (string) $response->getBody();

        $crawler = new Crawler($html);

        $rows = [];
        $crawler->filter('table tr')->each(function ($row) use (&$rows) {
            $rowData = [];
            $row->filter('td')->each(function ($cell) use (&$rowData) {
                $rowData[] = $cell->text();
            });
            $rows[] = $rowData;
        });

        return view('chances', compact('rows'));
    }

    public function readExcel()
    {
        // Caminho para o arquivo Excel
        $filePath = public_path('C:\Users\Design Rafaela\Desktop\chancesvitoria.xlsx');
        $dd('$filePath');
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
