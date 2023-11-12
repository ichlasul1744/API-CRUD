<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // ...
    public function register(Request $request)
{
    // Implementasi registrasi user
}

// Contoh endpoint login dalam AuthController
public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Lakukan otentikasi pengguna (misalnya, menggunakan model User)
    if (!$token = auth()->attempt($request->only('email', 'password'))) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    // Token JWT berhasil diperoleh
    return $this->respondWithToken($token);
}

}
