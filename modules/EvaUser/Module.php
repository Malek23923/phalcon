<?php

namespace Eva\EvaUser;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\ModuleDefinitionInterface;


class Module implements ModuleDefinitionInterface
{
    public static function registerGlobalAutoloaders()
    {
        return array(
            'Eva\EvaUser' => __DIR__ . '/src/EvaUser',
        );
    }

    /**
     * Registers the module auto-loader
     */
    public function registerAutoloaders()
    {
        /*
        $loader = new Loader();
        $loader->registerNamespaces(array(
            'Eva\EvaUser' => __DIR__ . '/src/EvaUser',
        ));
        $loader->register();
        */
    }

    /**
     * Registers the module-only services
     *
     * @param Phalcon\DI $di
     */
    public function registerServices($di)
    {
		$di['dispatcher'] = function() {
			$dispatcher = new \Phalcon\Mvc\Dispatcher();
            $dispatcher->setDefaultNamespace('Eva\EvaUser\Controllers');
			return $dispatcher;
		};

        /**
         * Setting up the view component
         */
        $di['view'] = function () {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');
            return $view;
        };
    }

}