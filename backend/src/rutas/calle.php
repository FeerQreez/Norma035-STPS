<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Listado de todos los departamentos
$app->get('/calle', function(Request $request, Response $response): Response{

    $cal = new Calle();
    $datos = json_encode($cal->todos());
    $response->getBody()->write($datos);

    return $response;
});

//Departamento por ID
$app->get('/calle/{id}', function(Request $request, Response $response, array $args): Response{
    $calId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del calle: %s', $calId));

    return $response;

});

$app->post('/calle', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $cal = new Calle();
    $res = $cal->nuevo($parameters["idCal"], $parameters["NomCalle"]); 
    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
    

    return $response;

});

$app->put('/calle/Actualizar', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();
   
    $tra = new Trabajador();
    $res = $tra->nuevo($parameters["idCal"], $parameters["NomCalle"]); 
   
    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
   
    return $response;
   
   });
   

?>