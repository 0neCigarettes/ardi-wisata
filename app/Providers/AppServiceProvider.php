<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

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
		Paginator::useBootstrapFive();
		Paginator::useBootstrapFour();

		view()->composer(
			'*',
			function ($view) {
				$idWarung = Auth::user()->idWarung ?? 0;
				$warung = \App\Models\Warung::Where('id', '=', $idWarung)->first();

				//...with this variable
				$view->with('warungKasir', $warung);
			}
		);
	}
}
