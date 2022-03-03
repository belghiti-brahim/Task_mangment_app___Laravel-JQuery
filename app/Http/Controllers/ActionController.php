<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Responsibility;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today()->toFormattedDateString();
        $weeknumber = Carbon::today()->week();
        $actions = Action::all();
        return view('apppages.actions.indexactions', compact("actions", "today"));
    }
    public function today()
    {
        $today = Carbon::today()->toDateString();
        $allactions = Action::all();
        $authid = Auth::user()->id;
        $responsibilities = Responsibility::with("users")->where('user_id', '=', "$authid")->paginate(6);
        // foreach ($responsibilities as $responsibility) {
        //     $projects =  $responsibility->projects;
        //     // foreach($projects as $project){
        //     //     $actions = $project->actions->where('deadline', '=', $today);
        //     //     // dd($actions);
        //     // }
        // };
        $actions = Action::select('actions.*')
        ->join('projects', 'projects.id', '=', 'actions.project_id')
        ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
        ->join('users', 'users.id', '=', 'responsibilities.user_id')
        ->where('user_id', $authid)
        ->get();

        // $actions = $allactions->where('deadline', '=', $today);
        return view('apppages.actions.todayaction', compact("today", "actions"));
    }
    public function week()
    {
        $today = Carbon::today();
        $weeknumber = Carbon::today()->week();
        // $actions = Action::select("*")
        //     ->whereBetween(
        //         'deadline',
        //         [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        //     )->get();
        $authid = Auth::user()->id;
        $actions = Action::select('actions.*')
            ->join('projects', 'projects.id', '=', 'actions.project_id')
            ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
            ->join('users', 'users.id', '=', 'responsibilities.user_id')
            ->where('user_id', $authid)
            ->get();
        //     dd($actions);
        // $actions = Action::all();
        $monday = $today->startOfWeek()->toDateString();
        $tueasday = $today->addDay(1)->toDateString();
        $wednesday = $today->addDay(1)->toDateString();
        $thursday = $today->addDay(1)->toDateString();
        $friday = $today->addDay(1)->toDateString();
        $saturday = $today->addDay(1)->toDateString();
        $sunday = $today->endOfWeek()->toDateString();
        // dd($monday);
        $mondayactions = $actions->where('deadline', '=', $monday);
        $tueasdayactions = $actions->where('deadline', '=', $tueasday);
        $wednesdayactions = $actions->where('deadline', '=', $wednesday);
        $thursdayactions = $actions->where('deadline', '=', $thursday);
        $fridayactions = $actions->where('deadline', '=', $friday);
        $saturdayactions = $actions->where('deadline', '=', $saturday);
        $sundayactions = $actions->where('deadline', '=', $sunday);
        // dd($mondayactions);
        return view('apppages.actions.weekactions', compact("actions", "mondayactions", "tueasdayactions", "wednesdayactions", "thursdayactions", "fridayactions", "saturdayactions", "sundayactions"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $authid = Auth::user()->id;
        // $responsibilities = Responsibility::with("users")->where('user_id', '=', "$authid")->get();
        $authid = Auth::user()->id;
        $responsibilities = Responsibility::with("users")->where('user_id', '=', "$authid")->get();
        // foreach ($responsibilities as $responsibility) {
        //     $projects =  $responsibility->projects;

        // };
        $projects = Project::select('projects.*')
            ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
            ->join('users', 'users.id', '=', 'responsibilities.user_id')
            ->where('user_id', $authid)
            ->get();

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
        // $deadline = carbon::parse($request->deadline)->format('Y-m-d');
        $newaction = Action::create([
            'description' => $request->description,
            'definition_of_done' => $request->defintionOfDone,
            'project_id' => $request->project,
            'deadline' => $request->deadline,
        ]);

        $newaction->contexts()->attach($status);
        $projectid = $request->project;
        return redirect()->route('showproject',  $projectid)->with('message', 'ton action a été créée avec succès');
    }

    public function changeActionStatusToDoing($id)
    {
        $action = Action::find($id);
        // $actionwithcontext = $action->contexts()->get();
        // foreach ($actionwithcontext as $context){
        //    $context->pivot->context_id = 2;
        // }
        $status = 2;
        $action->contexts()->sync($status);


        // $actioncontext = $actionwithcontext->pivot()->context_id;
        return response()->json(['success' => "done"]);
    }

    public function changeActionStatusToDone($id)
    {
        $action = Action::find($id);
        $status = 3;
        $action->contexts()->sync($status);

        return response()->json(['success' => "done"]);
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
        $responsibilities = Responsibility::with("users")->where('user_id', '=', "$authid")->paginate(3);
        $projects = Project::select('projects.*')
            ->join('responsibilities', 'responsibilities.id', '=', 'projects.responsibility_id')
            ->join('users', 'users.id', '=', 'responsibilities.user_id')
            ->where('user_id', $authid)
            ->get();
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

        $editaction = Action::find($id);

        $editaction->description = $request->description;
        $editaction->definition_of_done = $request->defintionOfDone;
        $editaction->project_id = $request->project;
        $editaction->deadline = $request->deadline;
        $editaction->save();
        // dd($editaction);


        $editaction->contexts()->sync($status);
        $responsibilities = Responsibility::all();
        $project = $editaction->project()->get();

        $projectid = $request->project;
        return redirect()->route('showproject',  $projectid)->with('message', 'ton action a été modifiée avec succès');
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
        return response()->json(['success' => "l'action a été supprimée avec succéss"]);
    }
}
