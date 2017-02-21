<?php

namespace App;


class Request
{

    public function getFile($file)
    {
        if (isset($_FILES[$file])) {
            return $_FILES[$file];
        }
        return false;
    }

    public function getDataFromPost($name)
    {
        return isset($_POST[$name]) ? $_POST[$name] : null;
    }
}
