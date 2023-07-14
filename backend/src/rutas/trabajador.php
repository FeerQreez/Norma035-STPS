<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//Listado de todos los trabajadores
$app->get('/trabajador', function(Request $request, Response $response): Response{

    $tra = new Trabajador();
    $datos = json_encode($tra->todos());
    $response->getBody()->write($datos);

    return $response;
});

//trabajador por ID
$app->get('/trabajador/{id}', function(Request $request, Response $response, array $args): Response{
    $depId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del Trabajador: %s', $depId));

    return $response;

});
//Agregar  departamento 
$app->post('/trabajador', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $tra = new Trabajador();
    $res = $tra->nuevo($parameters["idTra"], $parameters["NombreTra"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));

    return $response;

});

//Actualizar mediante Put
$app->put('/trabajador/Actualizar', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $tra = new Trabajador();
    $res = $tra->nuevo($parameters["idTra"], $parameters["NombreTra"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));

    return $response;

});



?>