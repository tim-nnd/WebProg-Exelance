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
//Create Team
Route::post('/createTeam', 'TeamController@createTeam')->name('team.createTeam');
Route::get('/createTeam', 'PageController@createTeam')->name('page.createTeam');
//Team Details
Route::get('/team/{id}', 'PageController@teamDetails')->name('page.teamDetails');
//Team Question
Route::post('/qna/{id}', 'TeamController@postReply')->name('team.qnaPostReply');
Route::get('/qna/{id}', 'PageController@teamQuestion')->name('page.teamQuestion');
//Team ToDo
Route::delete('/deleteTask/{id}','TeamController@deleteTask')->name('team.deleteTask');
Route::get('/finishTask/{id}','TeamController@finishTask')->name('team.finishTask');
Route::get('/teamTask/{id}','PageController@teamToDo')->name('page.teamToDo');
//Invite Member
Route::post('/invite','TeamController@invite')->name('team.invite');
Route::get('/invite','PageController@invite')->name('page.invite');
//Delete member
Route::delete('/deleteMember/{id}', 'TeamController@deleteMember')->name('team.deleteMember');
//Post Resources
Route::post('/postResources', 'TeamController@postResources')->name('team.postResources');
//Post Task
Route::post('/postTask', 'TeamController@postTask')->name('team.postTask');
//Post Question
Route::post('/postQuestion', 'TeamController@postQuestion')->name('team.postQuestion');

//Invitation
Route::get('/invitation/{id}','PageController@invitation')->name('page.invitation');
//Accept
Route::get('/acceptInvite/{id}','TeamController@accept')->name('team.accept');
//Decline
Route::get('/declineInvite/{id}','TeamController@decline')->name('team.decline');
