<?php
require_once "UsuarioController.php";

class LoginController
{
    public function CargarUsuario($request, $response, $args)
    {
        $parametros = $request->getParsedBody();

        $usuario = $parametros['usuario'];
        $clave = $parametros['clave'];

        $payload = json_encode(array(Usuario::obtenerUsuario($usuario)));

        $response->getBody()->write($payload);
        return $response
          ->withHeader('Content-Type', 'application/json');
    }

    public function VerificarLogueo($request, $response, $args)
    {
        $datos = $request->getParsedBody();

        $usuarioDB = Usuario::obtenerUsuario($usuario['usuario']);

        if(password_verify($datos['clave'],$usuarioDB->clave))
        {
            $payload = json_encode(array("mensaje"=>"usuario logueado"));
        }
        else
        {
            $payload = json_encode(array("mensaje"=>"Error login"));
        }

        $response->getBody()->write(json_encode($request));
        return $response->withHeader('Content-Type', 'application/json');
    }
}
?>