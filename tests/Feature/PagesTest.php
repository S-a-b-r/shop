<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    //Home page
    public function testHomePage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    //Products
    public function testProductIndexPage()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
    }
    public function testProductCreatePage()
    {
        $response = $this->get('/products/create');
        $response->assertStatus(200);
    }
    public function testProductEditPage()
    {
        $response = $this->get('/products/1/edit');
        $response->assertStatus(200);
    }
    public function testProductShowPage()
    {
        $response = $this->get('/products/1');
        $response->assertStatus(200);
    }

    //Breweries
    public function testBreweryIndexPage()
    {
        $response = $this->get('/breweries');
        $response->assertStatus(200);
    }
    public function testBreweryCreatePage()
    {
        $response = $this->get('/breweries/create');
        $response->assertStatus(200);
    }
    public function testBreweryEditPage()
    {
        $response = $this->get('/breweries/1/edit');
        $response->assertStatus(200);
    }
    public function testBreweryShowPage()
    {
        $response = $this->get('/breweries/1');
        $response->assertStatus(200);
    }

    //Categories
    public function testCategoryIndexPage()
    {
        $response = $this->get('/categories');
        $response->assertStatus(200);
    }
    public function testCategoryCreatePage()
    {
        $response = $this->get('/categories/create');
        $response->assertStatus(200);
    }
    public function testCategoryEditPage()
    {
        $response = $this->get('/categories/1/edit');
        $response->assertStatus(200);
    }
    public function testCategoryShowPage()
    {
        $response = $this->get('/categories/1');
        $response->assertStatus(200);
    }

    //Tags
    public function testTagIndexPage()
    {
        $response = $this->get('/tags');
        $response->assertStatus(200);
    }
    public function testTagCreatePage()
    {
        $response = $this->get('/tags/create');
        $response->assertStatus(200);
    }
    public function testTagEditPage()
    {
        $response = $this->get('/tags/1/edit');
        $response->assertStatus(200);
    }
    public function testTagShowPage()
    {
        $response = $this->get('/tags/1');
        $response->assertStatus(200);
    }
}
