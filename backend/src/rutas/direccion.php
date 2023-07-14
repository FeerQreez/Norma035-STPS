<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;



//Listado de todos los departamentos
$app->get('/direccion', function(Request $request, Response $response): Response{

    $dire = new Direccion();
    $datos = json_encode($dire->todos());
    $response->getBody()->write($datos);

    return $response;
});

//Departamento por ID
$app->get('/direccion/{id}', function(Request $request, Response $response, array $args): Response{
    $direId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos de la direccion: %s', $direId));

    return $response;

});

$app->post('/direccion', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $dire = new Direccion();
    $res = $dire->nuevo($parameters["idDire"], $parameters["idCal"], $parameters["idCol"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
    

    return $response;

});
?>