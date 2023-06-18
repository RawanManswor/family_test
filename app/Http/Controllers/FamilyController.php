<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Place;
use App\Models\User;
use Illuminate\Http\Request;


class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::orderBy('id', 'DESC')->paginate(50);
        return view('families.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $places = Place::all();
        return view('families.create', compact('places'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {/*
        $validator = $request->validate([
            'place_id' => 'required',
            'name_father' => 'required|regex:/^[a-zA-Z]+$/',
            'phone' => 'required|numeric|digits:10',
            'national_no' => 'required',
        ]);
        $places = Place::findOrFail($validator['place_id']);
        $family = new Family([
            'name_father' => $validator['name_father'],
            'phone' => $validator['phone'],
            'national_no' => $validator['national_no']
        ]);*/
        // $places->families()->create($request->validate([
        //     'name_father' => 'required|regex:/^[a-zA-Z]+$/',
        //     'phone' => 'required|numeric|digits:10',
        //     'national_no' => 'required',
        // ]));

        /*  $places->families()->save($family);*/
        /*
        $places = Place::findOrFail($request->place_id);
        $places->families()->create([
            'name_father' => $request->name_father,
            'phone' => $request->phone,
            'national_no' => $request->national_no,

        ]);
        return redirect('families')->with('message', 'Family created successfully.');*/


        $validator = $request->validate([
            'place_id' => 'nullable',
            'new_place' => 'nullable',

        ]);

        if (!empty($validator['new_place'])) {
            $place = new Place(['name' => $validator['new_place']]);
            $place->save();
            $validator['place_id'] = $place->id;
            $places = Place::findOrFail($validator['place_id']);
            $places->families()->create([
                'name_father' => $request->name_father,
                'phone' => $request->phone,
                'national_no' => $request->national_no,

            ]);
        } else {
            $places = Place::findOrFail($validator['place_id']);
            $places->families()->create([
                'name_father' => $request->name_father,
                'phone' => $request->phone,
                'national_no' => $request->national_no,

            ]);
        }

        return redirect('families')->with('message', 'Family created successfully.');
    }

    public function search()
    {
        $places = Place::all();
        return view('families.search', compact('places'));
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
        $places = Place::all();
        $families = Family::findOrFail($id);
        return view('families.edit', compact('families', 'places'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $family = Family::find($id);
        if ($request->has('place_id') && !empty($request->input('place_id'))) {
            $family->place_id = $request['place_id'];
            $family->name_father = $request['name_father'];
            $family->phone = $request['phone'];
            $family->national_no = $request['national_no'];
            $family->save();
        } else {
            $place = new Place(['name' => $request['new_place']]);
            $place->save();
            $family->place_id = $place->id;
            $family->name_father = $request['name_father'];
            $family->phone = $request['phone'];
            $family->national_no = $request['national_no'];
            $family->save();
        }


        return redirect('families')->with('message', 'Family Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $family = Family::find($id);
        if ($family != null) {
            $family->delete();
        }

        return redirect('families')->with('message', 'Family Deleted successfully.');
    }
    public function trashed()
    {

        $families = Family::onlyTrashed()->get();
        return view('families.trashed');
    }
}
