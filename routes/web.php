<?php

use App\Http\Controllers\AspectsController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;
use App\Models\Aspect;
use App\Models\PretestAspect;
use App\Models\PretestQuestion;
use App\Models\PretestUserAnswer;
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
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


//    Route::get('/start-exam-psikotest', function () {
//        if (UserAnswer::whereUserId(auth()->id())->get()->count() == 0) {
//            foreach (Question::get() as $q) {
//                UserAnswer::create(['user_id' => auth()->id(), 'question_id' => $q->id]);
//            }
//        }
//        return view('exam');
//    })->name('exam.psikotest');

    Route::get('/start-exam-calistung', function () {
        if (UserAnswer::whereUserId(auth()->id())->get()->count() == 0) {
            foreach (Question::get() as $q) {
                UserAnswer::create(['user_id' => auth()->id(), 'question_id' => $q->id]);
            }
        }
        return view('exam');
    })->name('exam.calistung');

//    Route::get('/start-exam-pretest', function () {
//        if (UserAnswer::whereUserId(auth()->id())->whereHas('question',function ($q){
//                $q->whereIn('aspect_id',[1,2]);
//            })->get()->count() == 0) {
//            foreach (Question::whereNotIn('aspect_id',[1,2])->get()  as $q) {
//                UserAnswer::create(['user_id' => auth()->id(), 'question_id' => $q->id]);
//            }
//        }
//        return view('exam');
//    })->name('exam.pretest');

    Route::get('calistung', function () {
        return view('pages.calistung');
    })->name('calistung');

    Route::get('calistung/aspect', function () {
        return view('pages.aspect.index', ['aspect' => Aspect::class]);
    })->name('aspect.index');
    Route::get('calistung/aspect/create', function () {
        return view('pages.aspect.create');
    })->name('aspect.create');
    Route::get('calistung/aspect/edit/{id}', function ($id) {
        return view('pages.aspect.edit', compact('id'));
    })->name('aspect.edit');

    Route::get('calistung/question', function () {
        return view('pages.question.index', ['question' => Question::class]);
    })->name('question.index');
    Route::get('calistung/question/create', function () {
        return view('pages.question.create');
    })->name('question.create');
    Route::get('calistung/question/edit/{id}', function ($id) {
        return view('pages.question.edit', compact('id'));
    })->name('question.edit');

    Route::get('pretest/aspect', function () {
        return view('pages.pretest-aspect.index', ['pretestAspect' => PretestAspect::class]);
    })->name('pretest-aspect.index');
    Route::get('pretest/aspect/create', function () {
        return view('pages.pretest-aspect.create');
    })->name('pretest-aspect.create');
    Route::get('pretest/aspect/edit/{id}', function ($id) {
        return view('pages.pretest-aspect.edit', compact('id'));
    })->name('pretest-aspect.edit');

    Route::get('pretest/question', function () {
        return view('pages.pretest-question.index', ['question' => PretestQuestion::class]);
    })->name('pretest-question.index');
    Route::get('pretest/question/create', function () {
        return view('pages.pretest-question.create');
    })->name('pretest-question.create');
    Route::get('pretest/question/edit/{id}', function ($id) {
        return view('pages.pretest-question.edit', compact('id'));
    })->name('pretest-question.edit');

    Route::get('/start-exam-pretest/{id}', function ($id) {
        if (PretestUserAnswer::whereUserId(auth()->id())
                ->whereHas('pretestQuestion', function ($q) use ($id) {
                    $q->wherePretestAspectId($id);
                })->get()->count() == 0) {
            foreach (PretestQuestion::wherePretestAspectId($id)->get() as $q) {
                PretestUserAnswer::create([
                    'user_id' => auth()->id(), 'pretest_question_id' => $q->id
                ]);
            }
        }
        return view('pretest-exam',compact('id'));

    })->name('exam.pretest');

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
