<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=>'income_transaction'], function() use ($router){
    $router->get('/', 'IncomeTransactionController@index');
    $router->post('/store', 'IncomeTransactionController@store');
    $router->patch('/{id}/update', 'IncomeTransactionController@update');
    $router->delete('/{id}/delete', 'IncomeTransactionController@destroy');
});

$router->group(['prefix'=>'funding'], function() use ($router){
    $router->get('/', 'FundingController@index');
    $router->post('/store', 'FundingController@store');
    $router->patch('/{id}/update', 'FundingController@update');
    $router->delete('/{id}/delete', 'FundingController@destroy');
});

$router->group(['prefix'=>'fixed_cost'], function() use ($router){
    $router->get('/', 'FixedCostController@index');
    $router->post('/store', 'FixedCostController@store');
    $router->patch('/{id}/update', 'FixedCostController@update');
    $router->delete('/{id}/delete', 'FixedCostController@destroy');
});

$router->group(['prefix'=>'outcome_transaction'], function() use ($router){
    $router->get('/', 'OutcomeTransactionController@index');
    $router->post('/store', 'OutcomeTransactionController@store');
    $router->patch('/{id}/update', 'OutcomeTransactionController@update');
    $router->delete('/{id}/delete', 'OutcomeTransactionController@destroy');
});

