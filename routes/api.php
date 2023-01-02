<?php

use App\Models\Sale;
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

Route::get("/sales", function () {
    $sales = Sale::with(['store', 'salesType', 'employee', 'time', 'product'])->get();
    $data = [
        'message' => 'Get All Sales Data',
        'data' => $sales
    ];

    return response()->json($data, 200);
});
