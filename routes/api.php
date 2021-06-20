<?php

use App\Models\Mapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
