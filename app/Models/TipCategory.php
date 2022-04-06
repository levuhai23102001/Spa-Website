<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipCategory extends Model
{
    use HasFactory;
    protected $primaryKey = "TipsCategory_ID";
    protected $table = "tips_category";
    public $timestamps = false;
}
