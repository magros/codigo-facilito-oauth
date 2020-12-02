<?php

namespace Magros\CodigoFacilitoOauth;

use Illuminate\Support\ServiceProvider;
use Laravel\Socialite\Contracts\Factory;

class CodigoFacilitoOauthProvider extends ServiceProvider
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
        $this->bootCodigoFacilitoSocialite();
    }

    private function bootCodigoFacilitoSocialite()
    {
        $socialite = app(Factory::class);
        $socialite->extend(
            'codigofacilito',
            function ($app) use ($socialite) {
                return $socialite->buildProvider(CodigoFacilitoOauthProviderContract::class, config('services.codigofacilito'));
            }
        );
    }
}
