<?php

use Illuminate\Http\Request;

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
Route::middleware(['cors'])->group(function () {
    Route::post('login', 'API\UserController@login');
    // Route::get('logout', 'API\UserController@logout');
    Route::post('register', 'API\UserController@register');
    Route::post('login/password-reset', 'API\UserController@resetPassword');
    Route::post('login/password-new', 'API\UserController@getTokenReset');
    Route::post('login/password-valid', 'API\UserController@register2');
});

Route::middleware(['cors', 'auth:api'])->group(function () {
    Route::get('logout', 'API\UserController@logout');
});



Route::get('auth-login', function (Request $request) {
   return response()->json(['error' => 'Authorization'], 401);
})->name('auth-login');

Route::middleware([ 'cors', 'auth:api'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['cors'])->prefix('file')->group(function () {
    Route::post('/uplaoad-img-base64', 'API\UploadFiles@saveFileWithBase64');
});

//user
Route::middleware(['cors'])->prefix('user')->group(function () {
    Route::post('/edit', 'API\UserController@editInformations');
});

/// contents CycleController
///->prefix('content')-


Route::middleware([ 'cors', 'auth:api'])->prefix('cycles')->group(function () {
    Route::get('/', 'API\CycleController@list');
    Route::get('/{id}', 'API\CycleController@detail');

    Route::post('/new', 'API\CycleController@store');
    Route::post('/{id}', 'API\CycleController@update');

    Route::delete('/{id}', 'API\CycleController@delete');
});

Route::middleware([ 'cors', 'auth:api'])->prefix('filieres')->group(function () {
    Route::get('/', 'API\FiliereController@list');
    Route::get('/{id}', 'API\FiliereController@detail');

    Route::post('/new', 'API\FiliereController@store');
    Route::put('/update', 'API\FiliereController@update');

    Route::delete('/{id}', 'API\FiliereController@delete');
});

Route::middleware([ 'cors', 'auth:api'])->prefix('options')->group(function () {
    Route::get('/', 'API\OptionController@list');
    Route::get('/{id}', 'API\OptionController@detail');

    Route::post('/new', 'API\OptionController@store');
    Route::put('/update', 'API\OptionController@update');

    Route::delete('/{id}', 'API\OptionController@delete');
});

Route::middleware([ 'cors', 'auth:api'])->prefix('epreuves')->group(function () {
    Route::get('/', 'API\EpreuveController@list');
    Route::get('/{id}', 'API\EpreuveController@detail');

    Route::post('/new', 'API\EpreuveController@store');
    Route::put('/update', 'API\EpreuveController@update');

    Route::delete('/{id}', 'API\EpreuveController@delete');
});

Route::middleware([ 'cors', 'auth:api'])->prefix('matieres')->group(function () {
    Route::get('/', 'API\MatiereController@list');
    Route::get('/{id}', 'API\MatiereController@detail');

    Route::post('/new', 'API\MatiereController@store');
    Route::put('/update', 'API\MatiereController@update');

    Route::delete('/{id}', 'API\MatiereController@delete');
});

Route::middleware([ 'cors', 'auth:api'])->prefix('eleves')->group(function () {
    Route::get('/', 'API\EleveController@list');
    Route::get('/{id}', 'API\EleveController@detail');

    Route::post('/new', 'API\EleveController@store');
    Route::put('/update', 'API\EleveController@update');

    Route::delete('/{id}', 'API\EleveController@delete');
});

Route::middleware([ 'cors', 'auth:api'])->prefix('anonymats')->group(function () {
    Route::get('/', 'API\AnonymatController@list');
    Route::get('/{id}', 'API\AnonymatController@detail');

    Route::post('/find/{epreuve}', 'API\AnonymatController@getAnonymats');

    Route::post('/new', 'API\AnonymatController@store');
    Route::post('/save', 'API\AnonymatController@save');
    Route::put('/update', 'API\AnonymatController@update');

    Route::delete('/{id}', 'API\AnonymatController@delete');
});

Route::middleware([ 'cors', 'auth:api'])->prefix('notes')->group(function () {
    Route::get('/', 'API\NoteController@list');
    Route::get('/{id}', 'API\NoteController@detail');

    Route::post('/new', 'API\NoteController@store');
    Route::put('/update', 'API\NoteController@update');

    Route::delete('/{id}', 'API\NoteController@delete');
});

Route::middleware([ 'cors', 'auth:api'])->prefix('roles')->group(function () {
    Route::get('/', 'API\RoleController@list');
    Route::get('/{id}', 'API\RoleController@detail');

    Route::post('/new', 'API\RoleController@store');
    Route::put('/update', 'API\RoleController@update');

    Route::delete('/{id}', 'API\RoleController@delete');
});

/*Route::middleware([ 'cors', 'auth:api'])->group(function () {
    Route::post('/upsert', 'API\ContentController@upSert');
    Route::post('/element', 'API\ContentController@addElementToContent');


    Route::get('/my/{user}', 'API\ContentController@getMyContents');
    //Route::get('/one/{id}', 'API\ContentController@getContent');
    Route::post('/like', 'API\ContentController@likeContent');
    Route::post('/follow', 'API\ContentController@followCreator');
    Route::post('/comment', 'API\ContentController@commentContent');
    Route::get('/my/like/{user}', 'API\ContentController@myLikeContents');
    Route::get('/my/follow/{user}', 'API\ContentController@myFollowContents');

    Route::delete('/element/{id}', 'API\ContentController@deleteElementToContent');
    Route::delete('/{id}', 'API\ContentController@deleteContent');
});*/
