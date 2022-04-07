<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('anasayfa', [App\Http\Controllers\MainController::class, 'dashboard'])->name('dashboard');
    Route::get('quiz/detay/{slug}', [App\Http\Controllers\MainController::class, 'quiz_detail'])->name('quiz.detail');
    Route::get('quiz/{slug}', [App\Http\Controllers\MainController::class, 'quiz'])->name('quiz.join');
    Route::post('quiz/{slug}/result', [App\Http\Controllers\MainController::class, 'result'])->name('quiz.result');
});

//admin işlemlerini middleware içinde
Route::group(['middleware'=> ['auth','isAdmin'], 'prefix' => 'admin'], function() {
    Route::resource('quizzes', App\Http\Controllers\Admin\QuizController::class);
    Route::get('quizzes/{id}/details',[QuizController::class, 'show'])->whereNumber('id')->name('quizzes.details');
    Route::resource('quiz/{quiz_id}/questions', App\Http\Controllers\Admin\QuestionController::class);
    
});
    
    
