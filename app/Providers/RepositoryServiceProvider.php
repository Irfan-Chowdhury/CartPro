<?php

namespace App\Providers;

use App\Contracts\Brand\BrandContract;
use App\Contracts\Brand\BrandTranslationContract;
use App\Contracts\Category\CategoryContract;
use App\Contracts\Category\CategoryTranslationContract;
use Illuminate\Support\ServiceProvider;
// use App\Interfaces\BrandInterface;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Brand\BrandTranslationRepository;
// use App\Repositories\BrandRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryTranslationRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // $this->app->bind(
        //     \App\Interfaces\CategoryInterface::class,
        //     \App\Repositories\CategoryRepository::class
        // );

        //Category
        $this->app->bind(CategoryContract::class, CategoryRepository::class);
        $this->app->bind(CategoryTranslationContract::class, CategoryTranslationRepository::class);

        //Brand
        $this->app->bind(BrandContract::class, BrandRepository::class);
        $this->app->bind(BrandTranslationContract::class, BrandTranslationRepository::class);

        // $this->app->bind(BrandInterface::class, BrandRepository::class);


    }
}

?>
