<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Place;

class TagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index', compact('tags'));
    }

    public function create()
    {
        $places = Place::all();
        return view('tags.create', compact('places'));
    }

    public function store(Request $request)
    {
        Tag::create(
            request()->validate([
                'place_id' => ['required'],
                'name' => ['required'],
                'price' => ['required'],
                'is_using' => ['required']
            ])
        );

        return redirect('/tags');
    }

    public function show(Tag $tag)
    {
        return view('tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        $places = Place::all();
        return view('tags.edit', compact('tag'), compact('places'));
    }

    public function update(Request $request, Tag $tag)
    {
        request()->validate([
            'place_id' => ['required'],
            'name' => ['required'],
            'price' => ['required'],
            'is_using' => ['required']
        ]); 
        $tag->update(request([
            'place_id',
            'name',
            'price',
            'is_using'
        ]));
        return redirect('/tags/'.$tag->id);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect('/tags');
    }
}
