<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Rules\ReCaptcha;

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
        // Validator::extend('recaptcha', function ($attribute, $value, $parameters, $validator) {
        //     $rule = new ReCaptcha();
        //     $fails = false;
            
        //     $rule->validate($attribute, $value, function ($message) use (&$fails) {
        //         $fails = true;
        //     });
            
        //     return !$fails;
        // }, 'The reCAPTCHA verification failed. Please try again.');
        
        // Set admin email address
        config(['mail.admin_address' => env('MAIL_ADMIN_ADDRESS', 'contact@sotgh.org')]);
    }
}
