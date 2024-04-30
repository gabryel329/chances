<?php

namespace App\Http\Controllers;

use App\Models\Ante5j;
use App\Models\Chancesvit;
use App\Models\Prox5j;
use Carbon\Carbon;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;

class ChancesController extends Controller
{

    public function chances()
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
    
        // Inicializando um array para armazenar os dados da tabela HTML
        $rows = [];
    
        // Iterando sobre as linhas da tabela e extraindo os dados das células
        $crawler->filter('table tr')->each(function ($row) use (&$rows) {
            $rowData = [];
            $row->filter('td')->each(function ($cell) use (&$rowData) {
                $rowData[] = $cell->text();
            });
            $rows[] = $rowData;
        });
    
        // Busca os dados da tabela chancesvit
        $dadosChances = Chancesvit::orderBy('id', 'desc')->limit(5)->get()->reverse();

        // Para dividir os dados em partes
        $chunks = $dadosChances->chunk(2);

        // Retornando a view 'chances' com os dados da tabela HTML e da tabela chancesvit
        return view('chances', compact('rows', 'chunks'));
    }
    

    public function welcome()
    {
        $dadosProx = Prox5j::orderBy('id', 'desc')->limit(5)->get()->reverse();
        $dadosAnte = Ante5j::orderBy('id', 'desc')->limit(5)->get()->reverse();

        $dataHora = Ante5j::orderBy('id', 'desc')->first()->created_at->format('d-m-Y');

        // Divide os arrays em conjuntos de três para o primeiro carrossel
        $chunks1 = $dadosProx->chunk(3);

        // Divide os arrays em conjuntos de três para o segundo carrossel
        $chunks2 = $dadosAnte->chunk(3);

        // Retorna os valores para a view
        return view('welcome', compact(['chunks1', 'chunks2', 'dataHora']));
    }

    // public function showTable2()
    // {
    //     // Configurando o cliente cURL com verificação de certificado desativada temporariamente
    //     $client = new Client([
    //         'verify' => false,
    //     ]);

    //     // Realizando a solicitação HTTP usando cURL
    //     $response = $client->get('https://www.espn.com.br/futebol/time/elenco/_/id/3457/liga/BRA.COPA_DO_BRAZIL');

    //     // Obtendo o corpo da resposta HTTP
    //     $html = (string) $response->getBody();

    //     // Criando uma instância do Crawler para analisar o HTML
    //     $crawler = new Crawler($html);

    //     // Inicializando um array para armazenar os dados da tabela
    //     $rows = [];

    //     // Iterando sobre as linhas da tabela e extraindo os dados das células
    //     $crawler->filter('table tr')->each(function ($row, $i) use (&$rows) {
    //         // Inicializar um array para armazenar os dados das cinco primeiras colunas
    //         $rowData = [];
    //         // Selecionar as cinco primeiras células (colunas) em cada linha
    //         $row->filter('td')->slice(0, 5)->each(function ($cell) use (&$rowData) {
    //             $rowData[] = $cell->text();
    //         });
    //         $rows[] = $rowData;
    //     });

    //     // Retornando a view 'elenco' com os dados da tabela compactados
    //     return view('elenco', compact('rows'));
    // }

    public function quemsomos()
    {
        $dadosAnte = Ante5j::orderBy('id', 'desc')->limit(5)->get()->reverse();

        // Divide o array em conjuntos de três
        $chunks = $dadosAnte->chunk(3);

        // Retorna os valores para a view
        return view('quemsomos', compact('chunks'));
    }

    public function atualizar()
    {
        // Caminho para o arquivo Excel
        $filePath = public_path('/CHANCES.xlsx');
    
        // Carrega o arquivo Excel
        $spreadsheet = IOFactory::load($filePath);
    
        // Obtém a primeira planilha do arquivo
        $sheet = $spreadsheet->getSheet(3);
    
        // Obtém o número da última linha
        $lastRow = 7;
    
        // Percorre as linhas do arquivo Excel
        for ($row = 3; $row <= $lastRow; $row++) {
            // Obtém os valores das células
            $cellAValue = $sheet->getCell('N' . $row)->getValue();
            $cellBValue = $sheet->getCell('O' . $row)->getValue();
            $cellCValue = $sheet->getCell('P' . $row)->getValue();
            $cellDValue = $sheet->getCell('Q' . $row)->getValue();
            $cellEValue = $sheet->getCell('R' . $row)->getValue();
            $cellFValue = $sheet->getCell('S' . $row)->getValue();
            $cellGValue = $sheet->getCell('T' . $row)->getValue();

                // Substitua 'nome_da_tabela' pelo nome real da sua tabela
                DB::table('ante5j')->insert([
                    'timecasa' => $cellAValue,
                    'timefora' => $cellBValue,
                    'golscasa' => $cellCValue,
                    'golsfora' => $cellDValue,
                    'vitoria' => $cellEValue,
                    'empate' => $cellFValue,
                    'derrota' => $cellGValue,
                    'created_at' => Carbon::now(),
                ]);
        }

        // Obtém a primeira planilha do arquivo
        $sheet2 = $spreadsheet->getSheet(3);
    
        // Obtém o número da última linha
        $lastRow = 7;
    
        // Percorre as linhas do arquivo Excel
        for ($row = 3; $row <= $lastRow; $row++) {
            // Obtém os valores das células
            $cellA2Value = $sheet2->getCell('F' . $row)->getValue();
            $cellB2Value = $sheet2->getCell('G' . $row)->getValue();
            $cellC2Value = $sheet2->getCell('H' . $row)->getValue();
            $cellD2Value = $sheet2->getCell('I' . $row)->getValue();
            $cellE2Value = $sheet2->getCell('J' . $row)->getValue();
    
                // Substitua 'nome_da_tabela' pelo nome real da sua tabela
                DB::table('prox5j')->insert([
                    'timecasa' => $cellA2Value,
                    'timefora' => $cellB2Value,
                    'vitoria' => $cellC2Value,
                    'empate' => $cellD2Value,
                    'derrota' => $cellE2Value,
                ]);
        }

        // Obtém a primeira planilha do arquivo
        $sheet3 = $spreadsheet->getSheet(3);
    
        // Obtém os valores das células
        $cellA3Value = $sheet3->getCell('X3')->getValue();
        $cellB3Value = $sheet3->getCell('X4')->getValue();
        $cellC3Value = $sheet3->getCell('X5')->getValue();
        $cellD3Value = $sheet3->getCell('X9')->getValue();
        $cellE3Value = $sheet3->getCell('X7')->getValue();
        $cellF3Value = $sheet3->getCell('X8')->getValue();

        // Substitua 'nome_da_tabela' pelo nome real da sua tabela
        DB::table('chancesvit')->insert([
            'campeao' => $cellA3Value,
            'libertadores' => $cellB3Value,
            'sulamericana' => $cellC3Value,
            'rebaixamento' => $cellE3Value,
            'previsao' => $cellF3Value,
            'posicao' => $cellD3Value,
        ]);

        return redirect()->back()->with('mensagem', 'Site atualizado com sucesso.');
        
    }

    public function showUploadForm()
    {
        return view('upload');
    }
    
    public function upload(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls' // Validação para garantir que apenas arquivos Excel sejam aceitos
        ]);

        $file = $request->file('excel_file');

        // Salvar o arquivo na pasta public com o nome CHANCES.xlsx
        $file->move(public_path(), 'CHANCES.xlsx');

        return redirect()->back()->with('mensagem', 'Arquivo Excel enviado e processado com sucesso.');
    }
}
