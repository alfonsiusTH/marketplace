<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        // Validasi Input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:30',
            'email' => 'required|string|email|max:30|unique:users',
            'password' => 'required|string|min:8',
            'telephone' => 'required|string|max:15'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Membuat Akun User
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telephone' => $request->telephone
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => array_merge(
                ['id' => $user->id],
                $user->only(['name', 'email', 'telephone'])
            )
        ], 201);
    }

    public function login(Request $request)
    {
        // Validasi Input
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:30|email',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Cek Email ada atau Tidak
        $user = User::where('email', $request->email)->first();

        // Jika Email atau Password Kosong
        if ($user->email === null || $user->password === null) {
            return response()->json([
                'message' => 'Email dan Password Wajib Diisi!',
            ]);
        }

        // Jika Email atau Password tidak sesuai
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau Password Salah!',
            ], 401);
        }

        return $user->createToken('user-token')->plainTextToken;
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'User logged out successfully'
        ], 200);
    }
}
