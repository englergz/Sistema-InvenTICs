<?php

use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersRolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\EmployeesController;
use App\Http\Controllers\Admin\UsersPermissionsController;
use App\Http\Controllers\Admin\PhotosController;
use App\Http\Controllers\Admin\ActaPdfController;

Route::get('/pdf', function(){
    $Pdf = App::make('dompdf.wrapper');
    $html = view('auth.login');
    //$html
    $Pdf->loadHTML($html)->setOptions(['defaultFont' => 'sans-serif']); 

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
Route::get('posts/pdf/{post}', [PostsController::class, 'createPDF'])->name('admin.posts.productopdf');


//Rutas con autenticación, rol y permisos
Route::group([
    "middleware" => ['auth', 'verified'] ], 
    function() {
        Route::resource('/', 'Admin\AdminController', ['as' => 'admin']);

        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');

        //excel
        Route::get('/users/exportar', [UsersController::class,'export']);
        Route::get('/employees/exportar', [EmployeesController::class,'export']);
        Route::get('/posts/exportar', [PostsController::class,'export']);
        Route::get('/roles/exportar', [App\Http\Controllers\Admin\RolesController::class,'export' ]);
        Route::get('/permissions/exportar',[App\Http\Controllers\Admin\PermissionsController::class,'export' ]);
        Route::get('/trademarks/exportar', [App\Http\Controllers\Admin\TrademarksController::class,'export' ]);
        Route::get('/categories/exportar',[App\Http\Controllers\Admin\CategoriesController::class,'export' ]);
        Route::get('/tag/exportar', [App\Http\Controllers\Admin\TagsController::class,'export' ]);


        //Documento PDF y FOTO
        Route::post('posts/{post}/photos', [PhotosController::class,'store'])->name('admin.posts.photos.store');
        Route::patch('posts/{photo}', [PhotosController::class,'edit']);
        Route::delete('photos/{photo}', [PhotosController::class, 'destroy'])->name('admin.photos.destroy');
        

        Route::post('employees/{post}/', [EmployeesController::class,'updatePost'])->name('admin.employees.updatePost');

        Route::resource('posts', 'Admin\PostsController', ['except' => 'show', 'as' => 'admin']);
        Route::get('report', [PostsController::class, 'report'])->name('admin.posts.report');
        Route::post('report/getreport', [PostsController::class, 'getReport'])->name('admin.posts.getReport');

        Route::resource('users', 'Admin\UsersController', ['as' => 'admin']);
        Route::resource('employees', 'Admin\EmployeesController', ['as' => 'admin']);
        Route::resource('roles', 'Admin\RolesController', ['except' => 'show', 'as' => 'admin']);
        Route::resource('permissions', 'Admin\PermissionsController', ['only' => ['index', 'edit', 'update'], 'as' => 'admin']);
        Route::resource('trademarks', 'Admin\TrademarksController', ['as' => 'admin']);
        Route::resource('categories', 'Admin\CategoriesController', ['except' => 'show', 'as' => 'admin']);
        Route::resource('tag', 'Admin\TagsController',[ 'except' => 'show', 'as' => 'admin']);

        Route::middleware('role:Admin')
            ->put('users/{user}/roles', [UsersRolesController::class, 'update'])
            ->name('admin.users.roles.update');

        Route::middleware('role:Admin')
            ->put('users/{user}/permissions', [UsersPermissionsController::class, 'update'])
            ->name('admin.users.permissions.update');

        
});