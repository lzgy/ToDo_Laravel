<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'tasks';
    //primary key
    protected $primaryKey = 'id';
    protected $task_title = "task_title";
    protected $task_content = "task_content";
    protected $isFinished = "isFinished";
    
    public $timestamps = true;

}

//Task:all();
