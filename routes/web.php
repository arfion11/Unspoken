<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannedPost;
use App\Http\Controllers\BannedUser;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\myBlogController;
use App\Http\Controllers\PostinganOrangController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TemaGamesController;
use App\Http\Controllers\TemaLivesController;
use App\Http\Controllers\TemaSportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GlobalBlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/GlobalBlog', [GlobalBlogController::class, 'index'])->name('dashboard.globalPost');
// Route::get('/dashboard', function () {
//     return view('dashboard.globalPost');
// })->middleware(['auth', 'verified'])->name('dashboard.globalPost');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    route::get('/GlobalBlog', [GlobalBlogController::class, 'index'])->middleware(['auth', 'user'])->name('dashboard.globalPost');
    route::get('/Lives', [TemaLivesController::class, 'index'])->name('tema.temaLives');
    route::get('/Sport', [TemaSportController::class, 'index'])->name('tema.temaSport');
    route::get('/Games', [TemaGamesController::class, 'index'])->name('tema.temaGames');
    route::get('/Postingan/{id_post}', [GlobalBlogController::class, 'show'])->middleware(['auth', 'verified'])->name('postingan.postinganOrang');
    route::post('/Postingan/{id}', [KomentarController::class, 'store'])->middleware(['auth', 'verified'])->name('postingan.postinganOrang.store');

    // route::post('/postinganSaved/{id_crt}', [PostinganOrangController::class, 'store'])->name('postingan.liked');

    Route::post('/postingan/{postingan_id}/like', [PostinganOrangController::class, 'like']);
    Route::delete('/postingan/{postingan_id}/unlike', [PostinganOrangController::class, 'unlike']);
    Route::post('/postingan/{postingan_id}/toggle-like', [PostinganOrangController::class, 'toggleLike']);

    Route::get('/Story/create', [StoryController::class, 'create'])->name('story.createStory');
    Route::post('/Story/store', [StoryController::class, 'store'])->name('story.store');
    Route::delete('/Story/{cerita}', [StoryController::class, 'destroy'])->name('story.delete');

    Route::get('/myBlog', [myBlogController::class, 'index'])->name('myBlog.myBlog');
    Route::get('/dashboardAdmin', [AdminController::class, 'index'])->middleware(['auth', 'admin'])->name('dashboard.dashboardAdmin');
    Route::get('/BannedPost', [BannedPost::class, 'index'])->middleware(['auth', 'admin'])->name('dashboard.bannedPost');
    Route::get('/BannedUser', [BannedUser::class, 'index'])->middleware(['auth', 'admin'])->name('dashboard.bannedUser');
    Route::delete('/admin/{user}/banned', [AdminController::class, 'destroyUser'])->middleware(['auth', 'admin'])->name('admin.users.delete');
    Route::post('/cerita/{cerita}/banned', [AdminController::class, 'destroyPost'])->middleware(['auth', 'admin'])->name('story.banned');

    Route::get('/drafts', [DraftController::class, 'showDrafts'])->name('drafts.index');
    Route::get('/drafts/create', [DraftController::class, 'createDraft'])->name('drafts.create');
    Route::get('/drafts/{draft}', [DraftController::class, 'show'])->name('drafts.show');
    Route::get('/drafts/{draft}/edit', [DraftController::class, 'editDraft'])->name('drafts.edit');
    Route::put('/drafts/{draft}', [DraftController::class, 'updateDraft'])->name('drafts.update');
    Route::delete('/drafts/{draft}', [DraftController::class, 'deleteDraft'])->name('drafts.delete');
    Route::post('/drafts/{draft}/publish', [StoryController::class, 'publishDraft'])->name('drafts.publish');

    // Route::get('/transaksiView/{transaction}', [TransactionController::class, 'show'])->middleware(['auth', 'verified'])->name('transaksiTampil');
    // route::post('/GlobalPostStore', [GlobalBlogController::class, 'store'])->name('dashboard.globalPost.post');
});

require __DIR__ . '/auth.php';
