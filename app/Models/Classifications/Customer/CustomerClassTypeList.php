<?php

namespace App\Models\Classifications\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerClassTypeList extends Model
{
    use HasFactory;
    protected $table = 'customer_class_type_list';

    public function classType() {
        return $this->belongsTo(CustomerClassType::class, 'customer_class_type_id', 'id');
    }
    
}
