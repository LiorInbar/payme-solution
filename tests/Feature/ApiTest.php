<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Mockery\MockInterface;


class ApiTest extends TestCase
{
    //use RefreshDatabase;



    public function test_the_application_returns_a_successful_response(): void
    {

        

        $responseCreateSalePage = $this->get('/newSale');

        $responseCreateSalePage->assertStatus(200);

        $responseList = $this->get('/list');

        $responseList->assertStatus(200);


        Http::fake([
            'https://sandbox.payme.io/api/generate-sale' => Http::sequence()
            ->push(['status_code' => 0, 'payme_sale_code' => rand(10000,10000000),
            'sale_url' => 'https://sandbox.payme.io/sale/generate/SALE1693-845835ZZ-SJ8ZQBXN-P1649ANN'],
             200)
            ->pushStatus(500)
        ]);

        $responseSubmitSale = $this->post('/store',['price' => 22222, 'currency' => 'ILS', 'name' => 'FIFA 2222']);

        $responseSubmitSale->assertStatus(200);

        $responseSubmitSaleFalse = $this->post('/store',['price' => 11111, 'currency' => 'ILS', 'name' => 'FIFA 2222']);

        $responseSubmitSaleFalse->assertStatus(500); 

    }
}