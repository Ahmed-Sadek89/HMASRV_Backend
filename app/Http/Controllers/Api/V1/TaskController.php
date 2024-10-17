<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use HasFactory;
    private function getUsersPerTask($tasks)
    {
        $data = [];
        foreach ($tasks->items() as $task) {
            array_push($data, [
                'task_id' => $task->id,
                'task_title' => $task->title,
                'task_description' => $task->description,
                'admin_user' => $task->admin ? $task->admin->username : 'No admin assigned',
                'assigned_user' => $task->assignedUser ? $task->assignedUser->username : 'No assigned user',
            ]);
        }
        return $data;
    }
    public function index()
    {
        $tasks = Task::with(['admin', 'assignedUser'])->paginate(10);

        return response()->json([
            'data' => $this->getUsersPerTask($tasks),
            'current_page' => $tasks->currentPage(),
            'last_page' => $tasks->lastPage(),
            'per_page' => $tasks->perPage(),
            'total' => $tasks->total(),
        ]);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        if ($task) {

            return response()->json( $task, 201); // 201 Created
        } else {
            return response()->json("error", 400);

        }

    }
}
