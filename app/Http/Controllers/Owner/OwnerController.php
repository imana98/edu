<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\Seminar;
use App\Models\SeminarDetail;
use App\Models\Speaker;
use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OwnerController extends Controller
{
    //
    public function index()
    {
        $dt = Carbon::now();
        $dd = $dt->format('Y/m/d H:i:s');
        $seminars = Seminar::orderBy('date', 'desc')->paginate(3);
        return view('owner.index', compact('dd', 'seminars'));
    }

    public function create($id)
    {
        $seminar = Seminar::find($id)->first();
        $speaker = Speaker::where('user_id', Auth::id())->first();
        return view('owner.create', compact('seminar', 'speaker'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'title' =>'required|string|max:255',
            'message' =>'required|string|max:255',
        ]);
        $seminar = Seminar::findOrFail($id);

        $detail = new SeminarDetail();
        $detail->seminar_id = $seminar->id;
        $detail->speaker_id = Auth::id();
        $detail->speaker_name = $request->name;
        $detail->seminar_name = $seminar->title;
        $detail->target = $seminar->target;
        $detail->title = $request->title;
        $detail->descriptions = $request->message;
        $detail->filename = $request->file;
        $detail->date = $seminar->date;
        $detail->save();

        return redirect()->route('owner.seminars.index');
    }

    public function reserve()
    {
        $dt = Carbon::now();
        $dd = $dt->format('Y/m/d H:i:s');
        $records = SeminarDetail::where('speaker_id', Auth::id())->orderBy('date', 'desc')->get();
        return view('owner.record', compact('dd', 'records'));
    }

    public function edit($id)
    {
        $seminar = SeminarDetail::where('seminar_id', $id)->first();
        $speaker = DB::table('owners')->where('user_id', Auth::id())->first();
        return view('owner.edit', compact('seminar', 'speaker'));
    }

    public function update(Request $request, $id)
    {
        $seminar = SeminarDetail::where('seminar_id', $id)->update([
            'title' => $request->title,
            'descriptions' => $request->message,
        ]);
        return redirect()->route('owner.seminars.index');
    }
}
