<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['nombre', 'email', 'personas', 'fecha', 'servicio', 'mensaje'];
}
