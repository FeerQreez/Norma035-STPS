<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Listado de todos los departamentos
$app->get('/categoriapuesto', function(Request $request, Response $response): Response{

    $catpues = new CategoriaPuesto();
    $datos = json_encode($catpues->todos());
    $response->getBody()->write($datos);

    return $response;
});

//Departamento por ID
$app->get('/categoriapuesto/{id}', function(Request $request, Response $response, array $args): Response{
    $depId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del departamento: %s', $depId));

    return $response;

});
//Agregar  departamento 
$app->post('/categoriapuesto', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $catpues = new CategoriaPuesto();
    $res = $catpues->nuevo($parameters["idDepar"], $parameters["Nombre_Depa"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
    

    return $response;

});

//Actualizar mediante Put
$app->put('/categoriapuesto/Actualizar', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $catpues = new Departamento();
    $res = $catpues->nuevo($parameters["idDepar"], $parameters["Nombre_Depa"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
    

    return $response;

});


?>