<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//Listado de todos los trabajadores
$app->get('/pregunta', function(Request $request, Response $response): Response{

    $pre = new Pregunta();
    $datos = json_encode($pre->todos());
    $response->getBody()->write($datos);

    return $response;
});

//trabajador por ID
$app->get('/pregunta/{id}', function(Request $request, Response $response, array $args): Response{
    $depId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del Trabajador: %s', $depId));

    return $response;

});
//Agregar  departamento 
$app->post('/pregunta', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $pre = new Trabajador();
    $res = $pre->nuevo($parameters["idPre"], $parameters["preguntaEsp"], $parameters["PreguntaIng"] ,$parameters["TipoRespuesta"] , $parameters["TipoSeleccion"] ,$parameters["Requi_Aclara"], $parameters["AclaraEsp"], $parameters["AclaraIng"] ,$parameters["Pausa"] ,$parameters["idCate"], $parameters["idCues"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));

    return $response;

});

//Actualizar mediante Put
$app->put('/pregunta/Actualizar', function(Request $request, Response $response): Response{

    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $pre = new Departamento();
    $res = $pre->nuevo($parameters["idDepar"], $parameters["Nombre_Depa"]); 

    $response->getBody()->write(sprintf('Datos guardados %d ', $res));

    return $response;

});

?>