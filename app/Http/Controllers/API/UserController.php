<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            $authenticated_user = Auth::user();
            $user = User::find($authenticated_user->id);

            $token = $user->createToken('APIAuthToken');
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function getAuthData(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'phone_number' => $user->phone_number
        ]);
    }

    public function updateNumber(Request $request)
    {
        $user = $request->user();

        $user->updateNumber($request->number);
        
        return response()->json($user);
    }
}
