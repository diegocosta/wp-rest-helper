<?php
	namespace DiegoCosta\WP\RestHelper;

	class Validate
	{
	    public static function isNumeric()
	    {
	        return array(
	            'validate_callback' => function ($param, $request, $key) {
	                return is_numeric($param);
	            }
	        );
	    }
	}