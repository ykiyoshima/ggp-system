<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\SpeakerController;
use App\Models\Season;
use App\Models\Score;
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

Route::resource('/season', SeasonController::class);
Route::resource('/review', ReviewController::class);
Route::post('/prepare', [ReviewController::class, 'prepare']);

Route::get('/', function () {
    return view('index');
});
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/rank', [ReviewController::class, 'list']);
Route::get('/comment', function () {
    $seasons = Season::getAllOrderBySeasonName();
    $scoreParts = Score::getPartsOrderByTotalScore();
    $eachScores = Score::getEachScore();
    return view('comment', [
        'seasons' => $seasons,
        'scoreParts' => $scoreParts,
        'eachScores' => $eachScores
    ]);
});
Route::get('/ggp_admin', function () {
    return view('admin', [
        'message' => ''
    ]);
});
Route::post('/ggp_admin_login', function (Request $request) {
    if ($request->password === 'ggp') {
        return view('admin_menu');
    } else {
        return view('admin', [
            'message' => 'パスワードが間違っています'
        ]);
    }
});
Route::get('/result', function () {
    $seasons = Season::getAllOrderBySeasonName();
    return view('result', [
        'seasons' => $seasons
    ]);
});
Route::post('/result', function (Request $request) {
    $scores = Score::getPartsOrderByTotalScore();
    $target_season_name = $request->season;
    return view('result_announce', [
        'scores' => $scores,
        'target_season_name' => $target_season_name
    ]);
});
Route::post('/season_result', function (Request $request) {
    $scores = Score::getPartsOrderByTotalScore();
    $target_season_name = $request->target_season_name;
    return view('season_result_announce', [
        'scores' => $scores,
        'target_season_name' => $target_season_name
    ]);
});
Route::post('/total_result', function (Request $request) {
    $scores = Score::getPartsOrderByTotalScore();
    $target_season_name = $request->target_season_name;
    return view('total_result_announce', [
        'scores' => $scores,
        'target_season_name' => $target_season_name
    ]);
});
Route::get('/admin_menu', function () {
    return view('admin_menu');
});
Route::get('/season_manage', function () {
    $seasons = Season::getAllOrderBySeasonName();
    return view('season_manage', [
        'seasons' => $seasons
    ]);
});
Route::get('/season_make', function () {
    return view('season_make');
});
Route::post('/season_make', function (Request $request) {
    $result = Season::create($request->except(['_token']));
    return view('season_manage');
});
