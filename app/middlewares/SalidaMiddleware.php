<?php

/*
Hacer un login para nuestra aplicacion;
para esto vamos a necesitar añadir una columna mas a la tabla usuarios que ya tenemos en nuestro localhost
tipo_perfil
[empleado, cliente, admin]
vamos a utilizar un middleware para poder chequear los perfiles de usuario en los request necesarios
'/login' ese no deberia tener un middleware de proteccion
por POST usuario y clave
es usuario franco con perfil admin ingresó en la aplicacion
*/

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class SalidaMiddleWare
{
    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $response = $handler->handle($request);
        $mensaje = ' Despues! ';
        $respuesta = ['respuesta' => $mensaje];
        $response->getBody()->write(json_encode($respuesta, true));
        return $response;
    }
}