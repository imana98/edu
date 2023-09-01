<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\Seminar;
use App\Models\SeminarDetail;
use App\Models\User;
use App\Models\Entry;
use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Image;

class OwnerController extends Controller
{
    //
    public function index()
    {
        // $img = SeminarDetail::where('speaker_id', Auth::id())->where('seminar_id', 4)->first();
        // dd($img);
        $dt = Carbon::now();
        $dd = $dt->format('Y/m/d H:i:s');
        $seminars = Seminar::orderBy('date', 'desc')->paginate(3);
        return view('owner.index', compact('dd', 'seminars'));
    }

    public function create($id)
    {
        $entry = SeminarDetail::where('seminar_id', $id)->where('owner_id', Auth::id())->first();
        if($entry){
            return redirect()->route('owner.seminars.reserve');
        }else {
            $seminar = Seminar::findOrFail($id);
            $speaker = Owner::where('id', Auth::id())->first();
            return view('owner.create', compact('seminar', 'speaker'));
        }
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'title' =>'required|string|max:255',
            'message' =>'required|string|max:255',
        ]);
        $img = $request->file;
        $filename = $img->getClientOriginalName();
        $image = Image::make($img);
        $image->orientate();
        $image->fit(200, null, function($constraint){
            $constraint->upsize();
        });
        $image->save(public_path() . '/storage/' . $filename);

        $seminar = Seminar::findOrFail($id);
        $detail = new SeminarDetail();
        $detail->seminar_id = $seminar->id;
        $detail->owner_id = Auth::id();
        $detail->speaker_name = $request->name;
        $detail->seminar_name = $seminar->title;
        $detail->target = $seminar->target;
        $detail->title = $request->title;
        $detail->descriptions = $request->message;
        $detail->filename = $filename;
        $detail->date = $seminar->date;
        $detail->save();

        return redirect()->route('owner.seminars.index');
    }

    public function reserve()
    {
        $dt = Carbon::now();
        $dd = $dt->format('Y/m/d H:i:s');
        $records = SeminarDetail::where('owner_id', Auth::id())->orderBy('date', 'desc')->get();
        return view('owner.record', compact('dd', 'records'));
    }

    public function edit($id)
    {
        $seminar = SeminarDetail::findOrFail($id);
        $speaker = DB::table('owners')->where('id', Auth::id())->first();
        return view('owner.edit', compact('seminar', 'speaker'));
    }

    public function update(Request $request, $id)
    {
        $img = $request->images;
        $seminar = SeminarDetail::find($id);
        if($img) {
            $filename = $img->getClientOriginalName();
            $image = Image::make($img);
            $image->orientate();
            $image->fit(200, null, function($constraint){
                $constraint->upsize();
            });
            $image->save(public_path() . '/storage/' . $filename);
            $seminar->filename = $filename;
        }
        $seminar->title = $request->title;
        $seminar->descriptions = $request->message;
        $seminar->update();
        return redirect()->route('owner.seminars.edit', ['id' => $id]);
    }

    public function destroy($id)
    {
        $detail = SeminarDetail::findOrFail($id);
        $detail->delete();
        return redirect()->route('owner.seminars.reserve');
    }

    public function attend($id)
    {
        // dd($id);
        $detail = SeminarDetail::where('seminar_id', $id)->where('owner_id', Auth::id())->first();
        $detail_id = $detail->id;
        $entries = Entry::where('detail_id', $detail_id)->get();
        // $detail = entry->seminarDetail();
        // dd($entry);
        return view('owner.attend', compact('entries', 'detail'));
    }

    public function survey()
    {
        $lists = SeminarDetail::select('seminar_id')->where('owner_id', Auth::id())->get();
        $surveys = Survey::all();
        return view('owner.survey', compact('lists', 'surveys'));
    }

    public function list()
    {
        $surveys = Survey::all();
        // dd($surveys);
    }
}