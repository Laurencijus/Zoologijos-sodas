<?php

namespace App\Http\Controllers;

use App\Specie;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Specie::all();
        return view('specie.index', ['collection' => $collection]);
        // $specie::all name->begemotai->count();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_specie = new Specie;
        $new_specie->name = $request->species_type;
        $new_specie->save();
        return redirect()->route('specie.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function show(Specie $specie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Specie $specie)
    {

        return view('specie.edit', ['specie' => $specie]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specie  $specie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specie $specie)
    {

        $specie->name = $request->species_type;
        $specie->save();
        return redirect()->route('specie.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Specie  $specie
     * @return \Illuminate\Http\Response
     */

    public function destroy(Specie $specie)
    {
        if ($specie->selfManagers->count() == 0) {
            $specie->delete();
            return redirect()->route('specie.index')->with('success_message', 'Species ' . $specie->name . ' was deleted!');
        } else {
            return redirect()->route('specie.index')->with('info_message', 'Cannot delete. Assign these Manager(s) to a different specie first.');
        }
    }
}
