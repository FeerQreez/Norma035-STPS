<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;



//Listado de todos los departamentos
$app->get('/cuescampos', function(Request $request, Response $response): Response{

    $dep = new Departamento();
    $datos = json_encode($dep->todos());
    $response->getBody()->write($datos);

    return $response;
});

//Departamento por ID
$app->get('/cuescampos/{id}', function(Request $request, Response $response, array $args): Response{
    $cuesCamp = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del cuestionario: %s', $cuesCamp));

    return $response;

});

$app->post('/cuescampos', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $dep = new Cuestionario();
    $res = $dep->nuevo($parameters["IdCues"], $parameters["Fecha"],);
    //$parameters["Nombre"],$parameters["Objetivo"],$parameters["Descripcion"],$parameters["Agradecimiento"],$parameters["Agradecimiento"],$parameters["estatus"],$parameters["Idtra"],); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));
    
    

    return $response;

});
?>