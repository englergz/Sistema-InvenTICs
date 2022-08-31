<?php

use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersRolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\UsersPermissionsController;
use App\Http\Controllers\Admin\PhotosController;

//PagesController
//Route::get('/', [PagesController::class, 'home'])
//    ->name('pages.home');

Route::get('/pdf', function(){
    $Pdf = App::make('dompdf.wrapper');

    $Pdf->loadHTML('<h1>Test</h1>');

    return $Pdf->stream(); 
});


Route::get('/', function(){
        return view('auth.login');
    });
Route::get('nosotros', [PagesController::class, 'about'])
    ->name('pages.about');
Route::get('archivo', [PagesController::class, 'archive'])
    ->name('pages.archive');
Route::get('contacto', [PagesController::class, 'contact'])
    ->name('pages.contact');
//Rutas publicas
Route::get('blog/{post}', [App\Http\Controllers\PostsController::class, 'show'])
    ->name('posts.show');
Route::get('categorias/{category}', [App\Http\Controllers\CategoriesController::class, 'show'])
    ->name('categories.show');
Route::get('tags/{tag}', [App\Http\Controllers\TagsController::class, 'show'])
    ->name('tags.show');

//Rutas con autenticación, rol y permisos
Route::group([
    "middleware" => ['auth', 'verified'] ], 
    function() {
        Route::view('/dashboard', "admin.dashboard")->name('dashboard');

        Route::get('/users/exportar', [UsersController::class,'export']);
        Route::get('/employees/exportar', [EmployeesController::class,'export']);

        Route::post('posts/{post}/photos', [PhotosController::class,'store'])->name('admin.posts.photos.store');
        Route::delete('photos/{photo}', [PhotosController::class, 'destroy'])->name('admin.photos.destroy');

        Route::resource('posts', 'Admin\PostsController', ['except' => 'show', 'as' => 'admin']);
        Route::resource('users', 'Admin\UsersController', ['as' => 'admin']);
        Route::resource('employees', 'Admin\EmployeesController', ['as' => 'admin']);
        Route::resource('roles', 'Admin\RolesController', ['except' => 'show', 'as' => 'admin']);
        Route::resource('permissions', 'Admin\PermissionsController', ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);

        Route::middleware('role:Admin')
            ->put('users/{user}/roles', [UsersRolesController::class, 'update'])
            ->name('admin.users.roles.update');

        Route::middleware('role:Admin')
            ->put('users/{user}/permissions', [UsersPermissionsController::class, 'update'])
            ->name('admin.users.permissions.update');
});