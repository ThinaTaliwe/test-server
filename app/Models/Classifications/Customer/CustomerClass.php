<?php

namespace App\Models\Classifications\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerClass extends Model
{
    use HasFactory;
    protected $table = 'customer_class';

    public function customerClassTypeList()
    {
        return $this->belongsTo(CustomerClassTypeList::class, 'customer_class_type_list_id');
    }
    
    public function customerClassType()
    {
        return $this->belongsTo(CustomerClassType::class, 'customer_class_type_id');
    }


}
