<?php
	namespace DiegoCosta\WP\RestHelper;

	use WP_REST_Server;

	class Route
	{
	    private static function route($route, $response, $methods, array $args = array())
	    {
	        $namespace = Rest::getInstance()->namespace;

	        register_rest_route($namespace, $route, array(
	            'methods' =>  $methods,
	            'callback' => $response,
	            'args' => $args
	        ));

	    }

	    public static function match($route, $response, array $args = array())
	    {
	        self::route($route, $response, WP_REST_Server::ALLMETHODS, $args);
	    }

	    public static function readable($route, $response, array $args = array())
	    {
	        self::route($route, $response, WP_REST_Server::READABLE, $args);
	    }

	    public static function creatable($route, $response, array $args = array())
	    {
	        self::route($route, $response, WP_REST_Server::CREATABLE, $args);
	    }

	    public static function editable($route, $response, array $args = array())
	    {
	        self::route($route, $response, WP_REST_Server::EDITABLE, $args);
	    }

	    public static function deletable($route, $response, array $args = array())
	    {
	        self::route($route, $response, WP_REST_Server::DELETABLE, $args);
	    }
	    
	}