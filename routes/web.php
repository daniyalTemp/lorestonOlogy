<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', 'App\Http\Controllers\front\homePageController@home')->name('home');

Route::get('/login', 'App\Http\Controllers\front\userController@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\front\userController@logout')->name('logout');
Route::post('/login', 'App\Http\Controllers\front\userController@doLogin')->name('doLogin');


//panel
Route::prefix('panel')->middleware('auth')->namespace('App\Http\Controllers\admin')->group(function () {
    Route::get('/', 'dashboardController@index')->name('dashboard.index');

    Route::prefix('user')->group(function () {
        Route::get('/', 'userController@list')->name('dashboard.user.list');
        Route::get('/add', 'userController@add')->name('dashboard.user.add');
        Route::get('/edit/{id}', 'userController@edit')->name('dashboard.user.edit');
        Route::get('/delete/{id}', 'userController@delete')->name('dashboard.user.del');
        Route::post('/addSave/{id}', 'userController@addSave')->name('dashboard.user.addSave');
    });

    Route::prefix('contact')->group(function () {
        Route::get('/', 'contactController@list')->name('dashboard.contact.list');
        Route::get('/profile/{id}', 'contactController@showProfile')->name('dashboard.contact.showProfile');
        Route::get('/add', 'contactController@add')->name('dashboard.contact.add');
        Route::get('/edit/{id}', 'contactController@edit')->name('dashboard.contact.edit');
        Route::get('/delete/{id}', 'contactController@delete')->name('dashboard.contact.del');
        Route::post('/addSave/{id}', 'contactController@addSave')->name('dashboard.contact.addSave');
        Route::post('/import', 'contactController@import')->name('dashboard.contact.import');

        Route::prefix('types')->group(function () {
            Route::get('/', 'contactTypeConteoller@list')->name('dashboard.contact.listTypes');
            Route::get('/add', 'contactTypeConteoller@add')->name('dashboard.contact.addTypes');
            Route::get('/edit/{id}', 'contactTypeConteoller@edit')->name('dashboard.contact.editTypes');
            Route::get('/delete/{id}', 'contactTypeConteoller@delete')->name('dashboard.contact.delTypes');
            Route::post('/addSave/{id}', 'contactTypeConteoller@addSave')->name('dashboard.contact.addSaveTypes');
            Route::get('/detach/{id}/from/{userId}', 'contactTypeConteoller@detach')->name('dashboard.contact.type.detach');
            Route::get('/attach/{id}/to/{userId}', 'contactTypeConteoller@attach')->name('dashboard.contact.type.attach');
        });


        Route::prefix('education')->group(function () {
            Route::get('/add/{idUser}', 'contactController@addEducation')->name('dashboard.contact.addEducation');
            Route::get('/edit/{id}', 'contactController@editEducation')->name('dashboard.contact.editEducation');
            Route::get('/delete/{id}', 'contactController@deleteEducation')->name('dashboard.contact.delEducation');
            Route::post('/addSave/{id}', 'contactController@addSaveEducation')->name('dashboard.contact.addSaveEducation');
        });

        Route::prefix('job')->group(function () {
            Route::get('/add/{idUser}', 'contactController@addJob')->name('dashboard.contact.addJob');
            Route::get('/edit/{id}', 'contactController@editJob')->name('dashboard.contact.editJob');
            Route::get('/delete/{id}', 'contactController@deleteJob')->name('dashboard.contact.delJob');
            Route::post('/addSave/{id}', 'contactController@addSaveJob')->name('dashboard.contact.addSaveJob');
        });

    });

    Route::prefix('paper')->group(function () {
        Route::get('/', 'paperController@list')->name('dashboard.paper.list');
        Route::get('/add', 'paperController@add')->name('dashboard.paper.add');
        Route::get('/edit/{id}', 'paperController@edit')->name('dashboard.paper.edit');
        Route::get('/delete/{id}', 'paperController@delete')->name('dashboard.paper.del');
        Route::post('/addSave/{id}', 'paperController@addSave')->name('dashboard.paper.addSave');
        Route::get('/detach/{id}/from/{userId}', 'paperController@detach')->name('dashboard.paper.detach');
        Route::get('/attach/{id}/to/{userId}', 'paperController@attach')->name('dashboard.paper.attach');
        Route::post('/import', 'paperController@import')->name('dashboard.paper.import');

    });

    Route::prefix('book')->group(function () {
        Route::get('/', 'bookController@list')->name('dashboard.book.list');
        Route::get('/add', 'bookController@add')->name('dashboard.book.add');
        Route::get('/edit/{id}', 'bookController@edit')->name('dashboard.book.edit');
        Route::get('/delete/{id}', 'bookController@delete')->name('dashboard.book.del');
        Route::post('/addSave/{id}', 'bookController@addSave')->name('dashboard.book.addSave');
        Route::get('/detach/{id}/from/{userId}', 'bookController@detach')->name('dashboard.book.detach');
        Route::get('/attach/{id}/to/{userId}', 'bookController@attach')->name('dashboard.book.attach');
        Route::post('/import', 'bookController@import')->name('dashboard.book.import');

    });


    Route::prefix('document')->group(function () {
        Route::get('/', 'documentController@list')->name('dashboard.document.list');
        Route::get('/add', 'documentController@add')->name('dashboard.document.add');
        Route::get('/edit/{id}', 'documentController@edit')->name('dashboard.document.edit');
        Route::get('/delete/{id}', 'documentController@delete')->name('dashboard.document.del');
        Route::post('/addSave/{id}', 'documentController@addSave')->name('dashboard.document.addSave');
        Route::get('/detach/{id}/from/{userId}', 'documentController@detach')->name('dashboard.document.detach');
        Route::get('/attach/{id}/to/{userId}', 'documentController@attach')->name('dashboard.document.attach');
        Route::post('/import', 'documentController@import')->name('dashboard.document.import');

    });
    Route::prefix('antiquities')->group(function () {
        Route::get('/', 'antiquitieController@list')->name('dashboard.antiquities.list');
        Route::get('/add', 'antiquitieController@add')->name('dashboard.antiquities.add');
        Route::get('/edit/{id}', 'antiquitieController@edit')->name('dashboard.antiquities.edit');
        Route::get('/delete/{id}', 'antiquitieController@delete')->name('dashboard.antiquities.del');
        Route::post('/addSave/{id}', 'antiquitieController@addSave')->name('dashboard.antiquities.addSave');
        Route::get('/detach/{id}/from/{userId}', 'antiquitieController@detach')->name('dashboard.antiquities.detach');
        Route::get('/attach/{id}/to/{userId}', 'antiquitieController@attach')->name('dashboard.antiquities.attach');
        Route::post('/import', 'antiquitieController@import')->name('dashboard.antiquities.import');

        //types
        Route::prefix('types')->group(function () {
            Route::get('/', 'antiquitieController@typeList')->name('dashboard.antiquities.types.list');
            Route::get('/add', 'antiquitieController@typeAdd')->name('dashboard.antiquities.types.add');
            Route::get('/edit/{id}', 'antiquitieController@typeEdit')->name('dashboard.antiquities.types.edit');
            Route::get('/delete/{id}', 'antiquitieController@typeDelete')->name('dashboard.antiquities.types.del');
            Route::post('/addSave/{id}', 'antiquitieController@typeAddSave')->name('dashboard.antiquities.types.addSave');



        });

    });

});
