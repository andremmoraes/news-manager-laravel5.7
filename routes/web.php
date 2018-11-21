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

// Group
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {
        // Painel de administração
        Route::get('/painel', 'PainelNewsController@index')->name('admin.painel.index');

        // Dashboard
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard.index');

        /**
         / Gerenciar Usuários
        */

        // Lista de usuários
        Route::get('/users/list', 'UsersController@index')->name('admin.user.index')->middleware('permission.admin');
        // Adicionar Usuário
        Route::get('/add/user', 'UsersController@create')->name('admin.user.create')->middleware('permission.admin');
        // Inserir no Banco de Dados o Usuário
        Route::post('/user/success', 'UsersController@store')->name('admin.user.store')->middleware('permission.admin');
        // Form Edit usuário
        Route::get('/user/edit/{id}', 'UsersController@edit')->name('admin.user.edit')->middleware('permission.admin');
        // Update Edit usuário
        Route::put('/user/update/{id}', 'UsersController@update')->name('admin.user.update')->middleware('permission.admin');
        // Deletar Usuário
        Route::delete('/user/delete/{id}', 'UsersController@destroy')->name('admin.user.delete')->middleware('permission.admin');

        /**
         / Gerenciar Notícias
         */
        // Lista de notícias
        Route::get('/news/list', 'NewsController@index')->name('admin.news.list');
        // Adicionar Usuário
        Route::get('/add/news', 'NewsController@create')->name('admin.news.create');
        // Inserir no Banco de Dados a Notícia
        Route::post('/news/success', 'NewsController@store')->name('admin.news.store');
        // Deletar notícia
        Route::delete('/news/delete/{id}', 'NewsController@destroy')->name('admin.news.delete');
        // Form Edit usuário
        Route::get('/news/edit/{id}', 'NewsController@edit')->name('admin.news.edit');
        // Update Edit notícia
        Route::put('/news/update/{id}', 'NewsController@update')->name('admin.news.update');
    });
});

// Authentication Routes
Auth::routes();

// Sistema de Visualizações
Route::group(['middleware' => ['web']], function () {
    return App\Http\Controllers\VisitsDashboardController::views();
});

// Home da Listagem das noticias
Route::get('/', 'ListaNewsController@index')->name('app.list');

// Editar seu perfil
Route::get('perfil', 'PainelNewsController@perfil')->name('editar.perfil');
Route::put('perfil/update/{id}', 'PainelNewsController@update_perfil')->name('editar.perfil.update');

// View notícia
Route::get('/view/{id}-{slug}', 'ListaNewsController@show')->name('news.list');

// Procurar noticia
Route::post('news/search', 'ListaNewsController@searchNews')->name('search.list');

// Página de contato
Route::get('contato', 'ContatoController@index')->name('contato.index');
Route::post('contato', 'ContatoController@mail')->name('contato.email');
