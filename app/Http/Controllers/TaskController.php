<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Task::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        
        $task->task_title = $request->task["task_title"];
        $task->task_content = $request->task["task_content"];
        if( isset( $request->task["isFinished"]) ) 
        {
            $task->isFinished = $request->task["isFinished"];
        }
        else
        {
            $task->isFinished = 0;
        }
        
        $task->save();
        return $task;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit')->with('task',$task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find( $id );

        $result = "A feladat nem található! Nem lehetséges frissíteni!";

        if ($task)
        {
            if ( $request->task["isFinished"] == "0")
            {
                $task->isFinished = 0;    
            }
            else
            {
                $task->isFinished = 1;
            }   
            $task->save();
            $result = $task;
        } 
        return  $result;       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = "$id. azonosítójú elem nem található!";
        $task = Task::find( $id );
        if ( $task )
        {
            $task->delete();
            $result = "$id. azonosítójú elem törlése megtörtént!";
        }
        return $result;
    }
}
