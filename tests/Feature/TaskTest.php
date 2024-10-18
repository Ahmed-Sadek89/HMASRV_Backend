<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{

    public function test_insert_task_successfully(): void
    {


        $response = $this->postJson('/api/v1/task', [
            'title' => 'example title',
            'description' => 'example description',
            'created_by' => 1,
            'assigned_to' => 101
        ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'title' => 'example title',
                'description' => 'example description',
                'created_by' => 1,
                'assigned_to' => 101
            ]);

    }

    public function test_getting_all_tasks()
    {
        $response = $this->getJson('/api/v1/task?page=1');

        $response
            ->assertStatus(200);

    }
}
