<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;



//Listado de todos los departamentos
$app->get('/cuestionario', function(Request $request, Response $response): Response{

    $dep = new Departamento();
    $datos = json_encode($dep->todos());
    $response->getBody()->write($datos);

    return $response;
});

//Departamento por ID
$app->get('/cuestionario/{id}', function(Request $request, Response $response, array $args): Response{
    $cuestId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del cuestionario: %s', $cuestId));

    return $response;

});

$app->post('/cuestionario', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $dep = new Cuestionario();
    $res = $dep->nuevo($parameters["IdCues"], $parameters["Fecha"],);
    //$parameters["Nombre"],$parameters["Objetivo"],$parameters["Descripcion"],$parameters["Agradecimiento"],$parameters["Agradecimiento"],$parameters["estatus"],$parameters["Idtra"],); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
    
    

    return $response;

});
?>