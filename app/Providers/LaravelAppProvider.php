<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Request;

class LaravelAppProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $halaman = '';
        if (Request::segment(1) == 'siswa') {
            $halaman = 'siswa';
         }

         if (Request::segment(1) == 'about') {
            $halaman = 'about';
         } 

         view()->share('halaman', $halaman);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
