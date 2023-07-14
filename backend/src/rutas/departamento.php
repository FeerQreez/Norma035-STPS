<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Listado de todos los departamentos
$app->get('/departamento', function(Request $request, Response $response): Response{

    $dep = new Departamento();
    $datos = json_encode($dep->todos());
    $response->getBody()->write($datos);

    return $response;
});

//Departamento por ID
$app->get('/departamento/{id}', function(Request $request, Response $response, array $args): Response{
    $depId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del departamento: %s', $depId));

    return $response;

});
//Agregar  departamento 
$app->post('/departamento', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $dep = new Departamento();
    $res = $dep->nuevo($parameters["idDepar"], $parameters["Nombre_Depa"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
    

    return $response;

});

//Actualizar mediante Put
$app->put('/departamento/Actualizar', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $dep = new Departamento();
    $res = $dep->nuevo($parameters["idDepar"], $parameters["Nombre_Depa"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
    

    return $response;

});


?>