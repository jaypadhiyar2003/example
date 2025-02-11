<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Job;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Model::preventLazyLoading();
        //Gate::define('edit-job',function (?User $user,Job $job){ //$user is repersent user cuurently signed in and maked it optional by using ? sign so guest can be verified
          //   return $job->employer->user->is($user);
        //});

        //Paginator::useBootstrapFive();
        
    }
}
