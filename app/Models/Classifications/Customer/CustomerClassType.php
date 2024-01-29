<?php

namespace App\Models\Classifications\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerClassType extends Model
{
    use HasFactory;
    protected $table = 'customer_class_type';
    //fine
    public function classTypeLists() {
        return $this->hasMany(CustomerClassTypeList::class, 'customer_class_type_id', 'id');
    }
    
}
