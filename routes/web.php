<?php

// use App\Mail\OrderShipped;
// use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Storage;

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

$adminPrefix = config('misc.admin-prefix');

// Route::get('/', function () {
//     return view('frontend/home');
// });
// Route::get('/home', function () {
//     return view('frontend/home');
// });

Route::get('/product', 'ProductsController@product');
Route::get('/about', function () {
    return view('frontend/about');
});
Route::get('/faq', 'FaqController@faq');

Route::get('/contact-us', 'ContactController@contact');
Route::post('/contact-us', 'ContactController@postContact');


Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/registration', 'FrontendController@registration');
Route::post('/registration', 'FrontendController@postRegistration');
Route::get('/pembayaran', 'FrontendController@payment');
Route::post('/payment', 'FrontendController@paymentDetail');
Route::get('/claim', 'FrontendController@claim');
Route::post('/claim', 'FrontendController@postClaim');
Route::get('/calculator', 'CalculatorsController@calculator');
Route::post('/calculator', 'CalculatorsController@calculatorResult');
Route::get('/calculators', 'CalculatorsController@index');
Route::get('/calculator/flexa', 'CalculatorsController@flexa');
Route::post('/calculator/flexa', 'CalculatorsController@flexaResult');
Route::get('/calculator/flood', 'CalculatorsController@flood');
Route::post('/calculator/flood', 'CalculatorsController@floodResult');
Route::get('/calculator/earthquake', 'CalculatorsController@earthquake');
Route::post('/calculator/earthquake', 'CalculatorsController@earthquakeResult');
Route::get('/get-zipcode', 'CalculatorsController@getZipcode');

// Route::get('/migrate/city', 'FrontendController@migrateCity');

Auth::routes();

Route::group(['prefix' => 'doku'], function () {
    Route::any('/redirect', 'PaymentsController@dokuRedirect');
    Route::any('/notify', 'PaymentsController@dokuNotify');
});

Route::group([
    'middleware' => ['auth', 'authorization'],
    'prefix' => $adminPrefix
], function () {
    Route::get('/', 'HomeController@dashboard');
    Route::get('dashboard', 'HomeController@dashboard');

    Route::get('permissions', 'PermissionsController@index')->name('permissions');
    Route::get('permissions/create', 'PermissionsController@create')->name('permissions.add');
    Route::post('permissions', 'PermissionsController@store')->name('permissions.add');
    Route::get('permissions/{permission}/edit', 'PermissionsController@edit')->name('permissions.edit');
    Route::post('permissions/{permission}/update', 'PermissionsController@update')->name('permissions.edit');
    Route::get('permissions/{permission}/delete', 'PermissionsController@destroy')->name('permissions.delete');

    Route::get('roles', 'RolesController@index')->name('roles');
    Route::get('roles/create', 'RolesController@create')->name('roles.add');
    Route::post('roles', 'RolesController@store')->name('roles.add');
    Route::get('roles/{role}/edit', 'RolesController@edit')->name('roles.edit');
    Route::post('roles/{role}/update', 'RolesController@update')->name('roles.edit');
    Route::get('roles/{role}/delete', 'RolesController@delete')->name('roles.delete');

    Route::get('users', 'UsersController@index')->name('users');
    Route::get('users/create', 'UsersController@create')->name('users.add');
    Route::post('users', 'UsersController@store')->name('users.add');
    Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit');
    Route::post('users/{user}/update', 'UsersController@update')->name('users.edit');
    Route::get('users/{user}/delete', 'UsersController@delete')->name('users.delete');

    Route::get('options', 'OptionsController@detail');
    Route::get('options/edit', 'OptionsController@edit');
    Route::post('options/update', 'OptionsController@update');

    Route::get('pages', 'PagesController@index')->name('pages');
    Route::get('pages/create', 'PagesController@create')->name('pages.add');
    Route::post('pages', 'PagesController@store')->name('pages.add');
    Route::get('pages/{post}/edit', 'PagesController@edit')->name('pages.edit');
    Route::post('pages/{post}/update', 'PagesController@update')->name('pages.edit');
    Route::get('pages/{post}/delete', 'PagesController@delete')->name('pages.delete');

    Route::get('faq', 'FaqController@index')->name('faq');
    Route::get('faq/create', 'FaqController@create')->name('faq.add');
    Route::post('faq', 'FaqController@store')->name('faq.add');
    Route::get('faq/{post}/edit', 'FaqController@edit')->name('faq.edit');
    Route::post('faq/{post}/update', 'FaqController@update')->name('faq.edit');
    Route::get('faq/{post}/delete', 'FaqController@delete')->name('faq.delete');

    Route::get('product', 'ProductsController@index')->name('product');
    Route::get('product/create', 'ProductsController@create')->name('product.add');
    Route::post('product', 'ProductsController@store')->name('product.add');
    Route::get('product/{post}/edit', 'ProductsController@edit')->name('product.edit');
    Route::post('product/{post}/update', 'ProductsController@update')->name('product.edit');
    Route::get('product/{post}/delete', 'ProductsController@delete')->name('product.delete');

    Route::get('sliders', 'SlidersController@index')->name('sliders');
    Route::get('sliders/create', 'SlidersController@create')->name('sliders.add');
    Route::post('sliders', 'SlidersController@store')->name('sliders.add');
    Route::get('sliders/{post}/edit', 'SlidersController@edit')->name('sliders.edit');
    Route::post('sliders/{post}/update', 'SlidersController@update')->name('sliders.edit');
    Route::get('sliders/{post}/delete', 'SlidersController@delete')->name('sliders.delete');

    Route::get('categories/{postType}', 'CategoriesController@index')->name('categories');
    Route::get('categories/{postType}/create', 'CategoriesController@create')->name('categories.add');
    Route::post('categories/{postType}', 'CategoriesController@store')->name('categories.add');
    Route::get('categories/{postType}/{category}/edit', 'CategoriesController@edit')->name('categories.edit');
    Route::post('categories/{postType}/{category}/update', 'CategoriesController@update')->name('categories.edit');
    Route::get('categories/{postType}/{category}/delete', 'CategoriesController@delete')->name('categories.delete');

    Route::get('posts', 'PostsController@index')->name('posts');
    Route::get('posts/create', 'PostsController@create')->name('posts.add');
    Route::post('posts', 'PostsController@store')->name('posts.add');
    Route::get('posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
    Route::post('posts/{post}/update', 'PostsController@update')->name('posts.edit');
    Route::get('posts/{post}/delete', 'PostsController@delete')->name('posts.delete');

    Route::get('registrants', 'RegistrantsController@index')->name('registrants');
    Route::get('registrants/download', 'RegistrantsController@download')->name('registrants');

    Route::get('/claims', 'ClaimsController@index')->name('claims');
    
    Route::get('/contacts', 'ContactController@index')->name('contacts');
    Route::get('/contacts/download', 'ContactController@download')->name('contacts');

    Route::get('/calculators', 'CalculatorsController@index')->name('calculators');
    Route::get('/calculators/download', 'CalculatorsController@download')->name('calculators');
});

Route::group([
    'middleware' => ['auth']
], function () {
    Route::get('permissions/datatable', 'PermissionsController@datatableList')->name('permissions');
    Route::get('roles/datatable', 'RolesController@datatableList')->name('roles');
    Route::get('users/datatable', 'UsersController@datatableList')->name('users');
    Route::get('categories/{postType}/datatable', 'CategoriesController@datatableList')->name('categories');
    Route::get('posts/datatable', 'PostsController@datatableList')->name('posts');
    Route::get('pages/datatable', 'PagesController@datatableList')->name('pages');
    Route::get('faq/datatable', 'FaqController@datatableList')->name('faq');
    Route::get('product/datatable', 'ProductsController@datatableList')->name('product');
    Route::get('sliders/datatable', 'SlidersController@datatableList')->name('sliders');
    Route::get('registrant/datatable', 'RegistrantsController@datatableList')->name('registrant');
    Route::get('claim/datatable', 'ClaimsController@datatableList')->name('claim');
    Route::get('contact/datatable', 'ContactController@datatableList')->name('contacts');
    Route::get('calculator/datatable', 'CalculatorsController@datatableList')->name('calculators');

    Route::post('/tinymce/image-upload', 'MediaController@uploadImage');
    Route::get('/tinymce/get-medias', 'MediaController@getMedias');
});

Route::get('/tests/editor', function() {
    return view('tests.editor');
});
Route::get('/tinymce-image', function() {
    return view('tests.image');
});





















// Route::get('/tests/send-mail', function() {
//     dd(Mail::to('pasha_md5@yahoo.com')
//             // ->cc($moreUsers)
//             // ->bcc($evenMoreUsers)
//             ->send(new OrderShipped()));
// });

// Route::get('/home', 'HomeController@index')->name('home');


// Route::get('/client/login', function() {
//     return view('clients/login');
// });

// Route::get('/client/dashboard', function() {
//     return view('clients/dashboard');
// });


// Route::get('/tests/check-s3-storage', function() {
//     Storage::makeDirectory('newdirectory');
//     dd(Storage::exists('software_list.ods'));
// });

Route::get('/test/parse-id-date', 'TestController@parseIdDate');
