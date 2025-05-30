<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/loginform', [AdminController::class, 'loginForm'])->name('admin.loginForm');
Route::post('/admin/loginsubmit', [AdminController::class, 'login'])->name('admin.loginsubmit');



Route::middleware(['roles:Admin_User'])->prefix('admin')->group(function () {
    Route::get('/test', [AdminController::class, 'test'])->name('admin.test');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    // for category
    Route::get('/categories', [AdminController::class, 'categoryLists'])->name('admin.categoryLists');
    Route::get('/add-category', [AdminController::class, 'addCategoryForm'])->name('admin.addCategoryForm');
    Route::post('/add-category', [AdminController::class, 'addCategory'])->name('admin.addCategory');
    Route::get('/update-category/{id}', [AdminController::class, 'updateCategoryForm'])->name('admin.updateCategoryForm');
    Route::post('/update-category/{id}', [AdminController::class, 'updateCategory'])->name('admin.updateCategory'); //update
    Route::get('/delete-category/{id}', [AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');

    // post routes
    Route::get('/post', [AdminController::class, 'postLists'])->name('admin.postLists');
    Route::get('/add-post', [AdminController::class, 'addpostForm'])->name('admin.addpostForm');
    Route::post('/add-post', [AdminController::class, 'addpost'])->name('admin.addpost');
    Route::get('/update-post/{id}', [AdminController::class, 'updatepostForm'])->name('admin.updatepostForm');
    Route::post('/update-post/{id}', [AdminController::class, 'updatepost'])->name('admin.updatepost');
    Route::get('/delete-post/{id}', [AdminController::class, 'deletepost'])->name('admin.deletepost');


    //users///

    Route::get('/user', [AdminController::class, 'addUserForm'])->name('amin.adduserform');
    Route::get('/add-user', [AdminController::class, 'addUserForm'])->name('admin.addUserForm');
    Route::post('/add-user', [AdminController::class, 'adduser'])->name('admin.adduser');
    Route::get('/user-list', [AdminController::class, 'userlist'])->name('admin.userlist');
    Route::get('/update-user/{id}', [AdminController::class, 'updateUserForm'])->name('admin.updateUserForm');
    Route::post('/update-user/{id}', [AdminController::class, 'userupdate'])->name('admin.updateUser');
    Route::get('/delete-user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
});



// Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

//     Route::get('/loginform', [AdminController::class, 'loginForm'])->name('admin.loginForm');
//     Route::post('/loginsubmit', [AdminController::class, 'login'])->name('admin.loginsubmit');
 
//     // ... other protected admin routes
// });
