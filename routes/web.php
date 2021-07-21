<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\skillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminHomeController;

// use  App\Models\cat;

use Illuminate\Foundation\Auth\EmailVerificationRequest;

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// $cats=cat::get("name");

// sending msg
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect(url("/"));
})->middleware(['auth', 'signed'])->name('verification.verify');

// resending meg
Route::get('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return redirect(url("SkillsHub/Dashboard/Admins"))->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');




Route::get('/', function () {
    return view('welcome');
});

Route::get('/SkillsHubMaster', function () {
    return view('master.master');
});

Route::get('/SkillsHub', [skillController::class,'master']);
Route::get('/SkillsHub/home',[skillController::class,'home']);

Route::get('/SkillsHub/contact', function () {
    return view('pages.contact');
});
Route::post('/SkillsHub/fillcontact', [skillController::class,'FillContact']);
Route::get('/SkillsHub/login', function () {
    return view('pages.login');
})->name('login');

Route::get('/SkillsHub/register', function () {
    return view('pages.register');
});

Route::get('/SkillsHub/category/show/{id}', [skillController::class,'category']);

Route::get('/SkillsHub/skill/show/{id}', [skillController::class,'skill']);
Route::get('/SkillsHub/exam/show/{id}', [skillController::class,'exam']);
Route::get('/SkillsHub/exam/questions/{id}', [skillController::class,'exam_questions'])->middleware("auth");

Route::post('/SkillsHub/SignUp', [userController::class,'register']);
Route::post('/SkillsHub/SignIn', [userController::class,'login']);
Route::get('/SkillsHub/logout', [userController::class,'logout']);

Route::post('/SkillsHub/exam/start/{id}', [skillController::class,'exam_start'])->middleware("auth" ,'CanEnterExam');
Route::post('/SkillsHub/exam/submit/{id}', [skillController::class,'exam_submit'])->middleware("auth");

Route::get('/SkillsHub/Profile', [ProfileController::class,'index'])->middleware("student");

//Dashboard
Route::prefix('/SkillsHub/Dashboard')->middleware(['admin',"auth"])->group(function () {
    
    Route::get('/', [AdminHomeController::class, 'Dashboard']);

    Route::get('/Categories', [AdminHomeController::class, 'Categories']);
    Route::post('/Categories/store', [AdminHomeController::class, 'addCategories']);
    Route::post('/Categories/update', [AdminHomeController::class, 'updateCategories']);
    Route::get('/Categories/ActiveToggle/{cat}', [AdminHomeController::class, 'ActiveToggle']); 
    Route::get('/Categories/Delete/{cat}', [AdminHomeController::class, 'DeleteCategories']);

    Route::get('/Skills', [AdminHomeController::class, 'Skills']);
    Route::post('/Skills/store', [AdminHomeController::class, 'addSkills']);
    Route::post('/Skills/update', [AdminHomeController::class, 'updateSkills']);
    Route::get('/Skills/ActiveToggleSkill/{skill}', [AdminHomeController::class, 'ActiveToggleSkill']); 
    Route::get('/Skills/Delete/{skill}', [AdminHomeController::class, 'DeleteSkills']);

    Route::get('/Exams', [AdminHomeController::class, 'Exam']);
    Route::get('/Exams/show/{exam}', [AdminHomeController::class, 'show']);
    Route::get('/Exams/show/{exam}/Question', [AdminHomeController::class, 'showQuestion']);
    Route::get('/Exams/create', [AdminHomeController::class, 'Create']);
    Route::post('/Exams/store', [AdminHomeController::class, 'store']);
    Route::get('/Exams/createQuestion/{exam}', [AdminHomeController::class, 'createQuestion']);
    Route::post('/Exams/storeQuestion/{exam}', [AdminHomeController::class, 'storeQuestion']);
    Route::get('/Exams/Edit/{exam}', [AdminHomeController::class, 'EditExam']);
    Route::post('/Exams/update/{exam}', [AdminHomeController::class, 'updateExam']);
    Route::get('/Exams/Edit/Question/{exam}/{ques}', [AdminHomeController::class, 'EditQuestion']);
    Route::post('/Exams/updateQuestion/{exam}/{ques}', [AdminHomeController::class, 'updateQuestion']);
    Route::get('/Exams/ActiveToggleExam/{exam}', [AdminHomeController::class, 'ActiveToggleExam']); 
    Route::get('/Exams/Delete/{exam}', [AdminHomeController::class, 'DeleteExam']);

    Route::get('/Students', [AdminHomeController::class, 'Students']); 
    Route::get('/Student/showScore/{student}', [AdminHomeController::class, 'showScore']);
    Route::get('/Student/ActiveToggleStudentExam/{student}/{exam}', [AdminHomeController::class, 'ActiveToggleStudentExam']); 

    Route::middleware(['auth', 'superadmin'])->group(function () {
        Route::get('/Admins', [AdminHomeController::class, 'Admins']);  
        Route::get('/Admins/create', [AdminHomeController::class, 'CreateAdmin']);  
        Route::post('/Admins/store', [AdminHomeController::class, 'StoreAdmin']);  
        Route::get('/AdminsToggle/{id}', [AdminHomeController::class, 'AdminsToggle']); 
        Route::get('/Admins/Delete/{admin}', [AdminHomeController::class, 'DeleteAdmin']);
    });

    Route::get('/Contacts', [AdminHomeController::class, 'Contacts']); 
    Route::get('/ReplayMessages/{msg}', [AdminHomeController::class, 'ReplayMessages']); 
    Route::post('/Message/Responde/{msg}', [AdminHomeController::class, 'SendMail']); 
    
});
