<?php

namespace App\Providers;
use App\Models\DanhMuc;
use App\Models\MauSP;
use App\Models\AnhSP;
use App\Models\SanPham;
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
        view()->composer('*',function($view){
$view->with(['category'=>DanhMuc::where('status',1)->orderBy('category_name','ASC')->get()
]);
        });

    }
}
