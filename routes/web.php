<?php

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth');

Route::get('/', 'SiteController@index')->name('site.home');
Route::post('/', 'SiteController@buscacarros')->name('site.buscacarros');
// Route::get('destaques', 'SiteController@destaques')->name('destaques');
// Route::resource('/', 'SiteController');
Route::post('propostas', 'SiteController@propostas')->name('site.propostas');
Route::get('destaques', 'SiteController@destaques')->name('destaques');
Route::get('detalhes/{id}', 'SiteController@detalhes')->name('detalhes');
Route::group(['prefix'=>'site', 'namespace'=>'Site'], function() {
  // Route::get('/', function() { return view('site.home'); }); 
});
Route::get('/wscarro/{id?}', 'wsController@wsCarro');

Route::get('/wsjsonparceiros/{cidade?}','wsController@wsjsonParceiros');
Route::get('/wsxmlparceiros/{cidade?}','wsController@wsxmlParceiros');


Route::group(['prefix'=>'admin', 'namespace'=>'Admin', 'middleware' => 'auth'], function() {
   	Route::resource('carros', 'CarroController');
    Route::resource('usuarios', 'UsuariosController');
   	Route::resource('marcas', 'MarcaController');
   	Route::get('propostas', 'propostaController@propostas')->name('propostas');
   	Route::get('propostas/{id}', 'propostaController@detalhes')->name('detalhes');
   	Route::post('propostas/enviaresposta', 'propostaController@enviaresposta')->name('enviaresposta');
   	Route::get('propostasgraf', 'propostaController@graficoproposta')->name('graficoproposta');
   	Route::get('carrosgraf', 'carrocontroller@graf')->
        name('carros.graf');
    Route::get('carrosdestaque/{id}', 'CarroController@destaque')->
        name('carros.destaque');
    Route::resource('parceiros', 'ParceirosController');
    Route::any('filtropdf','ParceirosController@filtro') -> name('parceiros.filtro');
    Route::post('/relParceiros/{cidade?}','ParceirosController@relParceiros') -> name('parceiros.relParceiros');
    Route::get('/wsjsonparceiros/{id?}','ParceirosController@wsjsonParceiros');
    Route::get('/wsxmlparceiros/{cidade?}','ParceirosController@wsxmlParceiros');
    Route::get('/relparceiros','ParceirosController@relParceiros');
});

//Route::get('/admin', function() {
//    return view('admin.index');
//});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



