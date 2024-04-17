<?php

/**
 * Person Model File
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
 * Class Person
 * 
 * @package App\Models
 */
class Person extends Model
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

    use HasFactory;
    public $table = 'person';
    protected $connection = 'mysql';

    use HasFactory, SoftDeletes;

    /**
     * Get the memberships for the person.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function membership()
    {
        return $this->hasMany(Membership::class);
    }

    /**
     * Get the dependants for the person.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dependant()
    {
        return $this->hasMany(Dependant::class, 'primary_person_id', 'id');
    }

    /**
     * Get the addresses for the person's memberships.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function address()
    {
        return $this->hasMany(MembershipAddress::class, 'membership_id', 'id');
    }
}
