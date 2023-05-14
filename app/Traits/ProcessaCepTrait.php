<?php

namespace App\Traits;
use Error;

trait ProcessaCepTrait {
    public function formataCep($cep) 
    {
        if (str_contains($cep, '-')) {
            $cep = str_replace(search:"-",replace:"", subject:$cep); 
        }

        if (str_contains($cep, '.')) {
            $cep = str_replace(search: ".", replace: "", subject: $cep);
        }
       
        return $cep;
    }

    public function validaCep($cep) 
    {
        $cep = $this->formataCep($cep);
        if(strlen($cep) === 8 ) {
            return $cep;
        }

    }
}