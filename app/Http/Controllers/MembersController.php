<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Place;

class MembersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $places = Place::all();
        return view('members.create', compact('places'));
    }

    public function store(Request $request)
    {
        Member::create(
            request()->validate([
                'employee_no' => [],
                'last_name' => [],
                'first_name' => [],
                'last_name_kana' => [],
                'first_name_kana' => [],
                'place_id' => [],
                'sex' => [],
                'birthday' => [],
                'hire_date' => [],
                'retirement_date' => [],
                'retirement_type' => [],
                'retirement_note' => [],
                'postalcode' => [],
                'address1' => [],
                'address2' => [],
                'tel' => [],
                'email' => [],
                'occupation' => [],
                'salary_classification' => [],
                'work_days' => [],
                'is_monday' => [],
                'is_tuesday' => [],
                'is_wednesday' => [],
                'is_thursday' => [],
                'is_friday' => [],
                'is_saturday' => [],
                'is_sunday' => [],
                'yearly_limit' => [],
                'dayly_transportation_cost' => [],
                'employment_status' => [],
                'bank_name' => [],
                'branch_name' => [],
                'account_type' => [],
                'account_number' => [],
                'is_social_insurance' => [],
                'social_insurance_start' => [],
                'social_insurance_id' => [],
                'is_basic_pension' => [],
                'basic_pension_start' => [],
                'basic_pension_id' => [],
                'is_welfare_pension' => [],
                'welfare_pension_start' => [],
                'welfare_pension_id' => [],
                'is_employment_insurance' => [],
                'employment_insurance_start' => [],
                'employment_insurance_id' => [],
                'has_dependent' => [],
                'job_title' => [],
                'note' => []
            ])
        );

        return redirect('/members');
    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        $places = Place::all();
        return view('members.edit', compact('member'), compact('places'));
    }

    public function update(Request $request, Member $member)
    {
        request()->validate([
            'employee_no' => [],
            'last_name' => [],
            'first_name' => [],
            'last_name_kana' => [],
            'first_name_kana' => [],
            'place_id' => [],
            'sex' => [],
            'birthday' => [],
            'hire_date' => [],
            'retirement_date' => [],
            'retirement_type' => [],
            'retirement_note' => [],
            'postalcode' => [],
            'address1' => [],
            'address2' => [],
            'tel' => [],
            'email' => [],
            'occupation' => [],
            'salary_classification' => [],
            'work_days' => [],
            'is_monday' => [],
            'is_tuesday' => [],
            'is_wednesday' => [],
            'is_thursday' => [],
            'is_friday' => [],
            'is_saturday' => [],
            'is_sunday' => [],
            'yearly_limit' => [],
            'dayly_transportation_cost' => [],
            'employment_status' => [],
            'bank_name' => [],
            'branch_name' => [],
            'account_type' => [],
            'account_number' => [],
            'is_social_insurance' => [],
            'social_insurance_start' => [],
            'social_insurance_id' => [],
            'is_basic_pension' => [],
            'basic_pension_start' => [],
            'basic_pension_id' => [],
            'is_welfare_pension' => [],
            'welfare_pension_start' => [],
            'welfare_pension_id' => [],
            'is_employment_insurance' => [],
            'employment_insurance_start' => [],
            'employment_insurance_id' => [],
            'has_dependent' => [],
            'job_title' => [],
            'note' => []
        ]); 
        $member->update(request([
            'employee_no',
            'last_name',
            'first_name',
            'last_name_kana',
            'first_name_kana',
            'place_id',
            'sex',
            'birthday',
            'hire_date',
            'retirement_date',
            'retirement_type',
            'retirement_note',
            'postalcode',
            'address1',
            'address2',
            'tel',
            'email',
            'occupation',
            'salary_classification',
            'work_days',
            'is_monday',
            'is_tuesday',
            'is_wednesday',
            'is_thursday',
            'is_friday',
            'is_saturday',
            'is_sunday',
            'yearly_limit',
            'dayly_transportation_cost',
            'employment_status',
            'bank_name',
            'branch_name',
            'account_type',
            'account_number',
            'is_social_insurance',
            'social_insurance_start',
            'social_insurance_id',
            'is_basic_pension',
            'basic_pension_start',
            'basic_pension_id',
            'is_welfare_pension',
            'welfare_pension_start',
            'welfare_pension_id',
            'is_employment_insurance',
            'employment_insurance_start',
            'employment_insurance_id',
            'has_dependent',
            'job_title',
            'note'
        ]));
        return redirect('/members/'.$member->id);
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect('/members');
    }
}
