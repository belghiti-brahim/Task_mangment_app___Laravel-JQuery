<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Project;
use App\Models\Responsibility;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('apppages.projects.indexproject', compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $responsibilities = Responsibility::all();
        $projects = Project::all();
        return view("apppages.projects.createproject", compact("responsibilities", "projects"));
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

            'name' => 'required',
            'description' => 'required',
            'responsibility' => 'required',
        ]);
        //   dd($request);

        if ($request->project === "undefined") {
            $projectId = null;
        } else {
            $projectId = $request->project;
        }
        Project::create([
            'name' => $request->name,
            'definition' => $request->description,
            'responsibility_id' => $request->responsibility,
            'project_id' => $projectId
        ]);
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
        $project = Project::find($id);
        $actions = Action::with("project")->where("project_id", "=", "$id")->get();

        return view("apppages.projects.showproject", compact("project", "actions"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $project = Project::find($id);
        $project_id = $project->responsibility_id;

        $responsibilities = Responsibility::all();
        $oldresponsibility = Responsibility::where("id", "=", "$project_id")->get();
        // dd($oldresponsibility);
       
        $projects = Project::all();
        return view("apppages.projects.editproject", compact("responsibilities", "project", "projects", "oldresponsibility"));
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

            'name' => 'required',
            'description' => 'required',
            'responsibility' => 'required',
        ]);
        //   dd($request);

        if ($request->project === "undefined") {
            $projectId = null;
        } else {
            $projectId = $request->project;
        }
        $project = Project::find($id);

        $project->name = $request->name;
        $project->definition = $request->description;
        $project->responsibility_id = $request->responsibility;
        $project->project_id = $projectId;
        $project->save();
        return redirect()->route('resindex')->with([
            'success' => 'le projet a été editée'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if ($project) {
            $project->delete();
        }
        return response()->json(['success' => "le projet a été suprimé avec success"]);
    }
}
