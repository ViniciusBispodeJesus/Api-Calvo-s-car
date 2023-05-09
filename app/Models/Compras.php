<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    use HasFactory;
    protected $table = 'concessionaria.compra';
    protected $primaryKey = 'id_compra';
    const CREATED_AT = null;
    const UPDATED_AT = null;
}
