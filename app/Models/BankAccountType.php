<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccountType extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    public $table = 'bank_account_type'; 
}
