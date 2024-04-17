<?php
/**
 * User Model File
 *
 * PHP version 9
 *
 * @category  Model
 * @package   App\Models
 * @author    Siyabonga Alexander Mnguni <alexmnguni57@gmail.com>
 * @author    Thina Taliwe <thina.taliwe2@gmail.com>
 * @copyright 2023 1Office
 * @license   MIT License
 * @link      https://github.com/alexmnguni57/1Office-GBA
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\WelcomeNotification\ReceivesWelcomeNotification;
use Spatie\WelcomeNotification\WelcomeNotification;

use Illuminate\Contracts\Auth\MustVerifyEmail;





/**
 * User Model class
 */
class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable, HasRoles, ReceivesWelcomeNotification;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Function for sending welcome notification
     *
     * @param \Carbon\Carbon $validUntil    //
     * 
     * @return void     //
     */
    public function sendWelcomeNotification(\Carbon\Carbon $validUntil)
    {
        $this->notify(new WelcomeNotification($validUntil));
    }

    // Custom user preferences
    public function customStyles()
    {
        return $this->hasOne(UserCustomStyles::class);
    }

}




