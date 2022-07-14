<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalePurchase extends Model
{ 
    //use HasFactory;
    public $timestamps = false;
    public $table = 'tbl_sale_purchase';
}
