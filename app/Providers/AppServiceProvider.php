<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
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

//        VerifyEmail::toMailUsing(function ($notifiable,$url) {
//            return (new MailMessage)
//                ->subject('ایمیل فعال سازی حساب کاربری')
//                ->view('frontend.mails.index',compact('url'));
//        });

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
