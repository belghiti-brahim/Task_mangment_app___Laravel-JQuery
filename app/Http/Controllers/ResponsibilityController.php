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
       $authid= Auth::user()->id;
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
            'color' => 'required',
        ]);

        Responsibility::create([
             'name' => $request->name,
             'description' => $request->description,
             'color' => $request->color,
             'user_id' => $userid
        ]);
        $responsibilities = Responsibility::all();

        // return view('apppages.responsibilities.index', compact("responsibilities"));
       return redirect()->route('resindex')->with('message', 'Responsability Created successfully');

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
        $projects = Project::with("responsibility")->where("responsibility_id","=","$id")->get();
        return view("apppages.responsibilities.showresponsibility", compact("responsibility","projects"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            $responsibilities = Responsibility::all();

            $this->validate($request, [

                'name' => 'required',
                'description' => 'required|string',
                'family' => 'required',
                'continent' => 'required',
            ]);

            $responsibility = Responsibility::find($id);


            // $animal->name = $request->name;
            // $animal->description = $request->description;
            // $animal->image = $image;
            // $animal->family_id = $request->family;
            // $animal->Continents()->sync($request['continent']);
            // $animal->save();

            // return redirect()->intended()->with([
            //     'success' => 'Animal have been edited successfully'
            // ]);
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
        //
    }
}
