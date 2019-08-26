<?php

namespace App\Providers;

use App\Kegiatan;
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
      view()->composer('sekolah.layouts.appsekolah', function ($view) {
          $kegiatan=kegiatan::all();

          $view->with('kegiatan',$kegiatan);
      });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
