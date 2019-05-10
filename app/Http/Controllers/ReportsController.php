<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Place;
use App\Member;
use App\ReportDetail;
use Auth;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $today = new Carbon();
        $td = $today->toDateString();
        $tdo = $today->subDay(40)->toDateString();
        $user = Auth::user();
        if ($user->place->name == '全店舗') {
            $reports = Report::all();
        }else{
            $uPlace = $user->place_id;
        }

        $reports = Report::where('place_id', $user->place_id)
        ->whereBetween('date',array($tdo,$td))
        ->get();

        $report_details = ReportDetail::where('place_id', $user->place_id)
        ->whereBetween('date',array($tdo,$td))
        ->get();

        return view('reports.index', compact('reports','report_details'));
    }

    public function create()
    {
        $places = Place::all();
        $members = Member::all();
        return view('reports.create', compact('places','members','tdate'));
    }

    public function store(Request $request)
    {
        Report::create(
            request()->validate([
                'place_id' => ['required'],
                'member_id' => ['required'],
                'unit_price' => ['required'],
                'date' => ['required'],
                'ordered_rooms_quantity' => ['required'],
                'cleaned_rooms_quantity' => ['required'],
                'note' => []
            ])
        );
        $report = Report::orderBy('created_at', 'DESC')->first();

        return redirect('/report_details/create?id='.$report->id);
    }

    public function show(Report $report)
    {
        $report_details = ReportDetail::where('report_id', $report->id)->get();
        return view('reports.show', compact('report','report_details'));
    }

    public function edit(Report $report)
    {
        $places = Place::all();
        $members = Member::all();
        return view('reports.edit', compact('report','places','members'));
    }

    public function update(Request $request, Report $report)
    {
        $report->update(
            request()->validate([
                'place_id' => ['required'],
                'member_id' => ['required'],
                'unit_price' => ['required'],
                'date' => ['required'],
                'ordered_rooms_quantity' => ['required'],
                'cleaned_rooms_quantity' => ['required'],
                'note' => []
            ])
        );
        return redirect('/reports/'.$report->id);
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return redirect('/reports');
    }
}
