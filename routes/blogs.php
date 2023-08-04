<?php


use App\Http\Kernel;
use Illuminate\Support\Facades\Route;

Route::prefix(config('varenyky.path'))->name('admin.')->middleware(resolve(Kernel::class)->getMiddlewareGroups()['web'])->group(function () {
    Route::group(['middleware' => [Authenticate::class]], function () {
        // Route::resource('/blogcategories', LanguageController::class);
        // Route::resource('/blogs', CountryController::class);
    });
});

Route::middleware(resolve(Kernel::class)->getMiddlewareGroups()['web'])->group(function () {
    // Route::get('/blog', [FrontendController::class, 'index'])->name('varenyky.blogs.index');
    // Route::get('/blogs/{slug}', [FrontendController::class, 'archive'])->name('varenyky.blogs.archive');
    // Route::get('/blogs/{category}/{slug}', [FrontendController::class, 'show'])->name('varenyky.blogs.show');
});