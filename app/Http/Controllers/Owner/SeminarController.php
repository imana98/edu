<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seminar;
use App\Models\SeminarDetail;
use App\Models\Entry;
use App\Models\Record;
use App\Models\Speaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class SeminarController extends Controller
{
    public function index()
    {
        $dt = Carbon::now();
        $dd = $dt->format('Y/m/d H:i:s');
        // dd($dd);
        $seminars = Seminar::orderBy('date', 'desc')->paginate(3);

        return view('user.index', compact('seminars', 'dd'));
    }

    public function show($id)
    {
        $seminar_id = $id;
        $title = Seminar::where('id', $id)->value('title');
        $seminars = SeminarDetail::where('seminar_id', $id)->get();
        $entry = Entry::where('user_id', Auth::id())->where('seminar_id', $id)->first();
        if($entry === null) {
            return view('user.show01', compact('title', 'seminars'));
        }else {
            return view('user.show', compact('title', 'seminars', 'entry'));
        }
    }

    public function entry(Request $request, $id)
    {
        $entry = Entry::where('user_id', Auth::id())
        ->where('seminar_id', $id)
        ->first();
        if($entry === null) {
            Entry::create([
                'user_id' => Auth::id(),
                'detail_id' => $request->detail_id,
                'seminar_id' => $id,
            ]);
            session()->flash('message', '参加登録出来ました。');
            return redirect()->route('user.seminars.index');
        } else{
            $entry = Entry::where('seminar_id', $id)->where('user_id', Auth::id())->update([
                'user_id' => Auth::id(),
                'detail_id' => $request->detail_id,
                'seminar_id' => $id
            ]);

            session()->flash('flash_message', '変更しました。');
            return redirect()->route('user.seminars.show', ['id' => $id]);
        }
    }

    public function reserve()
    {
        $reserves = Entry::where('user_id', Auth::id())
            ->with(['user', 'seminarDetail.seminar'])
            ->get();

        $dt = Carbon::now();
        $dd = $dt->format('Y/m/d H:i:s');
        $date = DB::table('seminars')->select('date')->get();
        return view('user.reserve', compact('reserves', 'date', 'dd'));
    }


    public function edit(Request $request, $id)
    {
        $title = Seminar::where('id', $id)->value('title');
        $speaker_id = $request->speakerId;
        $seminars = SeminarDetail::where('seminar_id', $id)->get();
        return redirect()->route('user.seminars.show', ['id' => $id])->with(compact('speaker_id'));
    }


    public function edit01()
    {
        $dt = Carbon::now();
        $dd = $dt->format('Y/m/d H:i:s');
        $id = 4;
        $speaker = Speaker::findOrFail(Auth::id());
        $seminar = Seminar::findOrFail($id);
        $seminars = Seminar::orderBy('date', 'desc')->paginate(3);
        $detail = SeminarDetail::where('seminar_id', $id)->where('speaker_id', Auth::id())->first();
        $entries = Entry::where('detail_id', $detail->id)->get();
        $teachers = DB::table('users')->where('id', '!=', Auth::id())->get();
        return view('speaker.index', compact('speaker', 'seminar', 'seminars',  'dd', 'detail', 'teachers', 'entries'));
    }

    public function edit02()
    {
        $id = 4;

        $seminar = Seminar::findOrFail($id);
        $speaker = Speaker::findOrFail(Auth::id());

        return view('speaker.create', compact('seminar', 'speaker'));
    }

    public function edit03(Request $request, $id)
    {
        dd($request);
        $seminar = new SeminarDetail();
        $seminar->seminar_id = $id;
        $seminar->speaker_id = Auth::id();
        $seminar->speaker_name = $request->name;
        $seminar->title = $request->title;
        $seminar->descriptions = $request->message;

        return redirect()->route('user.seminars.edit01');
    }

    public function edit04()
    {
        $records = SeminarDetail::where('speaker_id', Auth::id())->get();
        return view('speaker.record', compact('records'));
    }
}
