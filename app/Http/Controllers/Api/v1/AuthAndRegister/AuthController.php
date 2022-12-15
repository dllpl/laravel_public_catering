<?php

namespace App\Http\Controllers\Api\v1\AuthAndRegister;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiControllerTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    use ApiControllerTrait;

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (Hash::check($request->password, $user->password)) {
            $token = $user->createToken('token')->plainTextToken;
            return $this->apiResponseSuccess([
                'access_token' => $token,
                'expires_in' => config('sanctum.expiration')
            ]);
        } else {
            return $this->apiResponseError('Проверьте правильность ввода пароля', 404);
        }
    }

    public function logout(Request $request)
    {
        return $request->user()->currentAccessToken()->delete();
    }
}
