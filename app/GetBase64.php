<?php

namespace App;

class GetBase64 extends Controller
{
    public function index()
    {
        $request = new Request();
        $file = $request->getFile('filename');
        if ($file === false) {
            return $this->responseError('Please provide correct path to the file.');
        }
        $data = base64_encode(file_get_contents($file["tmp_name"]));
        return $this->responseSuccess($data);
    }

    public function responseSuccess($data, $code = 200)
    {
        $response = new Response();
        http_response_code($code);
        return $response->toJSON([
            "status" => "Success",
            "base64" => $data
        ]);

    }

}
