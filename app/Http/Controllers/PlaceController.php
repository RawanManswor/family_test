<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Models\User;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places = Place::all();
        return view('places.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('places.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|regex:/^[a-zA-Z]+$/'
        ]);
        $place = Place::create($request->all());
        return redirect('places')->with('message', 'Place created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $place = Place::findOrFail($id);

        $families = $place->families;
        $place->families()->delete();
        $place->delete();

        foreach ($families as $family) {
            if (!is_null($family->places)) {
                $family->places->name = null;
                $family->places()->detach($place->id);
            }
            $family->delete();
        }

        return redirect('places')->with('message', 'Place Deleted with all Families.');
    }
}
