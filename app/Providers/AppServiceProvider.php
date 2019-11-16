<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->extend('command.model.make', function ($command, $app) {
//            return new ModelMakeCommand($app['files']);
//        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('pages._sidebar', function ($view) {
            $view->with('popularPost', Post::getPopularPost());
            $view->with('featuredPost', Post::getFeaturedPost());
            $view->with('recentPost', Post::getRecentPost());
            $view->with('categories', Category::all());
        });
        view()->composer('admin._sidebar', function ($view){
           $view->with('getNumberNewComments', Comment::where('status', 0)->count());
        });
    }
}
