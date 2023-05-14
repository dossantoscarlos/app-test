<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use App\Models\Customer;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Prepara o ambiente de teste.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        Http::fake([
            'https://viacep.com.br/*' => Http::response(['cep' => '12357489']),
        ]);
    }

    /**
     * Testa o método getCep da classe Customer.
     *
     * @return void
     */
    public function test_cep_valido()
    {
        $customer = new Customer;
        $cep = 26087030;
        $response = $customer->getCep($cep);
        Http::assertSent(function ($request) use ($cep) {
            return $request->url() === 'https://viacep.com.br/ws/' . $cep . '/json';

        });

        $this->assertEquals(['cep' => '12357489'], $response);
    }

}