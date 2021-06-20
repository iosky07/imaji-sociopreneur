<?php

use App\Models\Mapping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', function (Request $request) {
    $validate = Validator::make($request->all(), [
        'email' => 'required',
        'password' => 'required',
    ]);

    if ($validate->fails()) {
        $response = [
            'message' => 'harap isi email dan password',
            'errors' => null,
            'code' => 202,
        ];
        return response()->json($response, 400);
    }

    $user = User::where('email', $request->email)->first();
    if ($user == null) {
        $response = [
            'message' => 'email tidak ditemukan',
            'errors' => null,
            'code' => 202,
        ];
        return response()->json($response, 200);
    }
    if (!Hash::check($request->password, $user->password, [])) {
        $response = [
            'message' => 'password anda salah',
            'errors' => null,
            'code' => 202,
        ];
        return response()->json($response, 200);
    }
    $token = Str::random(60);
    $user->update(['remember_token' => $token]);
    $response = [
        'message' => 'Berhasil masuk',
        'errors' => null,
        'code' => 201,
        'user' => $user
    ];
    return $response;
});
Route::post('check-login', function (Request $request) {
    $user = User::whereRememberToken($request->token)->first();
    if ($user == null) {
        return [
            'message' => 'Token telah kadaluarsa',
            'errors' => null,
            'code' => 202,

        ];
    } else {
        return [
            "message" => "Selamat datang kembali",
            'errors' => null,
            'code' => 201,
            'user' => $user
        ];
    }
});
Route::post('logout', function (Request $request) {
    $user = User::whereRememberToken($request->token)
        ->update([
            "remember_token" => ""
        ]);
    return [
        "message" => "Selamat datang kembali",
        'errors' => null,
        'code' => 201,
    ];
});

//Route::middleware('api')->group(function (){
Route::get('/mapping', function () {
    return Mapping::get();
});
//});


Route::post('/mapping/store', function (Request $request) {
    Mapping::create([
        'name' => $request->name,
        'address' => $request->address,
        'phone' => $request->phone,
        'village' => $request->village,
        'district' => $request->district,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
    ]);
    return [
        'message' => 'berhasil menambahkan data',
        'code' => 201,
        'error' => ''
    ];
});

Route::post('/mapping/update', function (Request $request) {
    Mapping::find($request->id)->update([
        'name' => $request->name,
        'address' => $request->address,
        'phone' => $request->phone,
        'village' => $request->village,
        'district' => $request->district,
    ]);
    return [
        'message' => 'berhasil mengubah data',
        'code' => 201,
        'error' => ''
    ];
});

Route::post('/mapping/update/location', function (Request $request) {
    Mapping::find($request->id)->update([
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
    ]);
    return [
        'message' => 'berhasil menyesuaikan lokasi',
        'code' => 201,
        'error' => ''
    ];
});

Route::post('/mapping/update/status', function (Request $request) {
    Mapping::find($request->id)->update([
        'status' => $request->status,
    ]);
    return [
        'message' => 'berhasil mengubah status',
        'code' => 201,
        'error' => ''
    ];
});
