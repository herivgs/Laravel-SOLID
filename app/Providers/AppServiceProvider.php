<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->bind('App\Contracts\BusinessLayer\ITaskProcessor', 'App\BusinessLayer\TaskProcessor');
      $this->app->bind('App\Contracts\DataLayer\ITaskRepository', 'App\DataLayer\TaskRepository');
      
      $this->app->bind('App\Contracts\BusinessLayer\IUserProcessor', 'App\BusinessLayer\UserProcessor');
      $this->app->bind('App\Contracts\DataLayer\IUserRepository', 'App\DataLayer\UserRepository');
    }
}
