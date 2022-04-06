<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $primaryKey = "Prod_ID";
    protected $table = "products";
    public $timestamps = false;

    protected $fillable = [
        'ProdName', 'Slug',
    ];
}
