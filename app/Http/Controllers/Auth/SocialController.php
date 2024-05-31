<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\SocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProvideCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->stateless()->user();
        } catch (Exception $e) {
            return redirect()->back();
        }
        // find or create user and send params user get from socialite and provider
        $authUser = $this->findOrCreateUser($user, $provider);

        // login user
        if (!$authUser == null) {
            // User exists, so log them in
            Auth()->login($authUser, true);
            return redirect()->route('dashboard');
        } else {
            // User does not exist, redirect to login page
            return redirect()->route('login')->withErrors(['email' => 'Unauthorized user']);
        }
    }

    public function findOrCreateUser($socialUser, $provider)
    {
        // Get Social Account
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())
            ->where('provider_name', $provider)
            ->first();

        // If social account already exists, return the associated user
        if ($socialAccount) {
            return $socialAccount->user;
        } else {
            // Extract the email domain (e.g., example.com)
            $emailDomain = explode('@', $socialUser->getEmail())[1];

            // Define the allowed company email domains
            $allowedDomains = ['student.ciputra.ac.id']; // Add more as needed

            // Check if the email domain is allowed
            if (in_array($emailDomain, $allowedDomains)) {
                // Find or create user based on email
                $user = User::where('email', $socialUser->getEmail())->first();

                if (!$user) {
                    // Create a new user
                    $user = User::create([
                        'name' => $socialUser->getName(),
                        'email' => $socialUser->getEmail(),
                    ]);
                }

                // Create a new social account
                $user->socialAccounts()->create([
                    'provider_id' => $socialUser->getId(),
                    'provider_name' => $provider,
                ]);

                return $user;
            } else {
                // Redirect to login page with an error message
                // return redirect()->route('login')->withErrors(['email' => 'Unauthorized domain']);
                return null;
            }
        }
    }
}
