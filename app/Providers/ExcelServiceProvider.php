<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Maatwebsite\Excel\Facades\Excel;

class ExcelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        // Register the Excel service using the singleton pattern
        $this->app->singleton(Excel::class, function ($app) {
            return new Excel($app['phpexcel'], $app['excel.reader'], $app['excel.writer'], $app['excel.parsers'], $app['excel.helpers']);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}