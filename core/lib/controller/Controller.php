<?php
/**
 * 
 */
namespace core\lib\controller;

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
        $loader    = new \Twig_Loader_Filesystem('src/');
        $twig      = new \Twig_Environment($loader, ['cache' => false]);
        if($template){            
            $template = str_replace('::', '/', $template);                        
            $view     = $twig->render($namespace[0] . '/View/' . $template.'.twig', $params);
        }
        else{            
            $view = $twig->render('index.twig');
        }
        echo $view;
    }
}