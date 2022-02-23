<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = Action::all();
        return view('apppages.actions.indexactions', compact("actions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authid = Auth::user()->id;
        $responsibilities = Responsibility::with("users")->where('user_id', '=', "$authid")->get();
        $projects = Project::all();
        return view("apppages.actions.createaction", compact("projects"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [

            'description' => 'required',
            'defintionOfDone' => 'required',
            'project' => 'required',
            'deadline' => 'required'
        ]);
        $status = $request->status;

        $newaction = Action::create([
            'description' => $request->description,
            'definition_of_done' => $request->defintionOfDone,
            'project_id' => $request->project,
            'deadline' => $request->deadline,
        ]);
        

        $newaction->contexts()->attach($status);
        $responsibilities = Responsibility::all();
        return view('apppages.responsibilities.index', compact("responsibilities"));
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
     {
        $authid = Auth::user()->id;
        $responsibilities = Responsibility::with("users")->where('user_id', '=', "$authid")->get();
        $projects = Project::all();
        $action = Action::find($id);
        return view("apppages.actions.editaction", compact("projects", 'action'));
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
        $this->validate($request, [

            'description' => 'required',
            'defintionOfDone' => 'required',
            'project' => 'required',
            'deadline' => 'required'
        ]);
        $status = $request->status;

        $action = Action::find($id);

      
            $action->description = $request->description;
            $action->definition_of_done = $request->defintionOfDone;
            $action->project_id = $request->project;
            $action->deadline = $request->deadline;
            $action->save;
       
        

        $action->contexts()->sync($status);
        $responsibilities = Responsibility::all();
        $project = $action->project()->get();

        // $project = Project::find($id);
        // $actions = Action::with("project")->where("project_id", "=", "$id")->get();
        $projectid = $action->project_id;
        // dd($projectid);
        $actions = Action::with("contexts")->with("project")->where("project_id", "=", "$projectid")->get();
        // $action = $actions->pivot;
        // dd($actions); 

        return view("apppages.projects.showproject", compact("project", "actions"));
        // return view('apppages.project.index', compact("responsibilities"));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $action = Action::find($id);
        $action->delete();
        return response()->json(['success' => "la responsibilité a été suprimé avec success"]);
    }
}
