<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded =[];
    public function tasks()
    {
        return $this->belongsToMany(Task::class,"category_task");
    }
}
