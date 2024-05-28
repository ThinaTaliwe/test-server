<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuneralHasTransactions extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'funerals_has_transactions';
}
