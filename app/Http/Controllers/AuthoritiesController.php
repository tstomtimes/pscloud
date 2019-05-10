<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Authority;

class AuthoritiesController extends Controller
{
    public function index()
    {
        $authorities = Authority::all();
        return view('authorities.index', compact('authorities'));
    }

    public function create()
    {
        return view('authorities.create');
    }

    public function store(Request $request)
    {
        Authority::create(
            request()->validate([
                'name' => ['required', 'min:3','max:255'],
                'note' => []
            ])
        );

        return redirect('/authorities');
    }

    public function show(Authority $authority)
    {
        return view('authorities.show', compact('authority'));
    }

    public function edit(Authority $authority)
    {
        return view('authorities.edit', compact('authority'));
    }

    public function update(Request $request, Authority $authority)
    {
        request()->validate([
            'name' => ['required', 'min:3','max:255']
        ]); 
        $authority->update(request(['name','note']));
        return redirect('/authorities/'.$authority->id);
    }

    public function destroy(Authority $authority)
    {
        $authority->delete();
        return redirect('/authorities');
    }
}
