<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetails;

class Product extends Model
{
    use HasFactory;

    public function order_details() {

        return $this->hasMany(OrderDetails::class);

    }

}