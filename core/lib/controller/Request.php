<?php
declare (strict_types = 1);
namespace Controller;
class Request
{
    public function getPost($field = null)
    {
        $data = json_decode(file_get_contents("php://input"));
        if(!empty($field)){
            return $data->$field;
        }else{
            return $data; 
        }
        
    }
}