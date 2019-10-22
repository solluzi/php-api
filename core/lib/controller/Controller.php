<?php

/**
 * Class Controller: Base definition of all controllers classes
 */

namespace Controller;

use Session\JWTWrapper;
use Form\Form;

abstract class Controller
{

    public function json($data)
    {
        header('Content-type: application/json');
        $resposta = json_encode($data, true);
        echo $resposta;
    }

    public function view($namespace = null, $template = null, $params = null)
    {
        $namespace = explode('\\', $namespace);
        $loader = new \Twig_Loader_Filesystem('src/');
        $twig = new \Twig_Environment($loader, ['cache' => false]);
        if ($template) {
            $template = str_replace('::', '/', $template);
            $view = $twig->render($namespace[0] . '/View/' . $template . '.twig', $params);
        } else {
            $view = $twig->render('index.twig');
        }
        echo $view;
    }

    public function formData()
    {
        return $data = json_decode(file_get_contents("php://input"));
    }

    public function required(string $name, string $input = null)
    {
        return InputRequiredValidator::fromString($name, $input);
    }

    public function confirm($pass, $passcon)
    {
        return ConfirmPasswordValidator::fromString($pass, $passcon);
    }

    public function getUserId()
    {
        $authorization = getallheaders();
        list($jwt) = sscanf($authorization['Authorization'], 'Bearer %s');
        $user = JWTWrapper::decode($jwt);
        return $user->data->id;
    }

    public function validate(array $options = null)
    {
        $form = new Form();
        return $form->validate($options);
    }
}
