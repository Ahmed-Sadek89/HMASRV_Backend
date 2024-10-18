<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertJson;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_user_role(): void
    {
        $role = "admin";
        $response = $this->getJson("/api/v1/user?role=$role");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'role' => $role
        ]);

        $response->assertJsonStructure([
            '*' => ['role', 'username']
        ]);
    }

    public function test_top_assigned_user()
    {
        $response = $this->getJson("/api/v1/user/top-assigned");
        $response->assertStatus(200);


        $response->assertJsonStructure([
            '*' => ['username', 'number_of_tasks']
        ]);
    }
}
