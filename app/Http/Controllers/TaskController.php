<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
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
        
        $result = $request->input('isFinished');
        $hol = '1';
        //return print_r($result);
        if (isset($result))$hol = '1';
        else $hol = '0';
        //$select = "SELECT * FROM tasks where ";
        //if($result == "Kész") $hol = "1";
        //$selet = $select . $hol;
        //return $hol;
        $tasks = Task::where('isFinished', '=',$hol)->get();
        
        //return print_r($tasks);
        //$tasks = DB::select("SELECT * FROM tasks where isFinished = 0");
        //$tasks = DB::table('tasks')->where('isFinished', '=','1')->get();

       // $tasks = Task::orderby('created_at','asc')->paginate(10);
        return view('tasks.index')->with('tasks', $tasks);
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
        $this->validate($request,[
            'task_title' => 'required',
            'task_content' => 'required'
        ]);

        $task = new Task;
        $task->task_title = $request->input('task_title');
        $task->task_content = $request->input('task_content');
        $task->isFinished = 0;
        //$task->created_at = date("Y-m-d H:i:s");
        //$task->updated_at = date("Y-m-d H:i:s");
        $task->save();

        return \redirect('/tasks')->with('succes', 'Feladat elkészítve');
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
        $this->validate($request,[
            'task_title' => 'required',
            'task_content' => 'required'
        ]);

        $task = Task::find($id);
        $task->task_title = $request->input('task_title');
        $task->task_content = $request->input('task_content');
        //error_log("is Finished: [" . $request->input('isFinished') . "]");
        
        $val = $request->input('isFinished');

        if (isset($val)) $task->isFinished = 1;
        else $task->isFinished = 0;
        
        $task->save();

        return \redirect('/tasks')->with('succes', 'Feladat Módosítva');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/tasks')->with('succes','Feladat törölve!');
    }
}
