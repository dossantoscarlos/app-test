<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Spreadsheet;
use Error;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Monolog\Logger;
use SebastianBergmann\Invoker\TimeoutException;

class SpreadsheetController extends Controller
{

    public function index() 
    {
        $results = Spreadsheet::all()->toArray();
        return view('pages.xls.index', compact('results')); 
    }

    public function create()
    {
        return view('pages.xls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            
            $datas = [];
            
            $customers = [];
            
            if ($request->hasFile('csv')) {
                $file = $request->file('csv');
                if ($file->isValid()) {
                    $csvPath = $file->getRealPath();
                    $handle = fopen($csvPath, 'r');
                    if ($handle !== false) {
                        $header = fgetcsv($handle);
                        while (($row = fgetcsv($handle)) !== false) {
                            array_push($datas, array_combine($header, $row));
                        }
                        fclose($handle);
                        $cepValido=1 ;                           
                    
                        $planilha = new Spreadsheet;
                        $planilha->url = $request->file('csv')->getClientOriginalName();  
                        $planilha->quantidade_lida = sizeof($datas);
                        $planilha->save();

                        foreach ($datas as $csv) {
                            $customer = new Customer;
                            $customer->id = $csv['codigo'];
                            $customer->fantasia = $csv['fantasia'];
                            $cep = $customer->getCep($csv['cep']);
                            
                            $customer->cep = $csv['cep'];
                            
                            if (is_array($cep) && sizeof($cep) === 10) {
                                $customer->status = 200;
                                $planilha->quantidade_valida = $cepValido;
                                $planilha->update();
                                $customer->logradouro = $cep['logradouro'];
                                $customer->complemento = $cep['complemento'];
                                $customer->bairro = $cep['bairro'];
                                $customer->localidade = $cep['localidade'];
                                $customer->uf = $cep['uf'];
                                $cepValido++;
                                
                            } else {
                                $customer->status = 400;
                            }
                            $customer->save();
                        }
                    } 
                    return redirect()->back()->with('success', 'CSV importado com sucesso');
                }
            }
            return redirect()->back()->with('error','Arquivo CSV inválido.');
         } catch (QueryException $e) {
            return redirect()->back()->with('error' ,'Import do arquivo com error possível duplicação de dados.');
        }
    }

}
