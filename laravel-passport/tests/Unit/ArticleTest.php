<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class ArticleTest extends TestCase
{
    public function test_create()
    {
        $data = [
            'title' => 'Article Tes',
            'content' => 'Article Tes',
            'user_id' => 1,
            'category_id' => 1,
            'image' => 'image.jpg',
        ];

        $this->json('POST', 'api/v1/article', $data, ['Accept' => 'application/json'])->assertStatus(401);
    }

    public function test_show()
    {
        $this->json('GET', 'api/v1/article/1', [], ['Accept' => 'application/json'])->assertStatus(401);
    }

    public function test_update()
    {
        $data = [
            'title' => 'Update Article Tes',
            'content' => 'Update Article Tes',
            'category_id' => 1,
            'image' => 'update_image.jpg',
        ];

        $this->json('PATCH', 'api/v1/article/1', $data, ['Accept' => 'application/json'])->assertStatus(401);
    }

    public function test_delete()
    {
        $this->json('DELETE', 'api/v1/article/1', [], ['Accept' => 'application/json'])->assertStatus(401);
    }
}
