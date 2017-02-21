<?php

namespace App;


class Response
{
    public function toJSON($data)
    {
        echo json_encode($data);
    }
}