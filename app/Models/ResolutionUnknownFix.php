<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResolutionUnknownFix extends Model
{
    use HasFactory;

    protected $connection = 'oo_success_logs_db';
    protected $table = 'person_success_log';
}
