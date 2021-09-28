<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grafica_ejes extends Model
{
    protected $table = "grafica_ejes";
    protected $primaryKey = "id";
    protected $fillable = ['ejex','ejey','ejez'];
}
