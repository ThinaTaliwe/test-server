<?php

/**
 * Dependant Model File
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
 * Class Dependant
 *
 * @package App\Models
 *
 * @property int $primary_person_id
 * @property int $secondary_person_id
 */
class Dependant extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    public $table = 'person_has_person';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The name of the primary person id field.
     *
     * @var string
     */
    const PERSON_ID = 'primary_person_id';

    use HasFactory, SoftDeletes;

    /**
     * Get the dependent person for the relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personDep()
    {
        return $this->belongsTo(Person::class, 'secondary_person_id', 'id');
    }

    /**
     * Get the main person for the relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function personMain()
    {
        return $this->belongsTo(Person::class, 'primary_person_id', 'id');
    }
}