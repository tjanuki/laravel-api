<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginUserRequest $request){
        $validated = $request->validated();

        if (!Auth::attempt($validated)) {
            return $this->error('Invalid credentials', 401);
        }

        $user = Auth::user();

        return $this->ok('Login successful',[
            'token' => $user->createToken('API token for '. $user->email)->plainTextToken
        ] );
    }
}
