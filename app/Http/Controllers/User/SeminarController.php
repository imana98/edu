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

    public function detail($id)
    {
        $detail = SeminarDetail::findOrFail($id);
        // dd($detail);
        return view('user.detail', compact('detail'));
    }
}
