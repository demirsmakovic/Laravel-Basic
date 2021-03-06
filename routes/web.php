<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CPassword;
use App\Models\Multipic;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $about = DB::table('home_abouts')->first();
    $images = Multipic::all();
    $services = Service::all();
    return view('home', compact('brands', 'about', 'images', 'services'));
});

//CategoryController
Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');

Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

//BrandController
Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

//Multipic
Route::get('/multi/image', [BrandController::class, 'Multipic'])->name('multi.image');
Route::post('/store/image', [BrandController::class, 'StoreImg'])->name('store.image');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = User::all();
    return view('admin.index', compact('users'));
})->name('dashboard');

Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

//HomeController
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/slider/create', [HomeController::class, 'Create'])->name('create.slider');
Route::post('/slider/store', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/delete/{id}', [HomeController::class, 'Delete']);
Route::get('/slider/edit/{id}', [HomeController::class, 'Edit']);
Route::post('/slider/update/{id}', [HomeController::class, 'Update']);


//AboutController
Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/about/create', [AboutController::class, 'Create'])->name('create.about');
Route::post('/about/store', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/delete/{id}', [AboutController::class, 'Delete']);
Route::get('/about/edit/{id}', [AboutController::class, 'Edit']);
Route::post('/about/update/{id}', [AboutController::class, 'Update']);

//PageController
Route::get('/pages/portfolio', [PageController::class, 'Portfolio'])->name('pages.portfolio');
Route::get('/pages/contact', [PageController::class, 'Contact'])->name('pages.contact');
Route::get('/pages/services', [PageController::class, 'Services'])->name('pages.services');
Route::get('/pages/about', [PageController::class, 'About'])->name('pages.about');

//ServiceController
Route::get('/service/all', [ServiceController::class, 'AllService'])->name('all.service');
Route::post('/service/store', [ServiceController::class, 'StoreService'])->name('store.service');


//ContactController
Route::get('/contact/info', [ContactController::class, 'ContactInfo'])->name('contact.info');
Route::post('/contact/add', [ContactController::class, 'AddContactInfo'])->name('contact.store');
Route::get('/contact/edit/{id}', [ContactController::class, 'Edit']);
Route::post('/contact/update/{id}', [ContactController::class, 'Update']);
Route::get('/contact/delete/{id}', [ContactController::class, 'Delete']);
Route::get('/contact/message', [ContactController::class, 'ContactMsg'])->name('contact.message');
Route::get('/contact/delete_msg/{id}', [ContactController::class, 'DeleteMessage']);
Route::post('/pages/send_msg', [ContactController::class, 'SendMessage'])->name('send.message');



//Change Profile
Route::get('/profile/change_password', [CPassword::class, 'CPassword'])->name('change.password');
Route::post('/profile/update_password', [CPassword::class, 'UpdatePassword'])->name('update.password');
Route::get('/profile/update', [CPassword::class, 'PUpdate'])->name('update.profile');
Route::post('/profile/update', [CPassword::class, 'UpdateProfile'])->name('update.profile');

