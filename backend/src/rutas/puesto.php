<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//Listado de todos los puestos
$app->get('/puesto', function(Request $request, Response $response): Response{

    $pue = new Puesto();
    $datos = json_encode($pue->todos());
    $response->getBody()->write($datos);

    return $response;
});

//puesto por ID
$app->get('/puesto/{id}', function(Request $request, Response $response, array $args): Response{
    $userId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del Usuario: %s', $userId));

    return $response;

});
//Agregar  Puesto
$app->post('/puesto', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $pue = new Puesto();
    $res = $pue->nuevo($parameters["idPuesto"], $parameters["NomPuesto"] ,$parameters["idDepar"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));

    return $response;

});

//Actualizar mediante Put
$app->put('/puesto/Actualizar', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $pue = new Puesto();
    $res = $pue->nuevo($parameters["idPuesto"], $parameters["NomPuesto"] ,$parameters["idDepar"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));

    return $response;

});

?>