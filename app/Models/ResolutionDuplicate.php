<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResolutionDuplicate extends Model
{
    use HasFactory;

    protected $connection = 'oo_duplicate_records_db';
    protected $table = 'person_duplicate_log';
}
