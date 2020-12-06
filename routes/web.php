<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PageController@home')->name('page.home');

//Login
Route::post('/login', 'AuthController@login')->name('auth.login');
Route::get('/login', 'PageController@login')->name('page.login');

//Logout
Route::get('/logout', 'AuthController@logout')->name('auth.logout');

//Register
Route::post('/register', 'AuthController@register')->name('auth.register');
Route::get('/register', 'PageController@register')->name('page.register');

//Personal Activity
//Daily
Route::get('/dailyActivities', 'PageController@daily')->name('page.daily');
//Add Daily
Route::post('/dailyAdd', 'DailyController@add')->name('daily.add');
Route::get('/dailyAdd', 'PageController@dailyAdd')->name('page.addDaily');
//Edit Daily
Route::get('/editDaily', 'PageController@editDaily')->name('page.editDaily');
Route::get('/finishEdit', 'PageController@finishEdit')->name('page.finishEdit');
Route::delete('/deleteDaily/{id}', 'DailyController@delete')->name('daily.delete');
//ToDoList
Route::post('/toDoList/{id}', 'ToDoController@finish')->name('todo.finish');
Route::delete('/toDoList/{id}', 'ToDoController@delete')->name('todo.delete');
Route::get('/toDoList', 'PageController@toDoList')->name('page.toDo');
//Add ToDoList
Route::post('/toDoAdd', 'ToDoController@add')->name('todo.add');
Route::get('/toDoAdd', 'PageController@toDoAdd')->name('page.addToDo');

//Teams - Boards
Route::get('/boards', 'PageController@toBoards')->name('boards.team');
