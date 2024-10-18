<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserController extends Controller
{
    use HasFactory;

    public function index()
    {
        $role = request()->query("role");

        if (!in_array($role, ['admin', 'assigned'])) {
            return response()->json([
                'error' => 'Invalid role. Please use "admin" or "assigned".'
            ], 400);
        }
        $user = $user = User::select(columns: ["id", "username"])->where("role", $role)->get();

        return response()->json($user);
    }

    public function topAssignedUsers()
    {
        $users = User::withCount('assignedTasks')
            ->having('assigned_tasks_count', '>', 0)
            ->orderBy('assigned_tasks_count', 'desc')
            ->limit(10)
            ->get();

        $data = $users->map(function ($user) {
            return [
                'username' => $user->username,
                'number_of_tasks' => $user->assigned_tasks_count,
            ];
        });

        return response()->json($data, 200);
    }
}
