<?php

namespace App;


class Validator
{
    protected $data;
    protected $status;
    protected $errors = [];
    protected $message;
    protected $serverCode;

    function __construct($data)
    {
        $this->data = $data;
        $this->validation();
    }

    private function validation()
    {
        foreach ($this->data as $items) {
            foreach ($items as $value => $rules) {
                list($regexp, $message) = explode('|', $rules);
                preg_match($regexp, $value, $matches);
                if (empty($matches)) {
                    $this->errors[] = $message;//valid
                }
            }
        }
    }


    public function getErrors()
    {
        return $this->errors;
    }
}
