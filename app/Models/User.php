<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function assignedTasks()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }
}
