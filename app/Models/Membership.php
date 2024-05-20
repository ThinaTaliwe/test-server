<?php

/**
 * Membership Model File
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
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Membership
 * 
 * @package App\Models
 *
 * @property-read Person $person
 * @property-read Address[] $address
 * @property-read MembershipAddress[] $membershipaddress
 */
class Membership extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'membership';
    protected $connection = 'mysql';

    use HasFactory, SoftDeletes;

    /**
     * Get the person associated with the membership.
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    /**
     * Get the addresses associated with the membership.
     */
    public function address()
    {
        return $this->hasManyThrough(
            Address::class,
            MembershipAddress::class,
            'membership_id',
            'id',
            'id',
            'address_id'
        );
    }

    /**
     * Get the membership addresses associated with the membership.
     */
    public function membershipaddress()
    {
        return $this->hasMany(MembershipAddress::class);
    }

        public function status()
    {
        return $this->belongsTo(MembershipStatus::class, 'status_id');
    }
}