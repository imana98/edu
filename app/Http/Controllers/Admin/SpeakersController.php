<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speaker;
use App\Models\User;
use App\Models\Owner;
use App\Models\SeminarDetail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Throwable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpeakersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Owner::select('id', 'name', 'created_at')->orderBy('created_at', 'desc')->paginate(5);
        return view('admin.speakers.index', compact('speakers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = User::all();
        return view('admin.speakers.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'name' =>'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);
        $name = $request->name;
        $user_id = User::where('name', $name)->first('id');
        $email = User::select('email')->where('name', $request->name)->first();


        $owner = new Owner();
        $owner->user_id = $user_id->id;
        $owner->name = $request->name;
        $owner->email = $email->email;
        $owner->password = Hash::make($request->password);
        $owner->save();


        return redirect()->route('admin.speakers.index')->with(['message' => '登録を完了しました。', 'status' => 'info']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $speaker = Owner::findOrFail($id);
        return view('admin.speakers.edit', compact('speaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:8',
        ]);


        try{
            DB::transaction(function () use($request, $id) {
                $speaker = Owner::findOrFail($id);
                $speaker->name = $request->name;
                $speaker->password = Hash::make($request->password);
                $speaker->save();

                $user_id = $speaker->user_id;
                $user = User::findOrFail($user_id);
                $user->name = $request->name;
                $user->save();
            });
        }catch(Throwable $e){
            Log::error($e);
            throw $e;
        }
        return redirect()->route('admin.speakers.index')->with(['message' => '講義者の情報を編集しました。', 'status' => 'info'] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Owner::findOrFail($id)->delete();
        // SeminarDetail::
        return redirect()->route('admin.speakers.index')->with(['message' => '削除しました。', 'status' => 'alert']);
    }
}
