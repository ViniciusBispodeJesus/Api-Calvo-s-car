<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicos extends Model
{
    use HasFactory;
    protected $table = 'concessionaria.servico';
    protected $primaryKey = 'id_servico';
    const CREATED_AT = null;
    const UPDATED_AT = null;
}
