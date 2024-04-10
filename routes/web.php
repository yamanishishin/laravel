<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;

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
Auth::routes();

Route::get('main',[DisplayController::class, 'mainForm'])->name('main');
//Route::get('/pw_reset',[RegistrationController::class, 'pwresetForm'])->name('pw.reset');
//Route::get('/pw_form',[RegistrationController::class, 'pwForm'])->name('pw.form');
//Route::post('/pw_form',[RegistrationController::class, 'pwForm']);


Route::group(['middleware' => 'auth'], function() {
   
    Route::get('/', [DisplayController::class,'index']);
    


Route::get('/post/{post}/detail', [DisplayController::class, 'postDetail'])->name('post.detail');

Route::get('/my_user',[DisplayController::class, 'myUser'])->name('my.user');

Route::get('/new_post',[RegistrationController::class, 'newPostForm'])->name('new.post');
Route::post('/new_post',[RegistrationController::class, 'newPost']);


Route::get('/post_comment',[RegistrationController::class, 'postCommnetForm'])->name('post.comment');
Route::post('/post_comment',[RegistrationController::class, 'postComment']);
Route::get('/post/{post}/violation',[DisplayController::class, 'postViolationForm'])->name('post.violation');
Route::post('/post/{post}/violation',[DisplayController::class, 'postViolation']);
Route::get('/post_edit/{post}',[RegistrationController::class, 'postEditForm'])->name('post.edit');
Route::post('post_edit/{post}',[RegistrationController::class, 'postEdit']);
Route::get('post/{post}/delete',[RegistrationController::class, 'postDeleteForm'])->name('post.delete');


Route::get('/user_edit',[RegistrationController::class, 'userEditForm'])->name('user.edit');
Route::post('/user_edit',[RegistrationController::class, 'userEdit']);
Route::get('/user_delete/{id}/delete',[RegistrationController::class, 'userDeleteForm'])->name('user.delete');

});