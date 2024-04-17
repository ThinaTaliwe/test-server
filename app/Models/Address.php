<?php
/**
 * Address file model
 *
 * Links an address to a membership
 *
 * PHP version 9
 *
 * @author    Siyabonga Alexander Mnguni <alexmnguni57@gmail.com>
 * @author    Thina Taliwe <thina.taliwe2@gmail.com>
 * @copyright 2023 1Office
 * @license   MIT License
 * @link      https://github.com/alexmnguni57/1Office-GBA
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class for the membership address
 *
 * @property int $id
 * @property string $street
 * @property string $city
 * @property string $state
 * @property string $postal_code
 * @property string $country
 */
class Address extends Model
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
    public $table = 'address';

    /**
     * Get the membership that owns the address.
     *
     * @return mixed
     */
    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    /**
     * Get the membership addresses for the address.
     *
     * @return mixed
     */
    public function membershipaddress()
    {
        return $this->hasMany(MembershipAddress::class, 'address_id', 'id');
    }

    public function addressType()
    {
        return $this->belongsTo(AddressType::class, 'adress_type_id', 'id');
    }
    

    use HasFactory;
    protected $connection = 'mysql';
}
