<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\OrderDetails;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'order_number',
        'total',
        'status',
        'customer_id',
        'auth_user_id'
    ];

    public function customer() {

        return $this->belongsTo(Customer::class);

    }

    public function order_details() {

        return $this->hasMany(OrderDetails::class);

    }

}