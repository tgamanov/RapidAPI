<?php

namespace App;


class Controller
{
    public function responseSuccess($data, $code = 200)
    {


        $response = new Response();
        http_response_code($code);
        return $response->toJSON([
            "status" => "Success",
            "msg" => $data
        ]);

    }

    public function responseError($data, $code = 500)
    {
        $response = new Response();
        http_response_code($code);
        return $response->toJSON([
            "status" => "Error",
            "msg" => $data
        ]);

    }

}