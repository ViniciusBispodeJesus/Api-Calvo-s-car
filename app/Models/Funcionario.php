<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    protected $table = 'concessionaria.funcionario';
    protected $primaryKey = 'matricula';
    const CREATED_AT = null;
    const UPDATED_AT = null;
}
