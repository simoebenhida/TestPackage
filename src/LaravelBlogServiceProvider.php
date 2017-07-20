<?php

namespace Laravel\Blog;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Container\Container;

class LaravelBlogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
          $this->loadViewsFrom(__DIR__.'/views', 'blog');

          $this->loadRoutesFrom(__DIR__.'/routes.php');

    }

    /**
     * Register the application services.
     *
     * @return void
     */

    public function register()
    {
           // $this->app->singleton('example.cats', function (Container $app) {
           //  return new Cats($app->config->get('cats.names', []));
           //   });
           $this->registerPublishableResources();

           $this->app->singleton('laravel.blog',function ($app) {
                return new Blog(config('blog.info',null));
           });

           $this->app->alias('laravel.blog',Blog::class);
           // $this->app->resolving(function ($object, $app) {
           //      config(['blog.info.name' => 'Change']);
           //  });
    }

    private function registerPublishableResources()
    {
        $publishablePath = dirname(__DIR__).'/publishable';
        $configPath = "{$publishablePath}/config/blog.php";
        $publishable = [
            'config' => [
                "{$publishablePath}/config/blog.php" => config_path('blog.php'),
            ],
        ];

        foreach ($publishable as $group => $paths) {
            $this->publishes($paths, $group);
        }

       $this->mergeConfigFrom($configPath, 'blog');
    }
}
