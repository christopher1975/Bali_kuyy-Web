<?php
namespace App\Http\Controllers\API;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    public function login(Request $request) {

        //menyiapkan data response
        $response = [
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => null,
            ],
            'data' => null,
        ];

        //mencoba untuk login
        try {
            //memvalidasi data
            $validator = Validator::make($request->all(), [
                // Validasi input
                'email' => 'required|email',
                'password' => 'required'
            ]);

            //ketika validasi error karena email atau password tidak ada
            if ($validator->fails()) {
                $response['meta']['code'] = 400;
                $response['meta']['status'] = 'error';
                $response['meta']['message'] = $validator->errors()->first();
                return response()->json($response, $response['meta']['code']);
            }
            
            
            $user = null;
            $credentials = request(['email', 'password']);
            
            //cek jika login berhasil
            if (Auth::attempt($credentials)) {
                /** @var \App\Models\MyUserModel $user **/
                $user = Auth::user();

                //membuat token
                $tokenResult = $user->createToken('authToken')->plainTextToken;

                //mengembalikan reponse
                $response['meta']['message'] = "Authenticated";
                $response['data'] = [
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                    'user' => $user
                ];
                return response()->json($response, $response['meta']['code']);

                //jika login gagal karena email atau password salah
            } else {
                $response['meta']['code'] = 400;
                $response['meta']['status'] = 'error';
                $response['meta']['message'] = "Authentification failed";  
                return response()->json($response, $response['meta']['code']);
            }

        //jika terjadi kesalahan saat login karena server error
        } catch (Exception $error) {
            $response['meta']['code'] = 500;
            $response['meta']['status'] = $error;
            $response['meta']['message'] = "Something went wrong";
            return response()->json($response, $response['meta']['code']);
        
        }
    }

    public function register(Request $request)
    {

        //menyiapkan data response
        $response = [
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => null,
            ],
            'data' => null,
        ];

        //mencoba untuk register
        try {

            //menyipakan validasi
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'min:3']
            ]);


            //cek apakah data tidak sesuai dengan aturan validasi
            if ($validator->fails()) {
                $response['meta']['code'] = 400;
                $response['meta']['status'] = 'error';
                $response['meta']['message'] = $validator->errors()->first();
                return response()->json($response, $response['meta']['code']);
            }

            //mebuat user baru
            $user = User::create([
                'nama' => $request->name,
                'email' => $request->email,
                'role' => 'user',
                'password' => Hash::make($request->password)
            ]);

            //mengembalikan data response
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            $response['meta']['message'] = "Authenticated";
            $response['data'] = [
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ];
            return response()->json($response, $response['meta']['code']);

        //jika terjadi kesalahan saat login karena server error
        } catch (Exception $error) {
            $response['meta']['code'] = 500;
            $response['meta']['status'] = $error;
            $response['meta']['message'] = "Something went wrong";
            return response()->json($response, $response['meta']['code']);
        }
    }

    public function logout(Request $request)
    {   
        $token = $request->user()->currentAccessToken()->delete();
        $response = [
            'meta' => [
                'code' => 200,
                'status' => 'success',
                'message' => null,
            ],
            'data' => $token,
        ];

        return response()->json($response, $response['meta']['code']);
    }
}