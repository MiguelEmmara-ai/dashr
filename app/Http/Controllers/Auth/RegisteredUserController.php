<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Laravolt\Avatar\Facade as Avatar;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register')->with([
            'title' => "Register Account",
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'min:5', 'max:20', 'regex:/^\S*$/u', 'unique:' . User::class],
                'avatar' => ['image', 'file', 'dimensions:width=200,height=200'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ],
            [
                'dimensions'  => "Please Make Sure The Image Dimension Is 200 x 200."
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'haveAvatar' => false,
            'password' => Hash::make($request->password),
        ]);

        // Create default avatar
        Avatar::create($request->name)->save(storage_path('app/public/default_avatar-' . $user->id . '.jpg'), 100);

        DB::table('users')
            ->where('id', $user->id)
            ->update([
                'default_avatar' => 'storage/default_avatar-' . $user->id . '.jpg'
            ]);

        // Replace if avtar was present during registration
        if ($request->file('avatar')) {
            $request->file('avatar')->storeAs('avatars', 'avatar-' . $user->id . '.jpg');

            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'avatar' => 'avatars/avatar-' . $user->id . '.jpg',
                    'haveAvatar' => true
                ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->withSuccess('Registered Successfully!');
    }
}
