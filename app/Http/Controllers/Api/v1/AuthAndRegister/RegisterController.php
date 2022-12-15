<?php

namespace App\Http\Controllers\Api\v1\AuthAndRegister;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\ApiControllerTrait;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    use ApiControllerTrait;

    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('token')->plainTextToken;

        return $this->apiResponseSuccess([
            'access_token' => $token,
            'expires_in' => config('sanctum.expiration')
        ]);
    }
}
