<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modulo_control extends Model
{
    protected $table = "control_var";
    protected $primaryKey = "id";
    protected $fillable = ['izquierdo','derecho','stop','reset','amperaje','voltaje','frecuencia'];
}
