<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;

class PlacesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $places = Place::all();
        return view('places.index', compact('places'));
    }

    public function create()
    {
        return view('places.create');
    }

    public function store(Request $request)
    {
        Place::create(
            request()->validate([
                'place_no' => [],
                'name' => ['required'],
                'name_kana' => ['required'],
                'position' => ['required'],
                'address' => ['required'],
                'unit_price' => ['required'],
                'note' => []
            ])
        );

        return redirect('/places');
    }

    public function show(Place $place)
    {
        return view('places.show', compact('place'));
    }

    public function edit(Place $place)
    {
        return view('places.edit', compact('place'));
    }

    public function update(Request $request, Place $place)
    {
        request()->validate([
            'place_no' => [],
            'name' => ['required'],
            'name_kana' => ['required'],
            'position' => ['required'],
            'address' => ['required'],
            'unit_price' => ['required'],
        ]); 
        $place->update(request(['place_no','name','name_kana','position','address','unit_price','note']));
        return redirect('/places/'.$place->id);
    }

    public function destroy(Place $place)
    {
        $place->delete();
        return redirect('/places');
    }
}
