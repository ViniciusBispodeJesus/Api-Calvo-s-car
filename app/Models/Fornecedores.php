<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedores extends Model
{
    use HasFactory;
    protected $table = 'concessionaria.fornecedor';
    protected $primaryKey = 'cnpj';
    const CREATED_AT = null;
    const UPDATED_AT = null;
}
