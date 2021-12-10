<?php

namespace App\Providers;

use App\Repositories\Interfaces\PlayerInterface;
use App\Repositories\Interfaces\RoomInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\PlayerRepository;
use App\Repositories\RoomRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(RoomInterface::class, RoomRepository::class);
        $this->app->bind(PlayerInterface::class, PlayerRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
