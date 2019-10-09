<?php

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

Route::get('/', function () {
    return redirect('control/category');
});

Route::prefix('control')->group(function(){

    Route::get('', function(){
        return redirect('control/category');
    });

    Route::prefix('category')->group(function(){
        Route::get('create', 'CategoryController@create')->name('category.create');
        Route::get('', 'CategoryController@index')->name('category.index');
        Route::get('destroy/{category}', 'CategoryController@destroy')->name('category.destroy');
        Route::post('store', 'CategoryController@store')->name('category.store');
        Route::get('edit/{category}', 'CategoryController@edit')->name('category.edit');
        Route::post('update/{category}', 'CategoryController@update')->name('category.update');
    });


    Route::prefix('question')->group(function(){
        Route::get('', 'QuestionController@index')->name('question.index');
        Route::get('show/{question}', 'QuestionController@show')->name('question.show');
        Route::get('create', 'QuestionController@create')->name('question.create');
        Route::post('store', 'QuestionController@store')->name('question.store');
        Route::get('edit/{question}', 'QuestionController@edit')->name('question.edit');
        Route::post('update/{question}', 'QuestionController@update')->name('question.update');
        Route::get('destroy/{question}', 'QuestionController@destroy')->name('question.destroy');
    });

    Route::prefix('answer')->group(function(){
        Route::get('{question}', 'AnswerController@index')->name('answer.index');
    });

    Route::prefix('exam')->group(function(){
        Route::get('', 'ExamController@index')->name('exam.index');
        Route::get('show/{exam}', 'ExamController@show')->name('exam.show');
        Route::get('create', 'ExamController@create')->name('exam.create');
        Route::post('store', 'ExamController@store')->name('exam.store');
        Route::get('edit/{exam}', 'ExamController@edit')->name('exam.edit');
        Route::post('update/{exam}', 'ExamController@update')->name('exam.update');
        Route::get('destroy/{exam}', 'ExamController@destroy')->name('exam.destroy');
    });


});

Route::get('register', 'GuestController@create')->name('guest.create');
Route::post('store', 'GuestController@store')->name('guest.store');


Route::get('exam/enroll/{exam}', 'ExamController@enroll')->name('exam.enroll');

