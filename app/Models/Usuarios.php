<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = 'concessionaria.usuario';
    protected $primaryKey = 'id_usuario';
    const CREATED_AT = null;
    const UPDATED_AT = null;
}
