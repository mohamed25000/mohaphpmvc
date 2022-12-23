<?php

namespace Sectheater;

use Sectheater\http\Request;
use Sectheater\http\Response;
use Sectheater\http\Router;

class Application
{
    protected Router $router;
    protected Request $request;
    protected Response $response;

    /**
     * @param Router $router
     * @param Request $request
     * @param Response $response
     */
    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
    }

    public function run()
    {
        $this->router->resolve();
    }

    public function __get(string $name)
    {
        if(property_exists($this, $name)) {
            return $this->$name;
        }
    }
}