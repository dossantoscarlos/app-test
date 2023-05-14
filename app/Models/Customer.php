<?php

namespace App\Models;

use App\Traits\ProcessaCepTrait;
use Error;
use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use SebastianBergmann\Invoker\TimeoutException;

class Customer extends Model
{
    use HasFactory;
    use ProcessaCepTrait;
   
    /**
     * Summary of getCep
     * @param int $cep
     * @return mixed
     */
    public function getCep($cep) 
    {
        try {
            $cep = $this->validaCep($cep);//método da trait ProcessaCepTrait
            if (strlen($cep) > 0) {
                $respJsonCep = Http::acceptJson()
                    ->withUrlParameters(['cep' => $cep])
                    ->get('https://viacep.com.br/ws/{cep}/json');

                if ($respJsonCep->status() === 400) {
                    return $respJsonCep->status();
                }
                return $respJsonCep->json();
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }






}
