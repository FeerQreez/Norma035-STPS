<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

//Listado de todos los Acontecimientos Traumaticos
$app->get('/aco_trauma', function(Request $request, Response $response): Response{

    $Aco = new AcoTrauma();
    $datos = json_encode($Aco->todos());
    $response->getBody()->write($datos);

    return $response;
});

//Departamento por ID
$app->get('/aco_trauma/{id}', function(Request $request, Response $response, array $args): Response{
    $AcoId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del acontecimiento Traumatico : %s', $AcoId));

    return $response;

});
//Agregar  departamento 
$app->post('/aco_trauma', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $Aco = new AcoTrauma();
    $res = $Aco->nuevo($parameters["idTrau"], $parameters["idTra"], $parameters["Fecha"], $parameters["Descripcion"], $parameters["Consecuencias"], $parameters["Fecha"], $parameters["Recomendaciones"], $parameters["idTraba"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
    

    return $response;

});

//Actualizar mediante Put
$app->put('/aco_trauma/Actualizar', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $Aco = new AcoTrauma();
    $res = $Aco->nuevo($parameters["idTrau"], $parameters["idTra"], $parameters["Fecha"], $parameters["Descripcion"], $parameters["Consecuencias"], $parameters["Fecha"], $parameters["Recomendaciones"], $parameters["idTraba"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
    

    return $response;

});


?>