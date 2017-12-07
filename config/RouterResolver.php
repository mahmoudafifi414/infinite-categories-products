<?php

namespace config;
class RouterResolver
{
    private $uris = array();
    private $methods = array();

    public function add($uri, $method)
    {
        $this->uris[] = '/' . trim($uri, '/');
        if ($method != null) {
            $this->methods[] = $method;
        }
    }

    public function submit()
    {
        $uriParam = isset($_GET['uri']) ? '/' . $_GET['uri'] : '/';
        foreach ($this->uris as $key => $value) {

            if (preg_match("#^$value$#", $uriParam)) {
                $dispatcher = explode('@', $this->methods[$key]);
                $instance = new $dispatcher[0];
                if (is_string($dispatcher[1])) {
                    call_user_func(array($instance, $dispatcher[1]));
                }
            }
        }
    }
}