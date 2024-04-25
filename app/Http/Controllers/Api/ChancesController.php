<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ante5j;
use App\Models\Chancesvit;
use App\Models\Prox5j;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

class ChancesController extends Controller
{
    public function atualiza()
    {
        // Caminho para o arquivo Excel
        $filePath = public_path('/chancesvitoria.xlsx');
    
        // Carrega o arquivo Excel
        $spreadsheet = IOFactory::load($filePath);
    
        // Obtém a primeira planilha do arquivo
        $sheet = $spreadsheet->getSheet(1);
    
        // Obtém o número da última linha
        $lastRow = $sheet->getHighestRow();
    
        // Percorre as linhas do arquivo Excel
        for ($row = 3; $row <= $lastRow; $row++) {
            // Obtém os valores das células
            $cellAValue = $sheet->getCell('A' . $row)->getValue();
            $cellBValue = $sheet->getCell('B' . $row)->getValue();
            $cellCValue = $sheet->getCell('C' . $row)->getValue();
            $cellDValue = $sheet->getCell('D' . $row)->getValue();
            $cellEValue = $sheet->getCell('E' . $row)->getValue();
            $cellFValue = $sheet->getCell('F' . $row)->getValue();
            $cellGValue = $sheet->getCell('G' . $row)->getValue();
    
            // Verifica se já existe uma entrada com os mesmos valores de "timecasa" e "timefora"
            $existingEntry = DB::table('ante5j')
                ->where('timecasa', $cellAValue)
                ->where('timefora', $cellBValue)
                ->exists();
    
            // Se não existir uma entrada com os mesmos valores, insere os dados no banco de dados
            if (!$existingEntry) {
                // Substitua 'nome_da_tabela' pelo nome real da sua tabela
                DB::table('ante5j')->insert([
                    'timecasa' => $cellAValue,
                    'timefora' => $cellBValue,
                    'golscasa' => $cellCValue,
                    'golsfora' => $cellDValue,
                    'vitoria' => $cellEValue,
                    'empate' => $cellFValue,
                    'derrota' => $cellGValue,
                ]);
            }
        }

        // Obtém a primeira planilha do arquivo
        $sheet2 = $spreadsheet->getSheet(0);
    
        // Obtém o número da última linha
        $lastRow = $sheet2->getHighestRow();
    
        // Percorre as linhas do arquivo Excel
        for ($row = 3; $row <= $lastRow; $row++) {
            // Obtém os valores das células
            $cellA2Value = $sheet2->getCell('A' . $row)->getValue();
            $cellB2Value = $sheet2->getCell('B' . $row)->getValue();
            $cellC2Value = $sheet2->getCell('C' . $row)->getValue();
            $cellD2Value = $sheet2->getCell('D' . $row)->getValue();
            $cellE2Value = $sheet2->getCell('E' . $row)->getValue();
    
            // Verifica se já existe uma entrada com os mesmos valores de "timecasa" e "timefora"
            $existingEntry = DB::table('prox5j')
                ->where('timecasa', $cellA2Value)
                ->where('timefora', $cellB2Value)
                ->exists();
    
            // Se não existir uma entrada com os mesmos valores, insere os dados no banco de dados
            if (!$existingEntry) {
                // Substitua 'nome_da_tabela' pelo nome real da sua tabela
                DB::table('prox5j')->insert([
                    'timecasa' => $cellA2Value,
                    'timefora' => $cellB2Value,
                    'vitoria' => $cellC2Value,
                    'empate' => $cellD2Value,
                    'derrota' => $cellE2Value,
                ]);
            }
        }

        // Obtém a primeira planilha do arquivo
        $sheet3 = $spreadsheet->getSheet(2);
    
        // Obtém o número da última linha
        $lastRow = $sheet3->getHighestRow();
    
        // Percorre as linhas do arquivo Excel
        for ($row = 3; $row <= $lastRow; $row++) {
            // Obtém os valores das células
            $cellA3Value = $sheet3->getCell('A' . $row)->getValue();
            $cellB3Value = $sheet3->getCell('B' . $row)->getValue();
            $cellC3Value = $sheet3->getCell('C' . $row)->getValue();
            $cellD3Value = $sheet3->getCell('D' . $row)->getValue();
            $cellE3Value = $sheet3->getCell('E' . $row)->getValue();
            $cellF3Value = $sheet3->getCell('F' . $row)->getValue();
    
            // Verifica se já existe uma entrada com os mesmos valores de "timecasa" e "timefora"
            $existingEntry = DB::table('chancesvit')
                ->where('campeao', $cellA3Value)
                ->where('libertadores', $cellB3Value)
                ->exists();
    
            // Se não existir uma entrada com os mesmos valores, insere os dados no banco de dados
            if (!$existingEntry) {
                // Substitua 'nome_da_tabela' pelo nome real da sua tabela
                DB::table('chancesvit')->insert([
                    'campeao' => $cellA3Value,
                    'libertadores' => $cellB3Value,
                    'sulamericana' => $cellC3Value,
                    'rebaixamento' => $cellD3Value,
                    'previsao' => $cellE3Value,
                    'posicao' => $cellF3Value,
                ]);
            }
        }
    }

    
    public function welcome()
    {
        $dadosProx = Prox5j::all();
        $dadosAnte = Ante5j::all();

        // Divide os arrays em conjuntos de três para o primeiro carrossel
        $chunks1 = $dadosProx->chunk(3);

        // Divide os arrays em conjuntos de três para o segundo carrossel
        $chunks2 = $dadosAnte->chunk(3);

        $this->atualiza();

        // Retorna os valores como JSON
        return response()->json(['Proximos_Jogos' => $chunks1, 'Jogos_Anteriores' => $chunks2]);
    }


    // public function chances()
    // {
    //     // Configurando o cliente cURL com verificação de certificado desativada temporariamente
    //     $client = new Client([
    //         'verify' => false,
    //     ]);
    
    //     // Realizando a solicitação HTTP usando cURL
    //     $response = $client->get('https://www.gazetaesportiva.com/campeonatos/brasileiro-serie-a/');
    
    //     // Obtendo o corpo da resposta HTTP
    //     $html = (string) $response->getBody();
    
    //     // Criando uma instância do Crawler para analisar o HTML
    //     $crawler = new Crawler($html);
    
    //     // Inicializando um array para armazenar os dados da tabela HTML
    //     $rows = [];
    
    //     // Iterando sobre as linhas da tabela e extraindo os dados das células
    //     $crawler->filter('table tr')->each(function ($row) use (&$rows) {
    //         $rowData = [];
    //         $row->filter('td')->each(function ($cell) use (&$rowData) {
    //             $rowData[] = $cell->text();
    //         });
    //         $rows[] = $rowData;
    //     });
    
    //     // Busca os dados da tabela chancesvit
    //     $dadosChances = Chancesvit::all();

    //     // Para dividir os dados em partes
    //     $chunks = $dadosChances->chunk(2);

    //     // Retornando a view 'chances' com os dados da tabela HTML e da tabela chancesvit
    //     return view('chances', compact('rows', 'chunks'));
    // }

    // public function quemsomos()
    // {
    //     $dadosAnte = Ante5j::all();

    //     // Divide o array em conjuntos de três
    //     $chunks = $dadosAnte->chunk(3);

    //     // Retorna os valores para a view
    //     return view('quemsomos', compact('chunks'));
    // }
}
