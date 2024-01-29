<?php

namespace App\Models;

use App\Models\Classifications\Customer\CustomerClass;
use App\Models\Classifications\Customer\CustomerClassTypeList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = ['name', 'legal_name', 'parent_customer_id', 'company_id', 'bu_id', 'country_id', 'business_id', 'warehouse_id', 'website', 'email'];

    public function customerClasses()
    {
        return $this->hasMany(CustomerClass::class); //it will look for rows where customer_id is same as Customer id
    }

    public function customerClassTypeLists()
    {
        return $this->hasMany(CustomerClassTypeList::class, 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function bu()
    {
        return $this->belongsTo(Bu::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function parentCustomer()
    {
        return $this->belongsTo(Customer::class, 'parent_customer_id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
