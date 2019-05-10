<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Place;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::all();
        $places = Place::all();
        return view('users.index', compact('users','places'));
    }

    public function show(User $user)
    {
        $place = Place::find($user->place_id);
        return view('users.show', compact('user','place'));
    }

    public function edit(User $user)
    {
        $places = Place::all();
        return view('users.edit', compact('user'),compact('places'));
    }

    public function update(Request $request, User $user)
    {
        request()->validate([
            'name' => ['required'],
            'place_id' => [],
        ]); 
        $user->update(request(['name','place_id']));
        return redirect('/users/'.$user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
