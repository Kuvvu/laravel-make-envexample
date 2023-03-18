<?php 

namespace Kuvvu\Envexample;

use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;

use Kuvvu\Envexample\Commands\envexampleCommand;

class EnvExampleServiceProvider extends ServiceProvider {


    public function boot(): void 
    {

        AboutCommand::add('env.example', fn () => ['Version' => '0.1.0']);

        // php artisan vendor:publish --tag=env-example

        $this->publishes([
            __DIR__  . '/../config/envexample.php' => config_path(path: 'envexample.php')
        ], 'env-example');

        if ($this->app->runningInConsole()) {
            $this->commands([
                envexampleCommand::class,
            ]);
        }

    }


    public function register(): void
    {

    }

}