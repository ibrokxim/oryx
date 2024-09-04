<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Models\Setting;

class SocialController extends Controller
{
    public function redirect()
    {
        $redirect_uri = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
        return response()->json($redirect_uri);
    }

    public function callback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('social_id', $googleUser->id)->first();

            if ($user) {
                Auth::login($user, true);
            } else {
                $user = User::create([
                    'email_verified_at' => Carbon::now(),
                    'email' => $googleUser->email,
                    'social_id' => $googleUser->id,
                    'password' => Hash::make(Str::random(20)),
                    'name' => $googleUser->user['given_name'],
                    'surname' => $googleUser->user['family_name'],
                    'tariff_id' => Setting::where(['code' => 'default', 'type' => 4, 'active' => 1])->first()->id,
                ]);

                $user->syncRoles([Role::where('name', 'users')->first()->id]);
                Auth::login($user, true);
            }

            // Создание персонального токена
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->accessToken;

            return response()->json([
                'token' => $token,
                'token_type' => 'Bearer',
                'expires_at' => $tokenResult->token->expires_at
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to authenticate'], 500);
        }
    }
}
