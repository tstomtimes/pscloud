<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmploymentStatus;

class EmploymentStatusesController extends Controller
{
    public function index()
    {
        $employment_statuses = EmploymentStatus::all();
        return view('employment_statuses.index', compact('employment_statuses'));
    }

    public function create()
    {
        return view('employment_statuses.create');
    }

    public function store(Request $request)
    {
        EmploymentStatus::create(
            request()->validate([
                'name' => []
            ])
        );

        return redirect('/employment_statuses');
    }

    public function show(EmploymentStatus $employment_status)
    {
        return view('employment_statuses.show', compact('employment_status'));
    }

    public function edit(EmploymentStatus $employment_status)
    {
        return view('employment_statuses.edit', compact('employment_status'));
    }

    public function update(Request $request, EmploymentStatus $employment_status)
    {
        request()->validate([
            'name' => []
        ]); 
        $employment_status->update(request(['name']));
        return redirect('/employment_statuses/'.$employment_status->id);
    }

    public function destroy(EmploymentStatus $employment_status)
    {
        $employment_status->delete();
        return redirect('/employment_statuses');
    }
}
