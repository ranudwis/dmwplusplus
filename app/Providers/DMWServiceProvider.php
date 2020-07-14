<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Dmw\Repository\CourseExamRepository;

class DMWServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CourseExamRepository::class, function () {
            return new CourseExamRepository();
        });
    }
}
