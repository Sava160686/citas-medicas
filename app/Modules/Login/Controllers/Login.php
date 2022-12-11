<?php
namespace App\Modules\Login\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Exceptions\ResponseException;
use App\Helpers\ValidateRequest;
use App\Modules\Login\Services\LoginService;

class Login extends Controller {

    protected $login_service;

    public function __construct(){
        $this->login_service = new LoginService();
    }

    public function ingresoSistema(Request $request)
    {
        try {

            ValidateRequest::validate($request->all(), [
                'email'    => 'required|email',
                'password' => 'required',
            ]);
            $this->login_service->ingresoSistema($request->email,$request->password);
            return $this->login_service->HTTPresponse();
        } catch (ResponseException $e) {
            $this->login_service->responseError401($e->getMessage(),$e->getData());
            return $this->login_service->HTTPresponse();
        }
    }

}
