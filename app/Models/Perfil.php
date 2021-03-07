<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    /** Relación de 1:1 entre perfil y usuario */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
