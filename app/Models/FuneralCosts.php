<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuneralCosts extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'funeral_costs';
}
