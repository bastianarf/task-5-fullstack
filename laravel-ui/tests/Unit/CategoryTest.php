<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\User;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_open_index_category_page_without_auth()
    {
        $response = $this->get('/category');

        $response->assertRedirect('/login');
    }

    public function test_open_create_category_page_without_auth()
    {
        $response = $this->get('/category/create');

        $response->assertRedirect('/login');
    }

    public function test_open_create_category_page_with_auth()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->get('/category/create');

        $response->assertStatus(200);
    }

    public function test_category_store()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->post('/category', [
            'name' => 'Category Tes',
        ]);

        $response->assertRedirect('/category/index');
    }

    public function test_category_update()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->patch('/category/1', [
            'name' => 'New Category Tes',
        ]);

        $response->assertRedirect('/category/index');
    }

    public function test_category_delete()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->delete('/category/1');

        $response->assertRedirect('/category/index');
    }
}
