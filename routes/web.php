<?php

use App\Http\Controllers\AspectController;
use App\Http\Controllers\AspectsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;
use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Support\Facades\Route;
use Laravel\Jetstream\Http\Controllers\CurrentTeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\ApiTokenController;
use Laravel\Jetstream\Http\Controllers\Livewire\TeamController;
use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;
use Laravel\Jetstream\Jetstream;

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


Route::get('/dashboard', function () {
    return redirect(route('admin.dashboard'));
});

Route::get('/', function () {
    return redirect(route('register'));
});

Route::name('admin.')->prefix('admin')->middleware(['auth:sanctum', 'web', 'verified'])->group(function () {
    Route::post('/summernote-upload', [SupportController::class, 'upload'])->name('summernote_upload');
    Route::view('/dashboard', "dashboard")->name('dashboard');

    Route::get('/start-exam-psikotest', function () {
        if (UserAnswer::whereUserId(auth()->id())->get()->count() == 0) {
            foreach (Question::get() as $q) {
                UserAnswer::create(['user_id' => auth()->id(), 'question_id' => $q->id]);
            }
        }
        return view('exam');
    })->name('exam.psikotest');

    Route::get('/start-exam-calistung', function () {
        if (UserAnswer::whereUserId(auth()->id())->get()->count() == 0) {
            foreach (Question::get()->where  as $q) {
                UserAnswer::create(['user_id' => auth()->id(), 'question_id' => $q->id]);
            }
        }
        return view('exam');
    })->name('exam.calistung');


    Route::resource('aspect', AspectController::class)->only(['index', 'create', 'edit']);
    Route::resource('question', QuestionController::class)->only(['index', 'create', 'edit']);

    Route::get('/user', [UserController::class, "index"])->name('user');
    Route::view('/user/new', "pages.user.create")->name('user.new');
    Route::view('/user/edit/{userId}', "pages.user.edit")->name('user.edit');


    Route::group(['middleware' => config('jetstream.middleware', ['web'])], function () {
        Route::group(['middleware' => ['auth', 'verified']], function () {
            // User & Profile...
            Route::get('/user/profile', [UserProfileController::class, 'show'])
                ->name('profile.show');

            // API...
            if (Jetstream::hasApiFeatures()) {
                Route::get('/user/api-tokens', [ApiTokenController::class, 'index'])->name('api-tokens.index');
            }

            // Teams...
            if (Jetstream::hasTeamFeatures()) {
                Route::get('/teams/create', [TeamController::class, 'create'])->name('teams.create');
                Route::get('/teams/{team}', [TeamController::class, 'show'])->name('teams.show');
                Route::put('/current-team', [CurrentTeamController::class, 'update'])->name('current-team.update');
            }
        });
    });

});
