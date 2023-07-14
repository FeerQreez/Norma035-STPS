<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Routing\RouteContext;


require __DIR__ . "\\vendor\\autoload.php";

include "src/database/database.class.php";

include "src/modelo/departamento.class.php";
include "src/modelo/trabajador.class.php";
include "src/modelo/usuario.class.php";
include "src/modelo/puesto.class.php";
include "src/modelo/pregunta.class.php";
include "src/modelo/calle.class.php";
include "src/modelo/cuescampos.class.php";
include "src/modelo/direccion.class.php";
include "src/modelo/diagnostico.class.php";
include "src/modelo/categoriapuesto.class.php";
include "src/modelo/aco_trauma.class.php";
include "src/modelo/categoriaencu.class.php";
include "src/modelo/colonia.class.php"; 
include "src/modelo/acciones.class.php";
include "src/modelo/opcionesprevias.class.php";
include "src/modelo/cuestionario.class.php";








$app = AppFactory::create();


$app->addErrorMiddleware(true, true, true);
// Principal route
$app->setBasePath("/nom035/backend");
$app->getContainer();

$app->options('/{routes:.+}', function(Request $request, Response $response, $args){
    return $response;
});

$app->addBodyParsingMiddleware();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->add(function(Request $request, RequestHandlerInterface $handler): Response{
    $routeContext = RouteContext::fromRequest($request);
    $routingResults = $routeContext->getRoutingResults();
    $methods = $routingResults->getAllowedMethods();
    $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');

    $response = $handler->handle($request);

    $response->withHeader('Access-Control-Allow-Origin', '*');
    $response->withHeader('Access-Control-Allow-Headers', 'Origin, Content-Type, X-Auth-Token, Authorization, Accept, charset,boundary,Content-Length');
    $response->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    $response->withHeader('Allow', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
    $response->withHeader('Access-Control-Max-Age', '86400');

    return $response;
});

$app->addRoutingMiddleware();

/** Ruta principal */
$app->get('/', function(Request $request, Response $response, $args){
    $response->getBody()->write("API REST Backend para el sistema NOM 035");
    return $response;  
});


/**********************  Rutas para Metodos API por entidad *********************************/

// Departamentos
include_once "src/rutas/departamento.php";
//Trabajador
include_once "src/rutas/trabajador.php";
//usuario 
include_once "src/rutas/usuario.php";
//Puesto
include_once "src/rutas/puesto.php";
//Pregunta
include_once "src/rutas/pregunta.php";
//calle
include_once "src/rutas/calle.php";
//Cuestionario de campos
include_once "src/rutas/cuescampos.php";
//direccion
include_once "src/rutas/direccion.php";
//Diagnostico 
include_once  "src/rutas/diagnostico.php";
//Categoria Puesto
include_once "src/rutas/categoriapuesto.php";
//Acontecimiento Traumatico
include_once "src/rutas/aco_trauma.php";
//CategoriaEncuesta
include_once "src/rutas/categoriaencu.php";
//Colonia 
include_once "src/rutas/colonia.php";
//Acciones
include_once "src/rutas/acciones.php"; 
//OpcionesPrevias 
include_once "src/rutas/opcionesprevias.php";
//Cuestionario
include_once "src/rutas/cuestionario.php";









$app->run();
