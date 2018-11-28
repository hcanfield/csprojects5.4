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
    return view('welcome');
});

Route::get('sponsor/dashboard', 'Dashboard\DashboardController@getSponsorDashboard');
Route::get('student/dashboard', 'Dashboard\DashboardController@getStudentDashboard');


Route::get('/user/{username}', 'Profile\UsersController@getProfile');

Route::get('project', 'Project\ProjectController@getProjects');



//CAS Authentication
Route::get('auth/login', 'Auth\AuthController@CASLogin');
Route::get('auth/logout', 'Auth\AuthController@Logout');
Route::get('auth/caslogout', 'Auth\AuthController@CASLogout');


// Normal Authenticiation
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@putLogin');
Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@putRegister');

// handle user profile updates
Route::post('/user', 'Profile\UsersController@putUpdateUser');
Route::post('/user/{id}/resume', 'Profile\UsersController@putResume');

// change to /user/edit
Route::get('editProfile', 'Profile\UsersController@getUpdateUser');
Route::post('/avatar', 'Profile\UsersController@update_avatar');

// handle sponsor projects
Route::post('/project', 'Project\ProjectController@putProject');
Route::post('/project/edit', 'Project\ProjectController@updateProject');

Route::get('/project/{project_id}/user/{user_id}', 'Project\ProjectController@putBids');
// to add a new project
Route::get('addProject', 'Project\ProjectController@getProject');
// to edit an existing project
Route::get('/project/{id}/edit', 'Project\ProjectController@getUpdateProject');
// user favorites controller
Route::get('/project/{id}/favorite', 'Project\ProjectController@UpdateFavorite');
// user bids controller
Route::get('/project/{id}/bid', 'Project\ProjectController@UpdateBid');


// handle admin page
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/admin/projects', 'Admin\AdminController@getProjects');
Route::get('/admin/users', 'Admin\AdminController@getUsers');
Route::get('/admin/project/{id}/archive', 'Admin\AdminController@archiveProject');
Route::get('admin/user/{id}/reset/password', 'Admin\AdminController@reset_password');
Route::post('admin/user/{id}/reset/password', 'Admin\AdminController@put_reset_password');

// handle sorting projects
Route::get('/project/sort/name', 'Project\ProjectController@sortby_name');
Route::get('/project/sort/date', 'Project\ProjectController@sortby_date');
Route::get('/project/sort/status', 'Project\ProjectController@sortby_status');