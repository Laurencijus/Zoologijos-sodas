<?php

namespace App\Http\Controllers;

use App\Manager;
use App\Specie;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Manager::all()->sortBy('name');
        $begemotai = Manager::where('specie_id', 3)->get(); //count();
        return view('manager.index', ['collection' => $collection, 'begemotai' => $begemotai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collection = Specie::all();

        return view('manager.create', ['collection' => $collection]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_manager = new Manager;
        $new_manager->name = $request->name;
        $new_manager->surname = $request->surname;
        $new_manager->specie_id = $request->specie_id;
        $new_manager->save();
        return redirect()->route('manager.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit(Manager $manager)
    {
        $collection = Specie::all();
        return view('manager.edit', ['manager' => $manager]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manager $manager)
    {
        $manager->name = $request->name;
        $manager->surname = $request->surname;
        $manager->specie_id = $request->specie_id;
        $manager->save();

        return redirect()->route('manager.index')->with('success_message', 'Viskas gerai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manager $manager)
    {
        //
    }
}
