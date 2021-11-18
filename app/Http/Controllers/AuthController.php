<?php

namespace App\Http\Controllers;

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
    public function userAuth(Request $request)
    {
        $request->validate([
            'email'         => 'required',
            'password'      => 'required',
        ]);

        $y = 1;

        $fn1 = fn($x) => $x + $y;
        // equivalent to using $y by value:
        $fn2 = function ($x) use ($y) {
            return $x + $y;
        };
        $customer = User::where('email', $request->email)->with(['fasilitas_kesehatan' => function ($query) {
            $query->select('id', 'name');
        }])->first();

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
     * Penduduk Login Handler
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pendudukAuth(Request $request)
    {
        //
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
