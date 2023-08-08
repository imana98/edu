<?php

namespace App\Http\Controllers\Speaker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Speaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CreateController extends Controller
{
    public function index()
    {
        $dt = Carbon::now();
        $dd = $dt->format('Y/m/d H:i:s');
        $id = 4;
        $speaker = Speaker::findOrFail(Auth::id());
        dd($speaker);
        $seminars = Seminar::orderBy('date', 'desc')->paginate(3);
        return view('speaker.index', compact('speaker', 'seminars', 'dd'));
    }

    public function create()
    {
        $id = 4;
        $speaker = Speaker::findOrFail(Auth::id());
        $seminar = Seminar::findOrFail($id);
        return view('speaker.create', compact('speaker', 'seminar'));
    }
}
