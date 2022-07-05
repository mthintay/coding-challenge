<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Entities\Customer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*
        $this->app->bind(CustomerRepository::class, function(){
            return new DoctrineCustomerRepository(
                EntityManager::getRepository(Customer::class)
            );
        });
        */

        $this->app->bind(CustomerRepository::class, function($app) {
            return new DoctrineCustomerRepository(
                $app['em'],
                $app['em']->getClassMetaData(Customer::class)
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
