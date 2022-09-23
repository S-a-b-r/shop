<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class APITest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProducts()
    {
        $response = $this->get('api/products');
        $response->assertStatus(200)
        ->assertJson(fn (AssertableJson $json) =>
        $json->has('data.0', fn ($json) =>
            $json->where('id', 1)
                ->where('title', 'Ничего святого')
                ->where('description', 'Монументы старым богам дают трещины. Им на смену приходят новые. Вкус и аромат — вот наша религия.')
                ->where('abv', 5.5)
                ->where('ibu', 0)
                ->where('price', '300.00')
                ->has('brewery', fn ($json)=>
                    $json->where('id', 1)
                        ->etc()
                )
                ->has('category', fn ($json)=>
                    $json->where('id', 5)
                        ->etc()
                )
                ->where('quantity', 10)
                ->where('is_published', 1)
                ->where('rating', 0)
                ->etc()
        )
        );
    }
}
