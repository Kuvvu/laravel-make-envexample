<?php 

namespace Kuvvu\Envexample;

use Illuminate\Support\ServiceProvider;

use Kuvvu\Envexample\Commands\EnvExample;

class EnvExampleServiceProvider extends ServiceProvider {


    public function boot(): void 
    {

        // php artisan vendor:publish --tag=env-example

        $this->publishes([
            __DIR__  . '/../config/envexample.php' => config_path(path: 'envexample.php')
        ], 'env-example');

        if ($this->app->runningInConsole()) {
            $this->commands([
                EnvExample::class,
            ]);
        }

    }


    public function register(): void
    {

    }

}