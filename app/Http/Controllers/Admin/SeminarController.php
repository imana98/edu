<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use App\Models\SeminarDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Speaker;
use App\Models\Survey;

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
        return back()->with(['message' => '編集しました', 'status' => 'alert']);
    }

    public function destroy($id)
    {
        Seminar::findOrFail($id)->delete();
        return redirect()->route('admin.seminars.index')->with(['message' => '削除しました', 'status' => 'alert']);
    }

    public function list()
    {
        $surveys = Survey::all();
        return view('admin.seminars.list', compact('surveys'));
    }

    public function detail($id)
    {
        $survey = Survey::where('seminar_id', $id)->first();
        $seminars = SeminarDetail::where('seminar_id', $id)->get();
        $seminar = Seminar::findOrFail($id);
        return view('admin.seminars.detail', compact('survey', 'seminars', 'seminar'));
    }

    public function delete($id)
    {
        Seminar::findOrFail($id)->delete();
        return redirect()->route('admin.seminars.index')->with(['message' => '削除しました', 'status' => 'alert']);
    }

    public function survey($id)
    {
        $seminar = Seminar::findOrFail($id);
        $speakers = SeminarDetail::select('speaker_name')->where('seminar_id', $id)->get();
        return view('admin.seminars.survey', compact('seminar', 'speakers'));
    }

    public function make(Request $request, $id)
    {
        $survey = new Survey();
        $survey->seminar_id = $id;
        $survey->title = $request->title;
        $survey->question01 = $request->question01;
        $survey->question02 = $request->question02;
        $survey->question03 = $request->question03;
        $survey->question04 = $request->question04;
        $survey->save();

        return redirect()->route('admin.seminars.index');
    }

    public function edit_survey(Request $request,$id)
    {
        $survey = Survey::findOrFail($id)->first();
        return view('admin.seminars.survey_edit', compact('survey'));
    }

    public function update_survey(Request $request, $id)
    {
        // dd($id);
        $seminar_id = Survey::select('seminar_id')->where('id', $id)->first();
        Survey::findOrFail($id)->update([
            'title' => $request->title,
            'question01' => $request->question01,
            'question02' => $request->question02,
            'question03' => $request->question03,
            'question04' => $request->question04,
        ]);

        $seminar = Seminar::find($seminar_id);
        return back()->with(['message' => '編集しました', 'status' => 'alert']);
    }

    public function delete_survey($id)
    {

    }
}
