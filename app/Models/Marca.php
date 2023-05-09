<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $table = 'concessionaria.marca';
    protected $primaryKey = 'id_marca';

    const CREATED_AT = null;
    const UPDATED_AT = null;
}
