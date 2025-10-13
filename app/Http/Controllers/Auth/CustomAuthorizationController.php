<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\Bridge\User;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\TokenRepository;
use League\OAuth2\Server\AuthorizationServer;
use Nyholm\Psr7\Response as Psr7Response;
use Psr\Http\Message\ServerRequestInterface;

class CustomAuthorizationController extends Controller
{
    protected $server;

    public function __construct(AuthorizationServer $server)
    {
        $this->server = $server;
    }


    public function authorize(
        ServerRequestInterface $psrRequest,
        Request $request
    ) {
        $authRequest = $this->server->validateAuthorizationRequest($psrRequest);

        $authRequest->setUser(new User($request->user()->getAuthIdentifier()));

        $authRequest->setAuthorizationApproved(true);

        $psrResponse = $this->server->completeAuthorizationRequest(
            $authRequest,
            new Psr7Response()
        );

        return $this->convertPsrResponse($psrResponse);
    }

    protected function convertPsrResponse($psrResponse)
    {
        return new \Illuminate\Http\Response(
            $psrResponse->getBody(),
            $psrResponse->getStatusCode(),
            $psrResponse->getHeaders()
        );
    }
}
