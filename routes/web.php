<?php

use App\Http\Controllers\Admin\BudgetController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\ContanctController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\RabController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SosmedController;
use App\Http\Controllers\Admin\SpjController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SupportController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return redirect(\route('index', 'id'));
});
//[ 'middleware' => [],'prefix'=>'admin' ]
//Route::name('admin.')->middleware(['auth:sanctum', 'verified'])->prefix('admin/')->group(function() {
Route::name('admin.')->prefix('admin')->middleware(['auth:sanctum', 'web', 'verified'])->group(function () {
    Route::post('/summernote-upload', [SupportController::class, 'upload'])->name('summernote_upload');
    Route::view('/dashboard', "dashboard")->name('dashboard');


//    Route::get('/user', [ UserController::class, "index" ])->name('user');
//    Route::view('/user/new', "pages.user.create")->name('user.new');
//    Route::view('/user/edit/{userId}', "pages.user.edit")->name('user.edit');
    Route::resource('content', ContentController::class);
    Route::resource('tag', TagController::class);
    Route::resource('faq', FaqController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('report', ReportController::class);
    Route::resource('campaign', CampaignController::class);
    Route::resource('partner', PartnerController::class);
    Route::resource('team', \App\Http\Controllers\Admin\TeamController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('contact', ContanctController::class);
    Route::resource('rab', RabController::class);
    Route::resource('spj', SpjController::class);
    Route::resource('budget', BudgetController::class);
    Route::resource('sosmed', SosmedController::class);
    Route::get('/download-file/{type}/{id}', function ($type,$id) {
        if ($type=='finance'){
            return response()->download(storage_path("app/public/" . \App\Models\Finance::findOrFail($id)->file));
        }else{
            return response()->download(storage_path("app/public/" . \App\Models\Budget::findOrFail($id)->file));
        }
    })->name('download');

    //    Route::middleware(['checkRole:1']){}


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
    Route::resource('user', UserController::class);

});
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}'],
    'middleware' => 'setLocale',
], function () {
    Route::get('/', [ClientController::class, "index"])->name('index');

    Route::get('/imaji-academy', [ClientController::class, "imajiAcademy"])->name('imaji-academy');
    Route::get('/pkps', function (){
        return redirect('http://pkps.imajisociopreneur.id/');
    })->name('pkps');

    Route::get('/tentang', [ClientController::class, "imajiSociopreneur"])->name('imaji-sociopreneur');

    Route::get('/blog', [ClientController::class, "blogIndex"])->name('blog.index');

//    Route::get('/blog/{slug}', [ClientController::class, "blogShow"])->name('blog.show');

    Route::get('/project', [ClientController::class, "projectIndex"])->name('project.index');
//    Route::get('/project/{slug}', [ClientController::class, "projectShow"])->name('project.show');

    Route::get('/faq', [ClientController::class, "faq"])->name('faq');

    Route::get('/event', [ClientController::class, "eventIndex"])->name('event.index');

    Route::get('/{slug}',[ClientController::class,'show'])->name('content.show');
//    Route::get('/event/{slug}', [ClientController::class, "eventShow"])->name('event.show');
    //Route::get('/kampoeng-recycle',[ClientController::class,"kampoengRecycle"])->name('kampoeng-recycle');
    Route::post('/search/', [ClientController::class, 'search'])->name('search');
    Route::post('search/', [ClientController::class, 'search'])->name('search');
});

Route::post('/contact', [ClientController::class, "contact"])->name('contact');
Route::post('/blog/{slug}/comment', [ClientController::class, "blogComment"])->name('blog.comment');
