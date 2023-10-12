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


////////////////////////////////////////////////////////////////////////////////////////////////////////////////
     /**
     * The attributes for $fillable attributes.
     *
     * @var array
     */
     protected $fillable = ['first_name', 'last_name'];

     protected static function boot()
    {
        parent::boot();

        // Whenever a new record is saved (created or updated)
        static::saved(function ($model) {
            self::resortTable();
        });
        
        // Whenever a record is deleted
        static::deleted(function ($model) {
            self::resortTable();
        });
    }

    public static function resortTable()
    {
        // Sort the table by 'created_at' in descending order
        $persons = self::orderBy('created_at', 'desc')->get();

        // Update the sorted records (if necessary)
        // For example, you might want to update a 'rank' column
        foreach ($persons as $index => $person) {
            $person->update(['rank' => $index + 1]);
        }
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'person';

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
