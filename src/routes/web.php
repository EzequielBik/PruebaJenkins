<?php

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

$v1 = '/procesados/v1/';

$router->get($v1.'auction', 'AuctionController@index');
$router->post($v1.'auction', 'AuctionController@store');
$router->put($v1.'auction', 'AuctionController@update');

$router->get($v1.'purchase', 'PurchaseController@index');
$router->post($v1.'purchase', 'PurchaseController@store');
$router->put($v1.'purchase', 'PurchaseController@update');

$router->get($v1.'offer', 'OfferController@index');
$router->post($v1.'offer', 'OfferController@store');
$router->put($v1.'offer', 'OfferController@update');

$router->get($v1.'establishment', 'EstablishmentController@index');
$router->post($v1.'establishment', 'EstablishmentController@store');
$router->put($v1.'establishment', 'EstablishmentController@update');

$router->get($v1.'caliber', 'CaliberController@index');
$router->post($v1.'caliber', 'CaliberController@store');
$router->put($v1.'caliber', 'CaliberController@update');
$router->get($v1.'caliber/rel/prod', 'CaliberController@getRelProd');
$router->post($v1.'caliber/rel/prod', 'CaliberController@storeRelProd');
$router->put($v1.'caliber/rel/prod', 'CaliberController@updateRelProd');

$router->get($v1.'presentation', 'PresentationController@index');
$router->post($v1.'presentation', 'PresentationController@store');
$router->put($v1.'presentation', 'PresentationController@update');
$router->get($v1.'presentation/rel/prod', 'PresentationController@getRelProd');
$router->post($v1.'presentation/rel/prod', 'PresentationController@storeRelProd');
$router->put($v1.'presentation/rel/prod', 'PresentationController@updateRelProd');

$router->get($v1.'certification', 'CertificationController@index');
$router->post($v1.'certification', 'CertificationController@store');
$router->put($v1.'certification', 'CertificationController@update');
$router->get($v1.'certification/rel/auct', 'CertificationController@getRelAuct');
$router->post($v1.'certification/rel/auct', 'CertificationController@storeRelAuct');
$router->put($v1.'certification/rel/auct', 'CertificationController@updateRelAuct');

$router->get($v1.'qualification', 'QualificationController@index');
$router->post($v1.'qualification', 'QualificationController@store');
$router->put($v1.'qualification', 'QualificationController@update');
$router->get($v1.'qualification/rel/auct', 'QualificationController@getRelAuct');
$router->post($v1.'qualification/rel/auct', 'QualificationController@storeRelAuct');
$router->put($v1.'qualification/rel/auct', 'QualificationController@updateRelAuct');

$router->get($v1, function () use ($router) {
    return $router->app->version();
});
