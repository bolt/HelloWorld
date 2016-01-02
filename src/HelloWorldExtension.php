<?php

namespace Bolt\Extension\Bolt\HelloWorld;

use Bolt\Extension\SimpleExtension;

/**
 * Class HelloWorldExtension
 *
 * @author Bob den Otter <bob@twokings.nl>
 * @author Xiao-Hu Tai <xiao@twokings.nl>
 * @author Gawain Lynch <gawain.lynch@gmail.com>
 */
class HelloWorldExtension extends SimpleExtension
{
    /**
     * Override the default function to provide a customised name for this extension.
     *
     * @return string
     */
    public function getName()
    {
        return 'Hello, World!';
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigFunctions()
    {
        return [
            'helloworld' => 'twigHelloworld',
        ];
    }

    /**
     * Our Twig callback function.
     *
     * If $name isn't provided, we use the one from the config file, unless
     * that's empty too, then use "World".
     *
     * @param string $name
     *
     * @return \Twig_Markup
     */
    public function twigHelloworld($name = '')
    {
        if ($name === '') {
            $config = $this->getConfig();
            $name = $config['name'];
        }

        $html = "Hello, $name!";

        return new \Twig_Markup($html, 'UTF-8');
    }

    /**
     * Default config options
     *
     * @return array
     */
    protected function getDefaultConfig()
    {
        return array(
            'agent' => 'World'
        );
    }
}
