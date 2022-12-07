<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\GeneralSetting;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // General Setting of the website
        $general_setting = GeneralSetting::first();

        SEOTools::setTitle("Login To Your Account | $general_setting->site_tagline");
        SEOTools::setDescription("$general_setting->site_meta_description");
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'webiste');

        return view('auth.login')->with([
            'site_title' => $general_setting->site_title,
            'logo_image' => $general_setting->logo_image,
            'footer_copyright' => $general_setting->footer_copyright,
        ]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $user = User::where('username', $request->username)->first();

        // user doesn't exist
        if ($user === null) {
            throw ValidationException::withMessages([
                'username' => trans('auth.failed'),
            ]);
        } else if ($user !== null) {
            // Only ACTIVE user can log in, after use register they will need to be approve by admin
            if ($user->user_status == 'PENDING') {
                return Redirect::route('login')->with('error', "Your Account Is Still Pending Approval");
            } else if ($user->user_status == 'SUSPEND') {
                return Redirect::route('login')->with('error', "Your Account Has Been Suspended");
            }
        }

        $request->authenticate($request);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
