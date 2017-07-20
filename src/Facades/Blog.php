<?php
namespace Laravel\Blog\Facades;

use Illuminate\Support\Facades\Facade;
class Blog extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'laravel.blog';
	}
}