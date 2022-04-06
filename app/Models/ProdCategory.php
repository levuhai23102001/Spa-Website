<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdCategory extends Model
{   
    protected $primaryKey = 'Category_ID';
    protected $table = "products_category";
    public $timestamps = false;
}
