<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['middleware' => ['cors']], function () {

    /*Clientes*/

    Route::get('clientes','ClientesController@lista');

    Route::get('clientes/{razSoc}','ClientesController@porRazSoc');

    /**/

    /**Contactos */

    Route::get('contactos','ContactosController@lista');

    Route::get('contactos/codigo/{cotCod}','ContactosController@porCotCod');

    Route::get('contactos/list','ContactosController@porPagina');

    Route::get('contactos/nombre/{nombre}','ContactosController@porNombre');

    Route::get('contactos/empresa/{cliRazSoc}','ContactosController@porEmpresa');

    Route::get('contactos/empresa/cliCod/{cliCod}','ContactosController@porCliCod');
    
    Route::post('contactos/altaContacto','ContactosController@altaContacto');

    Route::post('contactos/modiContacto','ContactosController@modiContacto');

    /**/

    /**Tickets**/

    Route::get('tickets/sinCerrar', 'TicketsController@listadoSinCerrar');

    Route::get('tickets/{id}', 'TicketsController@porId');
});


