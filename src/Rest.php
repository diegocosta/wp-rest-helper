<?php
	namespace DiegoCosta\WP\RestHelper;

	class Rest
	{
	    public $namespace;
	    public $version;

	    private static $instance;

	    public static function getInstance()
	    {
	        if (is_null(self::$instance))
	            self::$instance = new self();

	        return self::$instance;
	    }

	    public static function init($namespace, $version, $routes)
	    {
	        $rest = self::getInstance();
	        $rest->namespace = $namespace;
	        $rest->version = $version;

	        \add_action('rest_api_init', function() use ($rest, $routes) {
	            $routes();
	        });
	        
	        return $rest;
	    }
	}