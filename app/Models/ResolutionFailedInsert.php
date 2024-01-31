<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResolutionFailedInsert extends Model
{
    use HasFactory;

    protected $connection = 'oo_error_fields_db';
    protected $table = 'person_error_log';
}
