<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use App\Models\cliente;
use App\Models\empleado;
use Illuminate\Http\Request;
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
            $user = empleado::where('correo',$request->email)->first();
            if($user && Hash::check($request->password,  $user->password)){
                return $user;
            }
            else{
                $user = cliente::where('correo',$request->email)->first();
                if($user && Hash::check($request->password,  $user->password)){
                    return $user;
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
