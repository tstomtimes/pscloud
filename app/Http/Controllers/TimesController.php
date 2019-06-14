<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Time;
use App\Member;
use App\Place;
use App\Daily_time;
use Carbon\Carbon;
use Auth;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Controllers\Controller;

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

    public function indexTimeCard()
   {
       $place_id = Auth::user()->place_id;
       $place = Place::All()->where('id', $place_id)->first();
       $members = Member::All()->where('place_id', $place_id)->sortBy('last_name_kana');

       return view('times.index_time_card', compact( 'members','place'));
   }

   public function createTimeCard($member_id)
   {
     $time = Time::where('member_id', $member_id)->latest('created_at')->first();
     $member = Member::where('id', $member_id)->first();
     return view('times.create_time_card', compact('member','time'));
   }

 // public function createPass($member_id)
 // {
 //     $member = Member::where('id', $member_id)->first();
 //
 //     return view('times.create_pass', compact( 'member','member_id'));
 // }
 //
 // public function storePass(Request $request, $id)
 // {
 //     $this->validate($request, [
 //         'pass' => 'required|numeric|confirmed|digits:8',
 //     ],[
 //         'pass.required' => ':attributeが入力されていません',
 //         'pass.numeric' => ':attributeは数字のみ使用できます',
 //         'pass.confirmed' => '再入力のものと暗証番号が一致しません',
 //     ],[
 //         'pass' => '暗証番号',
 //     ]);
 //     $member = Member::findOrFail($id);
 //     $member->pass = $request->pass;
 //     $member->save();
 //     return redirect()->route('input_pass', [$id]);
 // }

 // public function changePass($member_id)
 // {
 //     $member = Member::where('id', $member_id)->first();
 //
 //     return view('times.change_pass', compact( 'member','member_id'));
 // }

 // public function updatePass(Request $request, $id)
 // {
 //     $this->validate($request, [
 //         'pass_old' => 'required|exists:members,pass,id,'.$id,
 //         'pass' => 'required|numeric|confirmed|digits:8',
 //     ],[
 //         'pass_old.exists' => ':attributeが間違っています',
 //         'pass_old.required' => ':attributeが入力されていません',
 //         'pass.required' => ':attributeが入力されていません',
 //         'pass.numeric' => ':attributeは数字のみ使用できます',
 //         'pass.confirmed' => ':attributeが再入力された番号と一致しません',
 //     ],[
 //         'pass_old' => '暗証番号',
 //         'pass' => '新しい暗証番号',
 //     ]);
 //     $member = Member::findOrFail($id);
 //     $member->pass = $request->pass;
 //     $member->save();
 //     return redirect()->route('input_pass', [$id]);
 // }

 // public function inputPass($id)
 // {
 //     $member = Member::findOrFail($id);
 //     $pass = strval($member->pass);
 //     if (strcmp($pass, "0") == 0){
 //         return redirect()->route('create_pass', [$id]);
 //     }else{
 //         return view('times.input_pass', compact( 'id'));
 //     }
 // }

 // public function checkPass(Request $request)
 // {
 //     $id = $request->id;
 //     $this->validate($request, [
 //         'pass' => 'required|exists:members,pass,id,'.$id,
 //     ],[
 //         'pass.required' => ':attributeが入力されていません',
 //         'pass.exists' => ':attributeが間違っています',
 //     ],[
 //         'pass' => '暗証番号',
 //     ]);
 //
 //     $member = Member::findOrFail($request->id);
 //     $p1 = $member->pass;
 //     $p2 = $request->pass;
 //
 //     if($p1 == $p2){
 //         return redirect()->route('create_time_card', [$id]);
 //     }else{
 //         return redirect()->route('input_pass', [$id]);
 //     }
 //
 // }

  public function storeTimeCard(Request $request)
  {
    dd($request);
     if($request->status == "in"){
        $time = new Time();
        $time->fill([
         'member_id' => $request->member_id,
         'in' => $request->time
        ]);
        $time->save();

        $member = Member::findOrFail($request->member_id);
        $member->is_working = true;
        $member->save();
     }else{
        $time = Time::where('member_id', $request->member_id)->latest('created_at')->first();
        $in = new Carbon($time->in);
        $out = new Carbon($request->time);
        $diff_min = $out->diffInMinutes($in);
        $time->fill([
         'out' => $request->time,
         'time' => $diff_min
        ]);
        $time->save();

        $member = Member::findOrFail($request->member_id);
        $member->is_working = false;
        $member->save();
     }
     return redirect('/time_card');
  }
}
