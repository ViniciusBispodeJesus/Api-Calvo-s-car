<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = 'concessionaria.cliente';
    protected $primaryKey = 'id_cliente';
    const CREATED_AT = null;
    const UPDATED_AT = null;
}
