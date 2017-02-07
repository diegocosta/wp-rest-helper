<?php

	require_once "vendor/autoload.php";

	use DiegoCosta\WP\RestHelper\Rest;
	use DiegoCosta\WP\RestHelper\Route;
	use DiegoCosta\WP\RestHelper\Validate;

	Rest::init("my-namespace", "v1", function(){

		Route::readable("/posts", function ($data) {
		    return array();
		});

		Route::readable("/posts/(?P<id>\d+)", function ($data) {
			return array();            
		}, array(
		    'id' => Validate::isNumeric()
		));

	});