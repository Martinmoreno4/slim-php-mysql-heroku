<?php

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\ServerRequestInterface as RequestHandler;
use Slim\Factory\AppFactory;
use Slim\Psr7\Response;

class Logger
{
    public static function LogOperacion(Request $request, RequestHandler $handler)
    {
        $response = $handler->handle($request);
        $existingContent = (string) $response->getBody();

        $response = new Response();
        $respnse->getBody()->write('BEFORE' . $existingContent);

        return $response;
    }
}