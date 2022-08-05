<?php
namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * do login in application
     * @param LoginRequest $request
     * @return JsonResponse
    */
    public function Login(LoginRequest $request) : JsonResponse
    {
        if (Auth::attempt($request->all())) {
            $token = $request->user()->createToken('auth_token');

            $data = ['token' => $token->plainTextToken];

            return response()->json($data, Response::HTTP_OK);
        }

        return response()->json(
            ['massage' => 'invalid credentilas'],
            Response::HTTP_UNAUTHORIZED
        );
    }

    /**
     * do logout in application
     * @return JsonResponse
     */
    public function logout() : JsonResponse
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json(
            ['massage' => 'logout sucessfully'],
            Response::HTTP_OK
        );
    }
}
