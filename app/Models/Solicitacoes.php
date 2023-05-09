<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacoes extends Model
{
    use HasFactory;
    protected $table = 'concessionaria.solicitacao';
    protected $primaryKey = 'id_solicitacao';
    const CREATED_AT = null;
    const UPDATED_AT = null;
}
