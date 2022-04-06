<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    use HasFactory;
    protected $primaryKey = 'Check_ID';
    protected $table = "checkout";
    public $timestamps = true;
}
