<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sendpoints', function (Request $request) {
    \App\Models\Result::create([
        'username' => $request->input('username') ? $request->input('username') : 'unnamed',
        'score' => $request->input('score') ? $request->input('score') : 0,
        'event_id' => 11
    ]);

    return response()->json($request->all());
});
