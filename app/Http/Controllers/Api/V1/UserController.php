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
        $user = $user = User::where("role", $role)->get();

        return response()->json($user);
    }

    public function topAssignedUsers()
    {
        // Get users with their task count, ordered by the number of assigned tasks, and where assigned_tasks_count > 0
        $users = User::withCount('assignedTasks')
            ->having('assigned_tasks_count', '>', 0) // Only include users with assigned tasks > 0
            ->orderBy('assigned_tasks_count', 'desc') // order by the count of assigned tasks
            ->limit(10) // limit to top 10 users
            ->get();

        // Prepare the response
        $data = $users->map(function ($user) {
            return [
                'username' => $user->username,
                'assigned_tasks_count' => $user->assigned_tasks_count,
            ];
        });

        return response()->json($data, 200); // return as JSON response
    }
}
