<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Action;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Responsibility;
use Illuminate\Support\Facades\DB;
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
        $authid = Auth::user()->id;
        $projectss = Project::select('projects.*')
            ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
            ->join('users', 'users.id', '=', 'responsibilities.user_id')
            ->where('user_id', $authid);

        $projects = $projectss->with("actions")->paginate(9);
        return view('apppages.projects.indexproject', compact("projects"));
    }

    public function searchactive(request $request)
    {
        $authid = Auth::user()->id;
        $projectname = $request->input('findproject');
        $projects = Project::select('projects.*')
            ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
            ->join('users', 'users.id', '=', 'responsibilities.user_id')
            ->where('user_id', $authid)
            ->get();
            foreach ($projects as $project){
                $foundprojects = $project->where('archive', '=', "1")->where('name', 'like', "%$projectname%")->get();
            }
   
            // dd($foundprojects);
        // $foundprojects = $projects->where('archive', '=', "1")->where('name', '=', $projectname);
        return view('apppages.projects.oneproject', compact("foundprojects", "projects","authid"));
    }

    public function searcharchive(request $request)
    {
        $authid = Auth::user()->id;
        $projectname = $request->input('findproject');
        $projects = Project::select('projects.*')
            ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
            ->join('users', 'users.id', '=', 'responsibilities.user_id')
            ->where('user_id', $authid)
            ->get();
            // dd($projects);
            foreach ($projects as $project){
                            
               $foundprojects = $project->where('archive', '=', "0")->where('name', 'like', "%$projectname%")->get();
            }
            
            
        // $foundprojects = $projects->where('archive', '=', "0")->where('name', '=', $projectname);
        // $foundprojects = $projects->where('archive', '=', "0")->where('name', 'like', "%$projectname%");
        // $foundprojects =Project::where('archive', '=', "0")->where('name', 'like',"%$projectname%")->get();
        
        return view('apppages.projects.foundarchiveprojects', compact("foundprojects", "projects", "authid"));
    }


    public function archive($id)
    {

        $project = Project::find($id);
        if ($project->archive === 1) {
            $project->archive = 0;
            $project->save();
        } else {
            $project->archive = 1;
            $project->save();
        }

        return response()->json(['success' => "le projet a été archivé avec sucèss"]);
    }

    public function archived()
    {
        $authid = Auth::user()->id;
        $projects = Project::select('projects.*')
            ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
            ->join('users', 'users.id', '=', 'responsibilities.user_id')
            ->where('user_id', $authid)
            ->paginate(12);

        return view('apppages.projects.archiveproject', compact("projects"));
    }

    public function createwithinresponsibility($id)
    {
        $responsibilities = Responsibility::where('id','=', $id)->get();
        // dd($responsibility);
        // dd($id);
        return view('apppages.projects.createproject', compact("responsibilities"));
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
        // $responsibilities = Responsibility::all();

        return view("apppages.projects.createproject", compact("responsibilities"));
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

        // dd($request->responsibility);
        $authid = Auth::user()->id;
        $responsibilities = Responsibility::with("users")->where('user_id', '=', "$authid")->get();
        $responsibilityid = $request->responsibility;
        //  dd($responsibilities);

        return redirect()->route('showresponsibility', $responsibilityid)->with('message', 'Ton projet a été crée avec succès');
        // return view('apppages.responsibilities.index', compact("responsibilities"));
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
        // $actions = Action::with("project")->where("project_id", "=", "$id")->get();
        $actions = Action::with("contexts")->with("project")->where("project_id", "=", "$id")->get();
        // $action = $actions->pivot;
        // dd($actions); 

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

        $authid = Auth::user()->id;
        $responsibilities = Responsibility::with("users")->where('user_id', '=', "$authid")->get();
        $oldresponsibility = Responsibility::where("id", "=", "$project_id")->get();
        // dd($oldresponsibility);
        //    $parent = $project->with("parent")->get();
        //    dd($parent);
        $projects = Project::where("project_id", "=", null)->get();
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
        // return redirect()->route('resindex')->with('message', 'Ton projet a été modifié avec succès');

        $authid = Auth::user()->id;
        $responsibilities = Responsibility::with("users")->where('user_id', '=', "$authid")->get();
        $responsibilityid = $request->responsibility;
        //  dd($responsibilities);

        return redirect()->route('showresponsibility', $responsibilityid)->with('message', 'Ton projet a été modifié avec succès');
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
        return response()->json(['success' => "le projet a été supprimé avec sucèss"]);
    }
}
