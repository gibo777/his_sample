<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Notifications\CreatePasswordMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $roles = DB::table('role_type_users')->get();
        return view('auth.register',['role' => $roles]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $token = Str::random(60);
        $success = '';
        $success = event(new Registered($user = $this->create($request->all(),$token)));

        // $this->guard()->login($user);
        if ($response = $this->registered($request, $user)) {
            return $response;
        }
        if ($success){
            $user->notify(new CreatePasswordMail($user,$token));
            Toastr::success('User Has Been Added! Check Registered Email to verify and Set Your Password','Success');

        }

        return $request->wantsJson()
                    ? new JsonResponse([], 201)
                    : redirect(env('REGISTER_ROUTE'));
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
