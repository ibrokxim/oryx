<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Laravel\Passport\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;

class AuthController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = Client::where('password_client', 1)->first();
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials.'
            ], 401);
        }

        if (!$this->client) {
            return response()->json([
                'message' => 'OAuth client not found.'
            ], 500);
        }

        try {
            $http = new HttpClient;

            $response = $http->post(url('/oauth/token'), [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => $this->client->id,
                    'client_secret' => $this->client->secret,
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '',
                ],
            ]);

            $result = json_decode((string) $response->getBody(), true);

            return response()->json([
                'access_token' => $result['access_token'],
                'token_type' => $result['token_type'],
                'expires_in' => $result['expires_in'],
            ]);

        } catch (ClientException $e) {
            $response = $e->getResponse();
            $responseBodyAsString = $response->getBody()->getContents();
            return response()->json(json_decode($responseBodyAsString, true), $response->getStatusCode());
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Logged out successfully.'
        ], 200);
    }

    public function user(Request $request)
    {
		$user = $request->user();
		$user["parcelActiveCount"] = $user->parcelActiveCount();
        $deliveryMode = $user->deliveryModes()->first();
        $user["delivery_method"] = $deliveryMode ? $deliveryMode->delivery_method : null;
        $user["delivery_address"] = $deliveryMode ? $deliveryMode->delivery_address : null;
        return response()->json($user);
    }
}
