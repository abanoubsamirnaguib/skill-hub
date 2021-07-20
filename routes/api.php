<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:sanctum')->group(function () {
    
    Route::get('Categories', [ApiController::class, 'Categories']);
    Route::get('Categories/show/{id}', [ApiController::class, 'showCat']);
    Route::get('skill/show/{id}', [ApiController::class, 'showSkill']);
    Route::get('exam/show/{id}', [ApiController::class, 'showExam']);
    Route::get('exam/showQuestion/{id}', [ApiController::class, 'showExamQuestion']);
    Route::post('exam/start/{exam_id}', [ApiController::class,'exam_start']);
    Route::post('exam/submit/{exam_id}', [ApiController::class,'exam_submit']);
    Route::get('token', [ApiController::class,'token']);

});

// ->middleware("auth");


Route::post('/SkillsHub/SignUp', [ApiController::class,'register']);
