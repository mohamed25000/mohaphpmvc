<?php

namespace Sectheater;

use Sectheater\http\Request;
use Sectheater\http\Response;
use Sectheater\http\Router;
use Sectheater\support\Config;

class Application
{
    protected Router $router;
    protected Request $request;
    protected Response $response;
    protected Config $config;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->config = new Config((array)$this->loadConfigurations());
    }

    protected function loadConfigurations()
    {
        foreach (scandir(config_path()) as $file) {
            if($file === '.' || $file === '..') {
                continue;
            }

            $fileName = explode('.', $file)[0];
            yield $fileName => require config_path() . $file ;
        }

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