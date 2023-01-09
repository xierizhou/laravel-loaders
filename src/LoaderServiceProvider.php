<?php

namespace Range\Loader;

use Illuminate\Http\Request;

use Illuminate\Support\ServiceProvider;

class LoaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /** Start running loader **/
        Loader::run();

        /** Register Application Router. **/
        $this->registerRouter();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register Application Router.
     */
    protected function registerRouter(){
        $this->app['router']->group([],function($router){
            /* @var \Illuminate\Routing\Router $router */
            $router->post(Loader::route(),'\Range\Loader\Loader@handle');
        });

    }


}
