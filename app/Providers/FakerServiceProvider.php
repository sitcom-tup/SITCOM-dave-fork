<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Faker\CustomHtmlLorem;
use App\Faker\JobType;
use Faker\{Factory, Generator};

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new CustomHtmlLorem($faker));
            $faker->addProvider(new JobType($faker));
            return $faker;
        });
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
}
