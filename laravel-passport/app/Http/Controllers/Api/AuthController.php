<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email'  => 'required|email',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return $this->error('Isi Semua Data', $validator->errors());
            }

            if(Auth::attempt(['email' => $request->email,'password' => $request->password]))
            {
                $user = Auth::user();
                $token = $user->createToken(now()->timestamp)->accessToken;

                return $this->success([
                    'token' => $token,
                ],'Login Sukses');
            } else {
                return $this->error('Email / Password salah');
            }
        } catch (\Exception $e) {
            return $this->error('Server Error!');
        }
    }
}
