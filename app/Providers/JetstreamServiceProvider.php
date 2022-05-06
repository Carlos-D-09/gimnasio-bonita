<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\cliente;
use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Fortify;

class JetstreamServiceProvider extends ServiceProvider
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
        Fortify::authenticateUsing(function (Request $request){
            if($request->usuario == "empleado"){
                if (Auth::guard('web')->attempt(['correo' => $request->email, 'password' => $request->password],$request->remember)) {
                    return true;
                }
            }
            if ($request->usuario == "cliente"){
                if (Auth::guard('client')->attempt(['correo' => $request->email, 'password' => $request->password], $request->remember)) {
                    return true;
                }
            }
        });

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
