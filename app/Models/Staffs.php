<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    use HasFactory;
    protected $primaryKey = "Staff_ID";
    protected $table = "staffs";
    public $timestamps = false;
}
