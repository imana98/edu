<?php

namespace App\Http\Controllers\Speaker\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Speaker;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $speakers = Speaker::all();
        return view('speaker.auth.login', compact('speakers'));
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        // $password = $request->password;
        // $email = $request->email;
        // $speaker = Speaker::findOrFail($request->name);
        // $a = $speaker->user->email;

        // $passwordHash = $speaker->password;
        // $p = password_verify($password, $passwordHash);

        // if ($email === $a && $p) {
        //     return view('speaker.dashboard');
        // }
        // return redirect()->back();
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::SPEAKER_HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('speakers')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/speaker');
    }
}
