<?php

namespace App;

class SayHello extends Controller
{
    public function index()
    {


        $request = new Request();
        $name = $request->getDataFromPost("name");
        $validator = new Validator([
            [$name => '/^.{2,}$/|Name is too short'],// less than 2 letters
            [$name => '/^.{0,15}$/|Name is too long'],//more than 15 letters
            [$name => '/(?:(.)(?!.*?\1)){2}/|Please enter valid name']//has atleast two different letters
        ]);

        if ($validator->getErrors()) {
            return $this->responseError($validator->getErrors());
        }
        return $this->responseSuccess("Hello " . $name);
    }

}
