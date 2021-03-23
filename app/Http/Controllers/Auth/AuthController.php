<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Auth\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            return Redirect::to('/auth/redirect/github');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect()->route("posts.index");
    }

    private function findOrCreateUser($githubUser)
    {
        if ($authUser = User::where('github_account', $githubUser->email)->first()) {
            return $authUser;
        }

        return User::create([
            'github_account' => $githubUser->email,
        ]);
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return Redirect::to('/auth/redirect/google');
        }

        $authUser = $this->findOrCreateUserGoogle($user);

        Auth::login($authUser, true);

        return redirect()->route("posts.index");
    }

    private function findOrCreateUserGoogle($googleUser)
    {
        if ($authUser = User::where('google_account', $googleUser->email)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $googleUser->user['name'],
            'google_account' => $googleUser->email,
        ]);
    }
}
