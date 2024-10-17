<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;
    protected $guarded = [];
    public function admin()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }
}
