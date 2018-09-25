<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{

    // send get request for product page
    public function test_if_products_page_exist()
    {
        $response = $this->get('/product');
        $response->assertStatus(200);
    }

    // send post request for creating product

}
