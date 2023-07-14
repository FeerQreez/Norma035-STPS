<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Listado de todos los departamentos
$app->get('/diagnostico', function(Request $request, Response $response): Response{

    $diag = new Diagnostico();
    $datos = json_encode($diag->todos());
    $response->getBody()->write($datos);

    return $response;
});

//Departamento por ID
$app->get('/diagnostico/{id}', function(Request $request, Response $response, array $args): Response{
    $diagId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del diagnostico: %s', $diagId));

    return $response;

});
//Agregar  departamento 
$app->post('/diagnostico', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $diag = new Departamento();
    $res = $diag->nuevo($parameters["idDepar"], $parameters["Resultado"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
    

    return $response;

});

//Actualizar mediante Put
$app->put('/diagnostico/Actualizar', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $diag = new Diagnostico();
    $res = $diag->nuevo($parameters["idDepar"], $parameters["Resultado"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
    

    return $response;

});


?>