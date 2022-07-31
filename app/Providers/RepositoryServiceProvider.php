<?php

namespace App\Providers;

use App\Contracts\AttributeSet\AttributeSetContract;
use App\Contracts\AttributeSet\AttributeSetTranslationContract;
use App\Contracts\Brand\BrandContract;
use App\Contracts\Brand\BrandTranslationContract;
use App\Contracts\Category\CategoryContract;
use App\Contracts\Category\CategoryTranslationContract;
use App\Contracts\Country\CountryContract;
use App\Contracts\Currency\CurrencyContract;
use App\Contracts\Page\PageContract;
use App\Contracts\Page\PageTranslationContract;
use App\Contracts\Slider\SliderContract;
use App\Contracts\Slider\SliderTranslationContract;
use App\Contracts\Tag\TagContract;
use App\Contracts\Tag\TagTranslationContract;
use App\Repositories\AttributeSet\AttributeSetRepository;
use App\Repositories\AttributeSet\AttributeSetTranslationRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Brand\BrandRepository;
use App\Repositories\Brand\BrandTranslationRepository;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryTranslationRepository;
use App\Repositories\Country\CountryRepository;
use App\Repositories\Currency\CurrencyRepository;
use App\Repositories\Page\PageRepository;
use App\Repositories\Page\PageTranslationRepository;
use App\Repositories\Slider\SliderRepository;
use App\Repositories\Slider\SliderTranslationRepository;
use App\Repositories\Tag\TagRepository;
use App\Repositories\Tag\TagTranslationRepository;

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

        //Attribute Set
        $this->app->bind(AttributeSetContract::class, AttributeSetRepository::class);
        $this->app->bind(AttributeSetTranslationContract::class, AttributeSetTranslationRepository::class);

        //Tag Set
        $this->app->bind(TagContract::class, TagRepository::class);
        $this->app->bind(TagTranslationContract::class, TagTranslationRepository::class);

        //Currency
        $this->app->bind(CurrencyContract::class, CurrencyRepository::class);

        //County
        $this->app->bind(CountryContract::class, CountryRepository::class);

        //Slider
        $this->app->bind(SliderContract::class, SliderRepository::class);
        $this->app->bind(SliderTranslationContract::class, SliderTranslationRepository::class);

        //Slider
        $this->app->bind(PageContract::class, PageRepository::class);
        $this->app->bind(PageTranslationContract::class, PageTranslationRepository::class);

    }
}

?>
