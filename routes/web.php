<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResourceController;

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

Route::group(['middleware' => 'auth'], function() {
   
    Route::get('/', [DisplayController::class,'index']);
    Route::resource('/', 'ResourceController');

    Route::get('/new_post',[RegistrationController::class, 'newPostForm'])->name('new.post');
    Route::get('/post/{post}/detail', [DisplayController::class, 'postDetail'])->name('post.detail');
    
    Route::get('/my_user',[DisplayController::class, 'myUser'])->name('my.user');
    Route::get('/my_bookmark',[DisplayController::class, 'myBookmark'])->name('my.bookmark');
    
    Route::get('/user/{user}/other_user',[DisplayController::class, 'otherUser'])->name('other.user');

    Route::get('/user_edit',[RegistrationController::class, 'userEditForm'])->name('user.edit');
    Route::post('/user_edit',[RegistrationController::class, 'userEdit']);
    Route::get('/user_delete_form',[RegistrationController::class, 'userDeleteForm'])->name('user.delete.form');
    Route::get('/user_delete',[RegistrationController::class, 'userDelete'])->name('user.delete');

    Route::get('/user_list',[RegistrationController::class, 'userListForm'])->name('user.list');
    Route::get('/user/{user}/stop',[RegistrationController::class, 'userStop'])->name('user.stop');

    Route::get('/post/{post}/comment',[RegistrationController::class, 'postCommnetForm'])->name('post.comment');
    Route::post('/post/{post}/comment',[RegistrationController::class, 'postComment']);
    Route::get('/post/{post}/bookmark',[RegistrationController::class, 'postBookmarkForm'])->name('post.bookmark');
    Route::post('/post/{post}/bookmark',[RegistrationController::class, 'postBookmark']);
    Route::get('/post/{post}/violation',[RegistrationController::class, 'postViolationForm'])->name('post.violation');
    Route::post('/post/{post}/violation',[RegistrationController::class, 'postViolation']);
    Route::get('/post/{post}/hidden',[RegistrationController::class, 'postHiddenForm'])->name('post.hidden');
    Route::post('post/{post}/hidden',[RegistrationController::class, 'postHidden']);

Route::group(['middleware' => 'can:view,post'], function(){

    Route::get('/post/{post}/edit',[RegistrationController::class, 'postEditForm'])->name('post.edit');
    Route::post('post/{post}/edit',[RegistrationController::class, 'postEdit']);
    Route::get('post/{post}/delete',[RegistrationController::class, 'postDeleteForm'])->name('post.delete');
    
});

});


