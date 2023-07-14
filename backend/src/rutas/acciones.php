<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//Listado de todos los trabajadores
$app->get('/acciones', function(Request $request, Response $response): Response{

    $Acc = new Acciones();
    $datos = json_encode($Acc->todos());
    $response->getBody()->write($datos);

    return $response;
});

//trabajador por ID
$app->get('/acciones/{id}', function(Request $request, Response $response, array $args): Response{
    $AccId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del Trabajador: %s', $AccId));

    return $response;

});
//Agregar  departamento 
$app->post('/acciones', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $Acc = new Acciones();
    $res = $Acc->nuevo($parameters["id_Acci"], $parameters["Fecha"],  $parameters["indicaciones"], $parameters["Fecha_Final"], $parameters["resultado"], $parameters["idTra"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));

    return $response;

});

//Actualizar mediante Put
$app->put('/acciones/Actualizar', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $Acc = new Acciones();
    $res = $Acc->nuevo($parameters["id_Acci"], $parameters["Fecha"],  $parameters["indicaciones"], $parameters["Fecha_Final"], $parameters["resultado"], $parameters["idTra"]);  

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));

    return $response;

});



?>