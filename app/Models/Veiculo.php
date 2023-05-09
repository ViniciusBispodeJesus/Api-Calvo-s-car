<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;
    protected $table = 'concessionaria.veiculo';
    protected $primaryKey = 'id_veiculo';

    const CREATED_AT = null;
    const UPDATED_AT = null;
}
