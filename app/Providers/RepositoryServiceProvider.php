<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\BrandInterface;
use App\Interfaces\CategoryInterface;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // $this->app->bind(
        //     \App\Interfaces\CategoryInterface::class,
        //     \App\Repositories\CategoryRepository::class
        // );

        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(BrandInterface::class, BrandRepository::class);


    }
}

?>
