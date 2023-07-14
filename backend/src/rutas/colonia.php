
<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//Listado de todos los Trabajadores

$app->get('/colonia', function(Request $request, Response $response): Response{
    $colo = new Colonia();
    $datos = json_encode($colo->todos());
    $response->getBody()->write($datos);

    return $response;
});


//Trabajador por ID
    $app->get('/colonia/{id}', function(Request $request, Response $response, array $args): Response{
    $coloId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del Colonia: %s', $coloId));

    return $response;

});

$app->post('/colonia', function(Request $request, Response $response): Response{


    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $colo = new Colonia();
    $res = $colo->nuevo($parameters["idCol"], $parameters["NomCol"]);
    $response ->getBody()->write(sprintf('Datos guardados %d ', $res));



    return $response;

});

$app->put('/colonia/Actualizar', function(Request $request, Response $response): Response{

 // Obteniendo el formulario en formato JSON
 $parameters = (array)$request->getParsedBody();

 $col = new Colonia();
 $res = $col->nuevo($parameters["idCol"],$parameters["NomCol"]); 

 $response->getBody()->write(sprintf('Datos guardados %d ', $res));

 return $response;

});

?>