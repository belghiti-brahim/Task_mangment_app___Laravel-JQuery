<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;

class ResponsibilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authid = Auth::user()->id;
        $responsibilities = Responsibility::with("users")->where('user_id', '=', "$authid")->get();
        return view('apppages.responsibilities.index', compact("responsibilities"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apppages.responsibilities.createresponsibility');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid = Auth::user()->id;

        $this->validate($request, [

            'name' => 'required',
            'description' => 'required',
        ]);

        // $responsibilitycolor = 'bg' . '-' . $request->color . '-' . '400';
        // dd($responsibilitycolor);
        Responsibility::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => $userid
        ]);
        $responsibilities = Responsibility::all();
        return redirect()->route('resindex')->with('message', 'Ta nouvelle responsabilité a été créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $responsibility = Responsibility::find($id);
        // $projects = Project::with("responsibility")->where("responsibility_id", "=", "$id")->get();
        // $Projects = Project::with("responsibility")->where("responsibility_id", "=", "$id");
        $projects = Project::with("children")->whereNull('project_id')->get();
        // $Projects = Project::with("children")->get();

        // $subprojects = $Projects->with('children')->get();
        // foreach ($Projects as $Project) {
        //     return $subprojects = $Project->with('children')->get();
        // }
        // $subprojects = Project::with("parent")->get();
        // $subprojects = Project::whereNull('project_id')->get();
        // $subprojects = Project::where('project_id','!=', "null")->get();
        // $subprojects = $projects->where('project_id','!=', "null");

        // dd($projects);
        return view("apppages.responsibilities.showresponsibility", compact("responsibility", "projects"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $responsibility = Responsibility::find($id);
        return view("apppages.responsibilities.editresponsibility", compact("responsibility"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { {
            $this->validate($request, [

                'name' => 'required',
                'description' => 'required|string',
            ]);

            $responsibility = Responsibility::find($id);

            $responsibility->name = $request->name;
            $responsibility->description = $request->description;
            $responsibility->save();

            return redirect()->route('resindex')->with([
                'success' => 'la responsibilité a été editée'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $responsibility = Responsibility::find($id);
        $responsibility->delete();
        return response()->json(['success' => "la responsibilité a été suprimé avec success"]);
    }
}
