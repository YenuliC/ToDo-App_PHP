<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;  // Import HasFactory
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;  // Use the HasFactory trait

    // Make 'task' and 'is_completed' fields mass assignable
    protected $fillable = ['task', 'is_completed'];
}

