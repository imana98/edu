<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Speaker;

class SeminarController extends Controller
{
    public function index()
    {
        $seminars = Seminar::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.seminars.index', compact('seminars'));
    }

    public function create()
    {
        return view('admin.seminars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required|string|max:255',
            'target' =>'required|string|max:255',
            'explain' => 'required|string|max:255',
            'date' =>'required|string|max:255',
            'deadline' =>'required|string|max:255',
        ]);

        $seminar = new Seminar();
        $seminar->title = $request->title;
        $seminar->target = $request->target;
        $seminar->explain = $request->explain;
        $seminar->date = $request->date;
        $seminar->deadline = $request->deadline;
        $seminar->save();

        return redirect()->route('admin.seminars.index')->with(['message' => '登録を完了しました', 'status' => 'info']);
    }

    public function edit($id)
    {
        $seminar = Seminar::findOrFail($id);
        return view('admin.seminars.edit', compact('seminar'));
    }

    public function update(Request $request, $id)
    {
        Seminar::findOrFail($id)->update([
            'title' => $request->title,
            'date' => $request->date,
            'target' => $request->target,
            'deadline' => $request->deadline,
            'explain' => $request->explain,
        ]);

        return redirect()->route('admin.seminars.index')->with(['message' => '編集しました', 'status' => 'info']);
    }

    public function destroy($id)
    {
        Seminar::findOrFail($id)->delete();
        return redirect()->route('admin.seminars.index')->with(['message' => '削除しました', 'status' => 'alert']);
    }
}
