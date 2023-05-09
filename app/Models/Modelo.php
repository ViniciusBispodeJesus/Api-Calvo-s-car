<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    protected $table = 'concessionaria.modelo';
    protected $primaryKey = 'id_modelo';
    const CREATED_AT = null;
    const UPDATED_AT = null;
}
