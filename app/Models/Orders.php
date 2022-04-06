<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{   
    use HasFactory;
    public $timestamps = true;
    protected $primaryKey = 'Order_ID';
    protected $table = "orders";
}
