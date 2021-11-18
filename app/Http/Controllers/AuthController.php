<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * User (Operator) Login Handler
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'email'         => 'required',
            'password'      => 'required',
        ]);

        $customer = User::where('email', $request->email)->with(['fasilitas_kesehatan' => fn($query) => $query->select('id', 'name')])->first();

        if (! $customer || ! Hash::check($request->password, $customer->password)) {
            return response()->json([
                'success'   => false,
                'data'      => 'Email atau password salah'
            ], 401);
        }

        $data   = $customer->only(['id', 'name', 'email', 'fasilitas_kesehatan']);

        $token  = $customer->createToken('user')->plainTextToken;

        return response()->json([
            'success'   => true,
            'data'      => [
                'message'   => 'Login sukses',
                'token'     => $token,
                'user'      => $data
            ]
        ], 200);
    }

    /**
     * Destroy the logged in user's current token
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the current request...
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success'   => true,
            'data'      => 'Logout berhasil'
        ], 200);
    }
}
