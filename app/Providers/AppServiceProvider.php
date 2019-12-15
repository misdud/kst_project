<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Order;
use App\User;
use Auth;
use Log;

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
           Order::deleted(function(Order $order){
             $user = Auth::user(); 
             Log::info('Заказ удалён для:',[$order->user->name=>$order->discriptorder,
                 ' удалил: '=>$user->name]);
         });
    }  
}
