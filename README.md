# WP Rest Helper
This is a library for simplify the creation of WordPress REST endpoints with WP-JSON

## Installation
Execute the following command to get the latest version of the package:
```sh
composer require diegocosta/wp-rest-helper
```

## Usage
```php
	use DiegoCosta\WP\RestHelper\Rest;
	use DiegoCosta\WP\RestHelper\Route;
	use DiegoCosta\WP\RestHelper\Validate;
	use DiegoCosta\WP\RestHelper\Response;

	Rest::init("my-namespace", "v1", function(){

		Route::readable("/posts", function ($data) {

			$the_query = new WP_Query();
			$posts = $the_query->get_posts();

			if($the_query->found_posts){
				return Response::success($posts);
			}

			return Response::error('Posts not found');
		});

		Route::readable("/posts/(?P<id>\d+)", function ($data) {

			$the_query = new WP_Query(array(
				'p' => $data['id']
			));

			$posts = $the_query->get_posts();

			if($the_query->found_posts){
				return Response::success($posts);
			}

			return Response::error("Post {$data['id']} not found");

		}, array(
		    'id' => Validate::isNumeric()
		));

	});
```
