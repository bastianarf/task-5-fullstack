<?php

namespace Tests\Unit;

use App\Models\Article;
use App\Models\User;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    public function test_open_index_article_page_without_auth()
    {
        $response = $this->get('/article');

        $response->assertRedirect('/login');
    }

    public function test_open_create_article_page_without_auth()
    {
        $response = $this->get('/article/create');

        $response->assertRedirect('/login');
    }

    public function test_open_create_article_page_with_auth()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->get('/article/create');

        $response->assertStatus(200);
    }

    public function test_article_store()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->post('/article', [
            'title' => 'Article Tes',
            'content' => 'Article Tes',
            'user_id' => 1,
            'category_id' => 1,
            'image' => 'image.jpg',
        ]);

        $response->assertRedirect('/article/index');
    }

    public function test_article_update()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->patch('/article/1', [
            'title' => 'New Article Tes',
            'content' => 'New Article Tes',
            'user_id' => 1,
            'category_id' => 1,
            'image' => 'new_image.jpg',
        ]);

        $response->assertRedirect('/article/index');
    }

    public function test_article_delete()
    {
        $this->withoutExceptionHandling();
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $response = $this->delete('/article/1');

        $response->assertRedirect('/article/index');
    }
}
