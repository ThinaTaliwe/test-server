<?php
namespace App\Services\Admin;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\WelcomeNotification\WelcomesNewUsers;
 
/**
 * Class for User Service
 */
class UserService
{    
    /**
     * Module to create User
     *
     * @param  mixed $request
     * @return User
     */
    public function createUser(Request $request): User
    {
        $user = User::create(
            [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]
        );
   
        // //Siya: I now assign roles for the user in here
        // $roles = $request->roles ?? [];
        // $user->assignRole($roles);

        return $user;
    }    
    /**
     * function to assign user role
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return User
     */
    public function assignRole(Request $request, User $user): User
    {
        $roles = $request->roles ?? [];
        $user = $user->assignRole($roles);

        return $user;
    }
}