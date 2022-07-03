<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class CategoryTest extends TestCase
{
    public function test_create()
    {
        $data = [
            'name' => 'Category Tes',
        ];

        $this->json('POST', 'api/v1/category', $data, ['Accept' => 'application/json'])->assertStatus(401);
    }

    public function test_show()
    {
        $this->json('GET', 'api/v1/category/1', [], ['Accept' => 'application/json'])->assertStatus(401);
    }

    public function test_update()
    {
        $data = [
            'name' => 'Update Category Tes',
        ];

        $this->json('PATCH', 'api/v1/category/1', $data, ['Accept' => 'application/json'])->assertStatus(401);
    }

    public function test_delete()
    {
        $this->json('DELETE', 'api/v1/category/1', [], ['Accept' => 'application/json'])->assertStatus(401);
    }
}
