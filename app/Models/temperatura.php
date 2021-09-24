<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class temperatura extends Model
{
    protected $table = "temperatura";
    protected $primaryKey = "id";
    protected $fillable = ['temp'];
}
