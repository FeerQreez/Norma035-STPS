
<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//Listado de todos las Opcionesprevias

$app->get('/opcionesprevias', function(Request $request, Response $response): Response{
    $op = new Opcionesprevias();
    $datos = json_encode($op->todos());
    $response->getBody()->write($datos);

    return $response;
});


//Opcionesprevias por ID
    $app->get('/opcionesprevias/{id}', function(Request $request, Response $response, array $args): Response{
    $opId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos del opcionesprevias: %s', $opId));

    return $response;

});

$app->post('/opcionesprevias', function(Request $request, Response $response): Response{


    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $op = new Opcionesprevias();
    $res = $op->nuevo($parameters["idPrevia"],$parameters["opcionEsp"], $parameters["OpcionIng"], $parameters ["idPre"],$parameters["idCate"], $parameters["idCues"], $parameters["idTra"]);
    $response ->getBody()->write(sprintf('Datos guardados %d ', $res));

    return $response;

});

$app->put('/opcionesprevias/Actualizar', function(Request $request, Response $response): Response{

 // Obteniendo el formulario en formato JSON
 $parameters = (array)$request->getParsedBody();

 $opp = new Opcionesprevias();
 $res = $opp->nuevo($parameters["idPrevia"],$parameters["opcionEsp"], $parameters["OpcionIng"], $parameters ["idPre"],$parameters["idCate"], $parameters["idCues"], $parameters["idTra"]); 

 $response->getBody()->write(sprintf('Datos guardados %d ', $res));

 return $response;

});

?>