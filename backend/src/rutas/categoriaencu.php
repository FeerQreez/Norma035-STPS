
<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//Listado de todos las categoriaEncu

$app->get('/categoriaencu', function(Request $request, Response $response): Response{
    $cateE = new CategoriaEncu();
    $datos = json_encode($cateE->todos());
    $response->getBody()->write($datos);

    return $response;
});


//categoriaEncu por ID
    $app->get('/categoriaencu/{id}', function(Request $request, Response $response, array $args): Response{
    $cateId = (int)$args['id'];
    $response->getBody()->write(sprintf('Datos de la categoriaencu: %s', $cateId));

    return $response;

});

$app->post('/categoriaencu', function(Request $request, Response $response): Response{


    // Obteniendo el formulario en formato JSON
    $parameters = (array)$request->getParsedBody();

    $cateE = new CategoriaEncu();
    $res = $cateE->nuevo($parameters["idCate"],$parameters["NomEsp"], $parameters["NomIng"], $parameters["Descripcion"], $parameters["idCues"], $parameters["idTra"] );
    $response ->getBody()->write(sprintf('Datos guardados %d ', $res));



    return $response;

});

$app->put('/categoriaencu/Actualizar', function(Request $request, Response $response): Response{

 // Obteniendo el formulario en formato JSON
 $parameters = (array)$request->getParsedBody();

 $cat = new Categoriaencu();
 $res = $cat->nuevo($parameters["idCate"], $parameters["NomEsp"], $parameters["NomIng"], $parameters["Descripcion"], $parameters["idCues"], $parameters["idTra"]); 

 $response->getBody()->write(sprintf('Datos guardados %d ', $res));

 return $response;

});

?>