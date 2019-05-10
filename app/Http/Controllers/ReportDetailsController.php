<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReportDetail;
use App\Member;
use App\Report;
use App\Tag;

class ReportDetailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $report_details = ReportDetail::all();
        return view('report_details.index', compact('report_details'));
    }

    public function create()
    {
        $rid = $_GET['id'];
        $report = Report::find($rid);
        $tags = Tag::all();
        $members = Member::where('place_id', $report->place_id)->get();
        return view('report_details.create', compact('report', 'members','tags'));
    }

    public function store(Request $request)
    {
        for($i = 1;$i < $request->input('member_count');$i++) {
            $params = array(
                "member_id"=>$request->input('member_id'.$i),
                "report_id"=>$request->input('report_id'),
            );
            $report_detail = ReportDetail::firstOrNew($params);
            $report_detail->date = $request->input('date');
            $report_detail->report_id = $request->input('report_id');
            $report_detail->place_id = $request->input('place_id');
            $report_detail->member_id = $request->input('member_id'.$i);
            $report_detail->is_working = $request->input('is_working'.$i);
            if ($request->input('is_working'.$i) == 1) {
                $report_detail->make_total = $request->input('make'.$i);
                $report_detail->start = $request->input('in'.$i.'-1').':'.$request->input('in'.$i.'-2');
            $report_detail->finish = $request->input('out'.$i.'-1').':'.$request->input('out'.$i.'-2');
            }else{
                $report_detail->make_total = 0;
                $report_detail->start = '00:00';
                $report_detail->finish = '00:00';
            }
            
            $report_detail->tag = $request->input('tag'.$i);
            $report_detail->save();
        }
        return redirect('/report_details');
    }

    public function show(ReportDetail $report_detail)
    {
        return view('report_details.show', compact('report_detail'));
    }

    public function edit($report_id)
    {
        $tags = Tag::all();
        $report_details = ReportDetail::where('report_id', $report_id)->get();
        $report_detail = $report_details->first();
        $members = Member::where('place_id', $report_detail->place_id)->get();
        return view('report_details.edit', compact('report_details','report_detail','members','tags'));
    }

    public function update(Request $request, ReportDetail $report_detail)
    {
        request()->validate([
            'report_id' => ['required'],
            'place_id' => ['required'],
            'member_id' => ['required'],
            'date' => ['required'],
            'is_working' => ['required'],
            'key_number' => [],
            'make_floors' => [],
            'make_total' => ['required'],
            'style' => ['required'],
            'start' => ['required'],
            'finish' => ['required'],
            'note' => []
        ]); 
        $report_detail->update(request([
            'report_id',
            'place_id',
            'member_id',
            'date',
            'is_working',
            'key_number',
            'make_floors',
            'make_total',
            'style',
            'start',
            'finish',
            'note'
        ]));
        return redirect('/report_details/'.$report_detail->id);
    }

    public function destroy(ReportDetail $report_detail)
    {
        $report_detail->delete();
        return redirect('/report_details');
    }
}
