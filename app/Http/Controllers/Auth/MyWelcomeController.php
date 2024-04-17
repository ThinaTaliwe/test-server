<?php
/**
 * 
 */
namespace App\Http\Controllers\Auth;

use App\Actions\StoreAddress;
use App\Actions\StorePerson;
use App\Http\Requests\StorePersonRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

use Spatie\WelcomeNotification\WelcomeController as BaseWelcomeController;
use Symfony\Component\HttpFoundation\Response;

class MyWelcomeController extends BaseWelcomeController
{
    public function rules()
    {
        return [
            'password' => 'required|confirmed|min:6',
        ];
    }

    public function saveUserInfo(User $user, StorePersonRequest $request,  StorePerson $storePerson, StoreAddress $storeAddress)
    {
        
        //Save person here for user
        //Person Action Method injection
        $person = $storePerson->handle((object) $request->all());

        //Address
        $address = $storeAddress->handle((object) $request->all());


        $user->person_id = $person->id;
        $user->save();

        //Siya :where to redirect user based on role
        if ($request->user()->hasAnyRole(['super-admin', 'admin']) ) {
            return redirect(route('admin.home'));
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

}