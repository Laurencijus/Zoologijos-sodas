<?php

namespace App\Http\Controllers;

use App\Animal;
use App\Manager;
use App\Specie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Validator;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Animal::all();

        return view('animal.index', ['collection' => $collection]);
    }

    public function managersList(Request $request)
    {
        $id = $request->id;
        $managers = Manager::where('specie_id', $id)->get();

        return Response::json([
            'message' => 'Siunciam jumi kolekcija',
            'managers' => $managers,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $collection_s = Specie::all();
        $collection_m = Manager::all();

        return view('animal.create', ['collection_s' => $collection_s,
            'collection_m' => $collection_m]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'birth_year' => ['required', 'integer', 'min:1901', 'max:2055'],
                'animal_book' => [],
            ],
            [
                'birth_year.required' => 'Gimimo metai privalomi',
                'birth_year.integer' => 'Gimimo metai skaiciais',
                'animal_book.required' => 'Reikia',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->route('animal.create')->withErrors($validator);
        }
        $new_animal = new Animal;
        $new_animal->birth_year = $request->birth_year;
        $new_animal->animal_book = $request->animal_book;
        $new_animal->specie_id = $request->specie_id;
        $new_animal->manager_id = $request->manager_id;
        $new_animal->save();
        return redirect()->route('animal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function edit(Animal $animal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animal)
    {
        $validator = Validator::make($request->all(),
            [
                'birth_year' => ['required', 'integer', 'min:1901', 'max:2055'],
            ],
            [
                'birth_year.required' => 'Gimimo metai privalomi',
                'birth_year.integer' => 'Gimimo metai skaiciais',
            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->route('animal.create')->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Animal $animal)
    {
        //
    }
}
