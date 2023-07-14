<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//Listado de todos los trabajadores
$app->get('/usuario', function(Request $request, Response $response): Response{

    $usr = new Usuario();
    $datos = json_encode($usr->todos());
    $response->getBody()->write($datos);

    return $response;
});

//trabajador por ID
$app->get('/usuario/{id}', function(Request $request, Response $response, array $args): Response{
    $userId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del Usuario: %s', $userId));

    return $response;

});
//Agregar  departamento 
$app->post('/usuario', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $usr = new Usuario();
    $res = $usr->nuevo($parameters["Correo"], $parameters["Password"] ,$parameters["Nombre"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));

    return $response;

});

//Actualizar mediante Put
$app->put('/usuario/Actualizar', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $usr = new Usuario();
    $res = $usr->nuevo($parameters["Correo"], $parameters["Password"] ,$parameters["Nombre"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));

    return $response;

});

?>