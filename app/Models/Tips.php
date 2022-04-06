<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tips extends Model
{
    use HasFactory;
    protected $primaryKey = "Tips_ID";
    protected $table = "tips";
    public $timestamps = true;
}
