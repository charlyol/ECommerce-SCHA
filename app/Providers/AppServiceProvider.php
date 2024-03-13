<?php

namespace App\Providers;

use App\Models\AgeClass;
use App\Models\Book;
use App\Models\Role;
use App\Models\Saga;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void

    {
        View::share('allCategories', Category::all());
        View::share('categoriesNames', Category::pluck('name'));
        View::share('allAuthors', User::all());
        View::share('allSagas', Saga::all());
        View::share('authorsNames', User::where('role_id',Role::where('name','author')->first()->id)->pluck('nickname'));
        View::share('sagasNames', Saga::pluck('title'));
        View::share('agesClasses', AgeClass::all());

    }
}
