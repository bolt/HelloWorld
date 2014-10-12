<?php
// Hello World Extension for Bolt
// Minimum version: 0.7

namespace Bolt\Extension\Bolt\HelloWorld;

class Extension extends \Bolt\BaseExtension
{
    public function getName()
    {
        return "Hello World";
    }

    function initialize() {

        $this->addTwigFunction('helloworld', 'twigHelloworld');

    }

    function twigHelloworld($name="") {

        // if $name isn't set, use the one from the config.yml. Unless that's empty too, then use "world".
        if (empty($name)) {
            if (!empty($this->config['name'])) {
                $name = $this->config['name'];
            } else {
                $name = "World";
            }
        }

        $html = "Hello, ". $name ."!";

        return new \Twig_Markup($html, 'UTF-8');

    }

}






