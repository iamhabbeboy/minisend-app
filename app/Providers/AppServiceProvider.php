<?php

namespace App\Providers;

use App\Models\Email;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\ServiceProvider;

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
        // View::share('tenantColor', 'gray');
        // View::share('tenantName', 'Admin');

        Queue::after(function (JobProcessed $event) {
            $payload = $event->job->payload();
            $job = unserialize($payload['data']['command']);
            $id = $job->request["id"] ?? 0;

            $find = Email::findOrFail($id);
            $find->status = 'sent';
            $find->save();
        });
    }
}
