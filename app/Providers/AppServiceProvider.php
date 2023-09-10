<?php

namespace App\Providers;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('database.log_all_queries')) {
            $this->logQueries();;
        }

    }

    private function logQueries(): void
    {
        DB::listen(function (QueryExecuted $query) {
            logs()->info('sql: '.$query->sql);
            logs()->info('bindings: ', $query->bindings);
            logs()->info('time: '.$query->time);
            logs()->info('--------------------');
        });
    }
}
