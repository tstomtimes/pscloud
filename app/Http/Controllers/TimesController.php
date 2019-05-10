<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
use App\Member;
use Carbon\Carbon;

class TimesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $times = Time::all();
        return view('times.index', compact('times'));
    }

    public function create()
    {
        $members = Member::all();
        return view('times.create',compact('members'));
    }

    public function store(Request $request)
    {
        Time::create(
            request()->validate([
                'member_id' => ['required'],
                'date' => ['required'],
                'in' => [],
                'out' => [],
                'time' => [],
            ])
        );

        return redirect('/times');
    }

    public function show(Time $time)
    {
        return view('times.show', compact('time'));
    }

    public function edit(Time $time)
    {
        $members = Member::all();
        return view('times.edit', compact('time'),compact('members'));
    }

    public function update(Request $request, Time $time)
    {
        request()->validate([
            'member_id' => ['required'],
            'date' => ['required'],
            'in' => [],
            'out' => [],
            'time' => [],
        ]);

        $time->update(request(['member_id','date','in','out','time']));
        return redirect('/times/'.$time->id);
    }

    public function destroy(Time $time)
    {
        $time->delete();
        return redirect('/times');
    }
}
