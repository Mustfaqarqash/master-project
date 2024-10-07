<?php
namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Traits\Date;
use Dflydev\DotAccessData\Data;
use Faker\Core\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        try {
            $googleUser = Socialite::driver('google')->user();

            // Check if the user exists by google_id
            $user = User::where('google_id', $googleUser->getId())->first();

            if (!$user) {
                // Create a new user if not found
                $newUser = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                    'image' => $googleUser->getAvatar(),
                ]);
                Auth::login($newUser);
            } else {
                Auth::login($user);
            }

            return redirect()->intended('dashboard');

        } catch (\Exception $e) {
            // Log the error for debugging purposes and redirect to a fallback route
            dd($e->getMessage());

        }
    }
}
