<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variador extends Model
{
    protected $table = "variador";
    protected $primaryKey = "id";
    protected $fillable = ['fase1A','fase2A','fase3A','voltsL1','voltsL2','voltsL3','hz',];
}
