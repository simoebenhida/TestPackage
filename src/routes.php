<?php
	$namespace = config('blog.controllers.namespace');

 	 Route::get('blog/index',[
  	'uses' => "{$namespace}\HomeController@index",
  	]);