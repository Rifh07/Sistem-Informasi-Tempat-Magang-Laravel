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

// Route::get('/', function () {return redirect()->route('home');});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/', 'HomeController@searchType')->name('searchType');
Route::post('/search', 'HomeController@search')->name('search');

Route::get('/users/create-users', 'UsersController@createUsersViews')->name('createUsersViews');
Route::post('/users/create-users', 'UsersController@createUsers')->name('createUsers');

Route::get('/company', 'CompanyController@viewsCompany')->name('viewsCompany');

Route::get('/company/add', 'CompanyController@addCompanyViews')->name('addCompanyViews');
Route::post('/company/add', 'CompanyController@addCompany')->name('addCompany');

Route::get('/{id}/company/details', 'CompanyController@detailCompanyViews')->name('detailCompanyViews');
Route::post('/{id}/company/details', 'CompanyController@editCompany')->name('editCompany');

Route::get('/{id}/company/delete', 'CompanyController@deleteCompanyViews')->name('deleteCompanyViews');
Route::post('/{id}/company/delete', 'CompanyController@deleteCompany')->name('deleteCompany');

Route::get('/{id}/internship', 'CompanyController@viewsInternship')->name('viewsInternship');
Route::get('/{id}/internship/add', 'CompanyController@addInternshipViews')->name('addInternshipViews');
Route::post('/{id}/internship/add', 'CompanyController@addInternship')->name('addInternship');

Route::get('/{id}/internship/edit', 'CompanyController@editInternshipViews')->name('editInternshipViews');
Route::post('/{id}/internship/edit', 'CompanyController@editInternship')->name('editInternship');

Route::get('/{id}/internship/delete', 'CompanyController@deleteInternshipViews')->name('deleteInternshipViews');
Route::post('/{id}/internship/delete', 'CompanyController@deleteInternship')->name('deleteInternship');

Route::get('/{id}/internship/details', 'CompanyController@detailInternshipViews')->name('detailInternshipViews');
Route::post('/{id}/internship/details', 'CompanyController@applyInternship')->name('applyInternship');

Route::get('/internship/history', 'CompanyController@historyInternshipViews')->name('historyInternshipViews');

Route::get('/{id}/internship/mahasiswa', 'CompanyController@mhsInternshipViews')->name('mhsInternshipViews');
Route::get('/{id}/{mhs}/internship/mahasiswa/approve', 'CompanyController@mhsInternshipApprove')->name('mhsInternshipApprove');
Route::get('/{id}/{mhs}/internship/mahasiswa/disapprove', 'CompanyController@mhsInternshipDisapprove')->name('mhsInternshipDisapprove');
