<?php

use App\Http\Controllers\appIpa\CategorieServer;
use App\Http\Controllers\appIpa\CityController;
use App\Http\Controllers\appIpa\ConversationController;
use App\Http\Controllers\appIpa\DemandeController;
use App\Http\Controllers\appIpa\FavoriteServer;
use App\Http\Controllers\appIpa\JobsServer;
use App\Http\Controllers\appIpa\OrderController;
use App\Http\Controllers\appIpa\PymentController;
use App\Http\Controllers\appIpa\UserServer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return "$request->user()";
});
// auth
Route::post('register', [UserServer::class, "register"]);
Route::post('login', [UserServer::class, "login"]);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::put('update', [UserServer::class, "update"]);
    Route::put('updateFcm', [UserServer::class, "updateFcm"]);
    Route::post('updatedAvatar', [UserServer::class, "updatedAvatar"]);
    Route::post('logout', [UserServer::class, "logout"]);
    Route::get('user', [UserServer::class, "user"]);
    Route::put('changeToSeller', [UserServer::class, "changeToSeller"]);

// conversation
    Route::get('conversation', [ConversationController::class, "getConversations"]);
    Route::get('messages/{id}', [ConversationController::class, "getMessages"]);
    Route::post('send', [ConversationController::class, "send"]);
    Route::post('sendDetail', [ConversationController::class, "sendDetail"]);
    Route::post('createConversation', [ConversationController::class, "createConversation"]);
    Route::post('create', [JobsServer::class, "create"]);

// Favorite
    Route::post('addToFavorite/{id}', [FavoriteServer::class, "addToFavorite"]);
    Route::delete('removeFromFavorite/{id}', [FavoriteServer::class, "removeFromFavorite"]);
// jobs
    Route::get('getDemondMyJobs', [DemandeController::class, "getDemondMyJobs"]);
    Route::get('favoriteJobs', [JobsServer::class, "MyFavoriteJobs"]);
    Route::get('getDemandes', [DemandeController::class, "getDemandes"]);
    Route::post('addDemandes', [DemandeController::class, "addDemande"]);
    Route::delete('removeDemande/{id}', [DemandeController::class, "removeDemande"]);
    Route::put('activerDemande/{id}', [DemandeController::class, "activerDemande"]);
// PymentController
    Route::post('pymentMethod', [PymentController::class, "payment"]);

// order
    Route::get('getOrders', [OrderController::class, "getOrders"]);
    Route::get('getOrdersSeller', [OrderController::class, "getOrdersSeller"]);

});
Route::get('myjobs/{id}', [JobsServer::class, "Myjobs"]);

// categories
Route::post('categorie/{id}', [JobsServer::class, "getByCategorie"]);
Route::post('shearch/{id}', [JobsServer::class, "getBySherach"]);
Route::post('filter/{id}', [JobsServer::class, "getByfilter"]);
// jobs
Route::get('jobs/{id}', [JobsServer::class, "jobs"]); // done
// get jobs
Route::get('categories', [CategorieServer::class, "categories"]);
Route::get('citys', [CityController::class, "citys"]);
Route::get('areas', [CityController::class, "areas"]);
Route::get('subcategories', [CategorieServer::class, "subcategories"]);
Route::post('sendNotification', [CityController::class, "sendNotification"]);
