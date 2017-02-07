<?php
	namespace DiegoCosta\WP\RestHelper;

	use WP_REST_Response;

	class Response
	{
	    public static function response($code, $response)
	    {
	        return new WP_REST_Response($response, $code);
	    }

	    public static function error($response, $code = 404)
	    {	        
	        return self::response($code, array(
	            'code' => $code,
	            'message' => $response
	        ));
	    }

	    public static function success($response, $code = 200)
	    {
	        return self::response($code, $response);
	    }
	}