<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_category()
    {
        $data = [
            'name' => 'Category 1',
        ];

        $response = $this->postJson('/api/categories', $data);

        $response->assertStatus(201);
        $response->assertJson($data);
        $this->assertDatabaseHas('categories', $data);
    }

    public function test_can_show_a_category()
    {
        $category = factory(Category::class)->create();

        $response = $this->getJson("/api/categories/{$category->id}");

        $response->assertStatus(200);
        $response->assertJson($category->toArray());
    }

    public function test_can_update_a_category()
    {
        $category = factory(Category::class)->create();
        $data = [
            'name' => 'Category 2',
        ];

        $response = $this->putJson("/api/categories/{$category->id}", $data);

        $response->assertStatus(200);
        $response->assertJson($data);
        $this->assertDatabaseHas('categories', $data);
    }

    public function test_can_delete_a_category()
    {
        $category = factory(Category::class)->create();

        $response = $this->deleteJson("/api/categories/{$category->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
