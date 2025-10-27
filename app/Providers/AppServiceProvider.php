<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str; // To replace bindings in the SQL query


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
        //
		
		DB::listen(function ($query) {
			// Replace bindings with their values for a more readable SQL query
			$sql = Str::replaceArray('?', $query->bindings, $query->sql);

			Log::info(
				'DB Query:',
				[
					'sql' => $sql,
					'time' => $query->time . 'ms',
					'connection' => $query->connectionName,
				]
			);
		});
		
    }
}
