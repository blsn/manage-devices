<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    public function index() {
        if (request()->start_date && request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateString();
            $end_date = Carbon::parse(request()->end_date)->toDateString();
            $tasks = Task::whereBetween('due_date', [$start_date, $end_date])->sortable(['updated_at' => 'desc'])->paginate(8);
        } else {
            $tasks = Task::sortable(['updated_at' => 'desc'])->paginate(8);
        }
        $total = Task::count();
        $completed = Task::where('status', 1)->count();
        $remaining = Task::where('status', 0)->count();
        $title = 'Tasks';
        return view('tasks.index', compact('tasks'))->with('total', $total)->with('completed', $completed)->with('remaining', $remaining)->with('title', $title);
    }    

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:50',
            'due_date' => 'required|date|date_format:Y-m-d'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return redirect()->back()->with('danger', $error);
        }

        Task::create([
            'name' => $request->input('name'),
            'due_date' => $request->input('due_date')
        ]);
        return redirect()->route('tasks.index')->with('info', 'The task successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id) {
        $task = Task::find($id);
        return view('tasks.edit')->with('task', $task);
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:2|max:50',
            'due_date' => 'required|date|date_format:Y-m-d'
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return redirect()->back()->with('danger', $error);
        }
        
        $task = Task::find($id);
        $task->name = $request->input('name');
        $task->due_date = $request->input('due_date');
        $task->status = is_null($request->input('status')) ? 0 : 1;
        $task->save();
        return redirect()->route('tasks.index')->with('info', 'The task successfully updated');
    }

    public function destroy($id) {
        $task = Task::find($id);
        $validator = Validator::make($task->getAttributes(), [
            'due_date' => 'before_or_equal:'.date('Y-m-d', strtotime('+6 days'))
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();
            return redirect()->back()->with('danger', $error);
        }

        $task->delete();
        return redirect()->route('tasks.index')->with('info', 'Successful removal of task #' . $task->id);
    }
}
