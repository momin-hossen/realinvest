<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin as Admin;
use Illuminate\Support\Facades\Artisan;

Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
// Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard.index');

    Route::resource('blogs', Admin\BlogController::class);
    Route::resource('tags', Admin\TagController::class)->except('create', 'show', 'edit');
    Route::resource('categories', Admin\CategoryController::class)->except('create', 'show', 'edit');
    Route::resource('pages', Admin\PageController::class)->except('show');
    Route::resource('projects_plans', Admin\ProjectsPlanController::class);

    // Settings
    Route::group(['as' => 'settings.', 'prefix' => 'settings'], function () {
        Route::resource('seo', Admin\SeoController::class)->except('create', 'show');
        Route::resource('languages', Admin\LanguageController::class)->except('create', 'show');
        Route::post('language/{key}', [Admin\LanguageController::class, 'updateText'])->name('languages.text');
        Route::post('language/add-text/{key}', [Admin\LanguageController::class, 'addText'])->name('languages.add-text');

        // Menu Settiongs
        Route::resource('menu', Admin\MenuController::class);
        Route::post('/menus/destroy', [Admin\MenuController::class, 'destroy'])->name('menus.destroy');
        Route::post('menues/node', [Admin\MenuController::class, 'MenuNodeStore'])->name('menus.MenuNodeStore');
    });
});

Route::get('reset', function() {
    Artisan::call('migrate:fresh --seed');
    return back()->with('success', 'Restart');
});
