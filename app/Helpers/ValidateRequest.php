<?php

namespace App\Helpers;

use App\Exceptions\ResponseException;
use Illuminate\Support\Facades\Validator;

class ValidateRequest {

    public static function validate(array $request_data, array $validations){
        $validator = Validator::make($request_data, $validations);

        if ($validator->fails()) {
            $message = $validator->errors()->toArray();
            throw new ResponseException('Todos los campos son obligatorios*',$message);
        }
    }

}
