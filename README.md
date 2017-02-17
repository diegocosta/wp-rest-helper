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

	function getPosts($data)
    {
        $args = (isset($data['id'])) ? array('p' => $data['id']) : array();
            
        $the_query = new WP_Query($args);
        $posts = $the_query->get_posts();
        
        if($the_query->found_posts) {
            return Response::success($posts);
        }
        
        return Response::error('Posts not found');
    }

    Rest::init("my-namespace", function(){
        
        Route::readable("/posts", 'getPosts');
        
        Route::readable("/posts/(?P<id>\d+)", 'getPosts', array(
            'id' => Validate::isNumeric()
        ));
        
    });
```
