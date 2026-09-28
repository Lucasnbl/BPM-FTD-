<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreSuggestionController;
use App\Http\Controllers\BpmAdminController;
use App\Models\HomeContent;
use App\Models\Member;
use App\Models\SiteCard;

Route::get('/', function () {
    $content = HomeContent::first();

    return view('welcome', [
        'homeContent' => $content,
        'profileGroups' => collect(Member::TIERS)->map(function (array $tier, string $key) {
            return [
                ...$tier,
                'members' => Member::where('tier', $key)->orderBy('sort_order')->orderBy('id')->get(),
            ];
        }),
        'programs' => SiteCard::where('section', 'program')->orderBy('sort_order')->orderBy('id')->get(),
        'announcements' => SiteCard::where('section', 'news')->orderBy('sort_order')->orderBy('id')->get(),
    ]);
})->name('home');

Route::post('/saran', StoreSuggestionController::class)
    ->middleware('throttle:10,1')
    ->name('suggestions.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [BpmAdminController::class, 'showLogin'])->name('login');
    Route::post('/login', [BpmAdminController::class, 'login'])
        ->middleware('throttle:5,1')->name('login.submit');

    Route::middleware('bpm.admin')->group(function () {
        Route::get('/', [BpmAdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [BpmAdminController::class, 'logout'])->name('logout');
        Route::put('/beranda', [BpmAdminController::class, 'updateHomeContent'])->name('home.update');
        Route::post('/anggota', [BpmAdminController::class, 'storeMember'])->name('members.store');
        Route::get('/anggota/{member}/edit', [BpmAdminController::class, 'editMember'])->name('members.edit');
        Route::put('/anggota/{member}', [BpmAdminController::class, 'updateMember'])->name('members.update');
        Route::delete('/anggota/{member}', [BpmAdminController::class, 'destroyMember'])->name('members.destroy');
        Route::post('/konten-kartu', [BpmAdminController::class, 'storeSiteCard'])->name('cards.store');
        Route::get('/konten-kartu/{siteCard}/edit', [BpmAdminController::class, 'editSiteCard'])->name('cards.edit');
        Route::put('/konten-kartu/{siteCard}', [BpmAdminController::class, 'updateSiteCard'])->name('cards.update');
        Route::delete('/konten-kartu/{siteCard}', [BpmAdminController::class, 'destroySiteCard'])->name('cards.destroy');
    });
});
